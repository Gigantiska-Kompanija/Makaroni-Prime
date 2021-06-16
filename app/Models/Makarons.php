<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Makarons extends Model {
    use HasFactory;

    protected $table = 'makarons';

    public function reviews(): Relation {
        return $this->hasMany(Review::class);
    }

    public function orders(): Relation {
        return $this->belongsToMany(Order::class)
            ->withPivot('amount', 'price');
    }

    public function discounts(): Relation {
        return $this->belongsToMany(Discount::class);
    }

    public function machinery(): Relation {
        return $this->belongsToMany(Machinery::class);
    }
}
