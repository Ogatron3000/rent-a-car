<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BookCarEdit extends Component
{
    public $reservation;
    public $carClasses;
    public $locations;
    public $equipment;

    public $carClassId = '';
    public $fromDate = '';
    public $toDate = '';
    public $carId = '';
    public $equipmentIds = [];

    public function render()
    {
        return view('livewire.book-car-edit');
    }
}
