<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Employee extends Model {
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'personalId';

    protected $fillable = [
        'personalId',
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'joinDate',
        'leaveDate',
        'position',
        'pay',
    ];

    public function manager(): Relation {
        return $this->hasOne(Manager::class, 'employee', 'personalId');
    }

    public function divisions(): Relation {
        return $this->belongsToMany(Division::class);
    }

    public function machinery(): Relation {
        return $this->belongsToMany(Machinery::class);
    }
}
