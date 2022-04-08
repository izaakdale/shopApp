<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected $fillable = [
        'delivery_address',
        'paid',
        'dispatched',
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT)->get();
    }

}
