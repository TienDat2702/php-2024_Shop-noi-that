<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'price_sale',
        'category_id',
        'quantity',
        'description',
        'content',
        'active',
    ];

    // Scopes
    public function scopeGetNameFirst($query, $name)
    {
        return $query->where('name', $name->first())->where('active', 1);
    }

    public function scopeGetProductSold($query)
    {
        return $query->where('sold', '>=', 50)->orderBy('sold', 'desc')->where('active', 1);
    }

    public function scopeGetProductView($query)
    {
        return $query->where('view', '>=', 50)->orderBy('view', 'desc')->where('active', 1);
    }

    public function scopeProductsList($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeGetProductNew($query)
    {
        return $query->where('active', 1)->orderBy('id', 'desc');
    }

    public function scopeRelatedProducts($query, $id)
    {
        return $query->Where('category_id', $id)->inRandomOrder()->limit(4);
    }

    // public function scopeproductStatistical($query) {
    //     return $query->where()
    // }

}

