<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return '/admin/dashboard/clients/' . $this->id;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
