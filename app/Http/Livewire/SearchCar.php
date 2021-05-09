<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchCar extends Component
{
    public $carClasses;

    public $carClassId = 1;
    public $fromDate = '';
    public $toDate = '';

    public function render()
    {
        return view('livewire.search-car');
    }
}
