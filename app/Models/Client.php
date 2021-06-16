<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable {
    use HasFactory, Notifiable;

    protected $table = 'client';

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

    public function orders(): Relation {
        return $this->hasMany(Order::class);
    }

    public function reviews(): Relation {
        return $this->hasMany(Review::class);
    }
}
