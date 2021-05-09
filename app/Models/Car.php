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
        return '/admin/cars/' . $this->id;
    }

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservationsWithTrashed()
    {
        return $this->reservations()->withTrashed();
    }

    public static function queryAvailable($fromDate, $toDate, $carClass="")
    {
        $query = self::query();

        if ($carClass) {
            $query = $query->where('car_class_id', $carClass);
        }

        return $query->whereHas('reservations', function ($q) use ($fromDate, $toDate) {
            $q->where([
                ['from_date', '>', $fromDate],
                ['to_date', '>', $toDate],
                ['from_date', '>', $toDate],
                ['to_date', '>', $fromDate]
            ])->orWhere([
                ['from_date', '<', $fromDate],
                ['to_date', '<', $toDate],
                ['from_date', '<', $toDate],
                ['to_date', '<', $fromDate]
            ]);
        })->orWhereDoesntHave('reservations');
    }}
