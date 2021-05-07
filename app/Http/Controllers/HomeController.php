<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{

    public function index()
    {
        $cars = Car::withCount('reservationsWithTrashed')->orderBy('reservations_with_trashed_count', 'desc')->take(6)->get();
        return view('home', compact('cars'));
    }

}
