<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Makarons extends Model implements Feedable {
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
        return $this->hasMany(Review::class, 'productName', 'name');
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

    public function toFeedItem(): FeedItem {
        return FeedItem::create()
            ->id($this->name)
            ->title($this->name)
            ->updated($this->updated_at)
            ->summary('shape: '.$this->shape.', color: '.$this->color.', length: '.$this->length.', quantity: '.$this->quantity.', price: '.$this->price.', popularity: '.$this->popularity)
            ->link(route('makaroni.show', $this->name))
            ->author('🍝 Makaroni Prime 🍜');
    }
    public static function getFeedItems() {
        return static::all();
    }
}
