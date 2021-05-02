<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return '/admin/dashboard/cars/' . $this->id;
    }

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }
}
