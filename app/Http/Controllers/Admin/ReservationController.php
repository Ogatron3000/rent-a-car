<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReservationRequest;
use App\Http\Requests\Admin\UpdateReservationRequest;
use App\Models\Car;
use App\Models\CarClass;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Location;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::with('client', 'car', 'startLocation', 'endLocation', 'equipment')->withTrashed()->orderBy('from_date', 'asc')->paginate(10);

        return view('reservations.admin.index', compact('reservations'));
    }

    public function create()
    {
        $cars = Car::all();
        $carClasses = CarClass::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.admin.create', compact('cars', 'carClasses', 'locations', 'equipment'));
    }

    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();

        $validated['price'] = $this->calculatePrice($validated, $request->get('equipment_ids', []));

        $client = Client::where('user_id', $validated['passport'])->firstOrFail();
        $client->update([
            'first_reservation' => $client->first_reservation ?? \Carbon\Carbon::now()->toDateString(),
            'last_reservation'  => Carbon::now()->toDateString(),
        ]);
        $validated['passport'] = $client->id;
        unset($validated['passport']);

        // check car availability
        Car::where('id', $validated['car_id'])->queryAvailable($validated['from_date'], $validated['to_date'])->firstOrFail();

        $reservation = Reservation::create($validated);

        $reservation->equipment()->attach($request->equipment_ids);

        return redirect($reservation->adminPath());
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.admin.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $cars = Car::all();
        $carClasses = CarClass::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.admin.edit', compact('reservation', 'cars', 'carClasses', 'locations', 'equipment'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $validated = $request->validated();

        $validated['price'] = $this->calculatePrice($validated, $request->get('equipment_ids', []));

        $client = Client::where('passport', $validated['passport'])->firstOrFail();
        $validated['client_id'] = $client->id;
        unset($validated['passport']);

        // check car availability
        Car::where('id', $validated['car_id'])->queryAvailable($validated['from_date'], $validated['to_date'])->firstOrFail();

        $reservation->update($validated);

        $reservation->equipment()->detach();
        $reservation->equipment()->attach($request->equipment_ids);

        return redirect($reservation->adminPath());
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->forceDelete();

        return redirect(route('reservations.admin.index'));
    }

    protected function calculatePrice($validated, $equipment_ids)
    {
        // calculate price per day
        $days = Carbon::parse($validated['from_date'])->diffInDays($validated['to_date']);
        $carPrice = Car::findOrFail($validated['car_id'])->price;
        $price = $days * $carPrice;

        // add equipment price to total price
        $price += Equipment::findMany($equipment_ids)->sum('price');

        return $price;
    }
}
