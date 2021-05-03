<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Car;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Location;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $clients = Client::all();
        $cars = Car::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.create', compact('clients', 'cars', 'locations', 'equipment'));
    }

    public function store(StoreReservationRequest $request)
    {
        $reservation = Reservation::create($request->validated());

        $reservation->equipment()->detach();
        $reservation->equipment()->attach($request->equipment_ids);

        return redirect($reservation->path());
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $clients = Client::all();
        $cars = Car::all();
        $locations = Location::all();
        $equipment = Equipment::all();

        return view('reservations.edit', compact('reservation', 'clients', 'cars', 'locations', 'equipment'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());

        $reservation->equipment()->detach();
        $reservation->equipment()->attach($request->equipment_ids);

        return redirect($reservation->path());
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect(route('reservations.index'));
    }
}
