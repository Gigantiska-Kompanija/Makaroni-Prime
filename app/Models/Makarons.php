<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Makarons extends Model {
    use HasFactory;

    protected $table = 'makarons';
    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'shape',
        'color',
        'length',
        'popularity',
    ];

    public function reviews(): Relation {
        return $this->hasMany(Review::class);
    }

    public function orders(): Relation {
        return $this->belongsToMany(Order::class, 'makarons_order', 'makarons', 'orderID')
            ->withPivot('amount', 'price');
    }

    public function discounts(): Relation {
        return $this->belongsToMany(Discount::class, 'discount_makarons', 'makarons', 'code');
    }

    public function machinery(): Relation {
        return $this->belongsToMany(Machinery::class, 'machinery_makarons', 'makarons', 'machinery');
    }
}
