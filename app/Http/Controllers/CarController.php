<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\CarClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::paginate(10);

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $carClasses = CarClass::all();

        return view('cars.create', compact('carClasses'));
    }

    public function store(StoreCarRequest $request)
    {
        $validated = $request->validated();

        $validated['photo'] = $validated['photo']->store('photos');

        $car = Car::create($validated);

        return redirect($car->path());
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $carClasses = CarClass::all();

        return view('cars.edit', compact('car', 'carClasses'));
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $validated = $request->validated();

        if (array_key_exists('photo', $validated)) {
            Storage::delete($car->photo);
            $validated['photo'] = $validated['photo']->store('photos');
        }

        $car->update($validated);

        return redirect($car->path());
    }

    public function destroy(Car $car)
    {
        Storage::delete($car->photo);
        $car->delete();

        return redirect(route('cars.index'));
    }
}
