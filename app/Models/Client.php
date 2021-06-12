<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable {
    use HasFactory, Notifiable;

    protected $guard = 'client';

    protected $fillable = [
        'firstName',
        'lastName',
        'registerDate',
        'email',
        'password',
        'phoneNumber',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
