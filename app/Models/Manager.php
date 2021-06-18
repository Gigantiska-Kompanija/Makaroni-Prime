<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable {
    use HasFactory, Notifiable;

    protected $table = 'manager';
    protected $primaryKey = 'employee';
    protected $keyType = 'char';
    public $incrementing = false;

    protected $guard = 'manager';

    protected $fillable = [
        'employee',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function employee(): Relation {
        return $this->belongsTo(Employee::class, 'employee', 'personalId');
    }

    public function divisions(): Relation {
        return $this->belongsToMany(Division::class, 'division_manager', 'manager', 'division');
    }


    public function getAuthIdentifier() {
        return $this->employee()->first()->email;
    }
}
