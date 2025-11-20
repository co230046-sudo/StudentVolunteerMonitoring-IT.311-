<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'family_name',
        'id_number',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Optional: creates $account->full_name
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->family_name;
    }
}
