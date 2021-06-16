<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class RawMaterial extends Model {
    use HasFactory;

    protected $table = 'rawMaterial';

    public function machinery(): Relation {
        return $this->belongsToMany(Machinery::class);
    }
}
