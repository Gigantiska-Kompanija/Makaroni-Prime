<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Division extends Model {
    use HasFactory;

    protected $table = 'division';
    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'location',
        'isOperating',
    ];

    public function machinery(): Relation {
        return $this->hasMany(Machinery::class);
    }

    public function employees(): Relation {
        return $this->belongsToMany(Employee::class, 'division_employee', 'division', 'employee');
    }

    public function managers(): Relation {
        return $this->belongsToMany(Manager::class, 'division_manager', 'division', 'manager');
    }
}
