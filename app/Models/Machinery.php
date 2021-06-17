<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Machinery extends Model {
    use HasFactory;

    protected $table = 'machinery';
    public $primaryKey  = 'serialNumber';

    public function located(): Relation {
        return $this->belongsTo(Division::class);
    }

    public function rawMaterials(): Relation {
        return $this->belongsToMany(RawMaterial::class);
    }

    public function makaroni(): Relation {
        return $this->belongsToMany(Makarons::class);
    }

    public function employees(): Relation {
        return $this->belongsToMany(Employee::class);
    }
}
