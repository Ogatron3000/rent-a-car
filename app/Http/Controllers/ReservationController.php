<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Car;
use App\Models\CarClass;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Location;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        $client = Client::where('user_id', auth()->id())->first();
        $reservations = Reservation::where('client_id', $client->id ?? null)->withTrashed()->orderBy('from_date', 'asc')->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $cars = Car::all();
        $carClasses = CarClass::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.create', compact('cars', 'carClasses', 'locations', 'equipment'));
    }

    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();

        $validated['price'] = $this->calculatePrice($validated, $request->get('equipment_ids', []));

        $client = Client::where('user_id', auth()->id())->first();
        $client->update([
            'first_reservation' => $client->first_reservation ?? Carbon::now()->toDateString(),
            'last_reservation'  => Carbon::now()->toDateString(),
        ]);
        $validated['client_id'] = $client->id;

        Car::checkAvailability($validated['car_id'], $validated['from_date'], $validated['to_date']);

        $reservation = Reservation::create($validated);

        $reservation->equipment()->attach($request->equipment_ids);

        return redirect($reservation->path());
    }

    public function show(Reservation $reservation)
    {
        $this->authorize('manage', $reservation);

        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $this->authorize('manage', $reservation);

        $cars = Car::all();
        $carClasses = CarClass::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.edit', compact('reservation', 'cars', 'carClasses', 'locations', 'equipment'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $this->authorize('manage', $reservation);

        $validated = $request->validated();

        $validated['price'] = $this->calculatePrice($validated, $request->get('equipment_ids', []));

        $client = Client::where('user_id', auth()->id())->first();
        $client->update(['last_reservation'  => Carbon::now()->toDateString()]);
        $validated['client_id'] = $client->id;

        Car::checkAvailability($validated['car_id'], $validated['from_date'], $validated['to_date']);

        $reservation->update($validated);

        $reservation->equipment()->detach();
        $reservation->equipment()->attach($request->equipment_ids);

        return redirect($reservation->path());
    }

    public function destroy(Reservation $reservation)
    {
        $this->authorize('manage', $reservation);

        $reservation->delete();

        return redirect(route('reservations.index'));
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
