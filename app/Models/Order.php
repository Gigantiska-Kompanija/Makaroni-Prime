<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Order extends Model {
    use HasFactory;

    protected $table = 'order';

    public function client(): Relation {
        return $this->belongsTo(Client::class);
    }

    public function makaroni(): Relation {
        return $this->belongsToMany(Makarons::class)
            ->withPivot('amount', 'price');
    }
}
