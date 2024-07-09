<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // public $timestamps = false;
    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'name',
        'image',
        'quantity',
    ];

    public function scopeGetId($query, $product_id, $user_id) {
        return $query->where('user_id', $user_id)->where('product_id', $product_id);
    }
    public function scopeGetProductCart($query, $user_id){
        return $query->where('user_id', $user_id)->orderby('created_at', 'desc');
    }
    // public function scopeGetID($query, $user_id, $product_id){
    //     return $query->where('user_id', $user_id)->where('product_id', $product_id);
    // }

}
