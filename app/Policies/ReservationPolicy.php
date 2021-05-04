<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Reservation $reservation)
    {
        return $user->id === $reservation->client->user->id;
    }
}
