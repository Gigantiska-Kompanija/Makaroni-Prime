<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Discount extends Model {
    use HasFactory;

    protected $table = 'discount';
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'code',
        'amount',
        'startDate',
        'endDate',
    ];

    public function makaroni(): Relation {
        return $this->belongsToMany(Makarons::class, 'discount_makarons', 'code', 'makarons');
    }
}
