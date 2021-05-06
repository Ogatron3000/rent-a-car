<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReservationRequest;
use App\Http\Requests\Admin\UpdateReservationRequest;
use App\Models\Car;
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
        $reservations = Reservation::paginate(10);

        return view('reservations.admin.index', compact('reservations'));
    }

    public function create()
    {
        $clients = Client::all();
        $cars = Car::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.admin.create', compact('clients', 'cars', 'locations', 'equipment'));
    }

    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();

        $validated['price'] = $this->calculatePrice($validated, $request->get('equipment_ids', []));

        Car::checkAvailability($validated['car_id'], $validated['from_date'], $validated['to_date']);

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
        $clients = Client::all();
        $cars = Car::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.admin.edit', compact('reservation', 'clients', 'cars', 'locations', 'equipment'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $validated = $request->validated();

        $validated['price'] = $this->calculatePrice($validated, $request->get('equipment_ids', []));

        Car::checkAvailability($validated['car_id'], $validated['from_date'], $validated['to_date']);

        $reservation->update($validated);

        $reservation->equipment()->detach();
        $reservation->equipment()->attach($request->equipment_ids);

        return redirect($reservation->adminPath());
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect(route('reservations.admin.index'));
    }

    protected function calculatePrice($validated, $equipment_ids)
    {
        // calculate price per day
        $days = Carbon::parse($validated['from_date'])->diffInDays($validated['to_date']);
        $carPrice = Car::findOrFail($validated['car_id'])->price;
        $price = $days * $carPrice;

        // add equipment price to total price
        foreach ($equipment_ids as $id) {
            $price += Equipment::findOrFail($id)->price;
        }

        return $price;
    }
}
