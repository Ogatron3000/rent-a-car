<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarClass;


class AvailabilityController extends Controller
{
    public function index(Request $request)
    {
        $fromDate = $request->query('from_date') ?? Carbon::now()->toDateString();
        $toDate = $request->query('to_date') ?? "";
        $carClass = $request->query('car_class_id') ? CarClass::find($request->query('car_class_id')) : null;

        if ($carClass) {
            $cars = Car::queryAvailable($fromDate, $toDate, $carClass->id)->with('carClass')->paginate(10);
            $carClass = $carClass->name;
        } else {
            $cars = Car::queryAvailable($fromDate, $toDate)->with('carClass')->paginate(10);
        }

        $carClasses = CarClass::all();

        return view('availability', compact('cars', 'carClass', 'fromDate', 'toDate', 'carClasses'));
    }
}
