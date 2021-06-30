<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Review extends Model {
    use HasFactory;

    protected $table = 'review';

    protected $fillable = [
        'clientID',
        'productName',
        'rating',
        'comment',
        'date',
    ];

    public function client(): Relation {
        return $this->belongsTo(Client::class, 'clientID');
    }

    public function makarons(): Relation {
        return $this->belongsTo(Makarons::class);
    }
}
