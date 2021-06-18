<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Machinery extends Model {
    use HasFactory;

    protected $table = 'machinery';
    protected $primaryKey = 'serialNumber';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'serialNumber',
        'function',
        'located',
        'model',
        'isOperating',
        'lastServiced',
        'needsMaintenance',
        'purchaseDate',
        'decommissionDate',
    ];

    public function located(): Relation {
        return $this->belongsTo(Division::class, 'located', 'name');
    }

    public function rawMaterials(): Relation {
        return $this->belongsToMany(RawMaterial::class, 'machinery_rawMaterial', 'machinery', 'rawMaterial');
    }

    public function makaroni(): Relation {
        return $this->belongsToMany(Makarons::class, 'machinery_makarons', 'machinery', 'makarons');
    }

    public function employees(): Relation {
        return $this->belongsToMany(Employee::class, 'employee_machinery', 'machinery', 'employee');
    }
}
