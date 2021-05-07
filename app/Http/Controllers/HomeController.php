<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::withCount('reservations')->orderBy('reservations_count', 'desc')->take(6)->get();
        return view('home', compact('cars'));
    }
}
