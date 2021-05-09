<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchCar extends Component
{
    public $carClasses;

    public $carClassId = '';
    public $fromDate = '';
    public $toDate = '';

    public function render()
    {
        return view('livewire.search-car');
    }
}
