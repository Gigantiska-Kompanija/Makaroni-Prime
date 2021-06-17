<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Discount extends Model {
    use HasFactory;

    protected $table = 'discount';
    public $primaryKey  = 'code';

    public function makaroni(): Relation {
        return $this->belongsToMany(Makarons::class);
    }
}
