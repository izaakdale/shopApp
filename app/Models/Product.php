<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    public function nutrition_info()
    {
        return $this->hasOne(NutritionInfo::class);
    }

    public function order_items()
    {
        return $this->belongsToMany(OrderItem::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'price',
    ];

    public function toSearchableArray()
    {
        $modelArray = $this->toArray();
        $modelArray = $this->transform($modelArray);

        $array = [
            'productName' => $modelArray['name'],
            'productDescription' => $modelArray['description'],
        ];

        return $array;
    }

    public static function scopeAlphabetical(Builder $query)
    {
        return $query->orderBy('name', 'asc');
    }

    public static function scopePrice(Builder $query)
    {
        return $query->orderBy('price', 'asc');
    }
}
