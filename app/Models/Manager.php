<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable {
    use HasFactory, Notifiable;

    protected $guard = 'manager';

    protected $fillable = [
        'employee',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
