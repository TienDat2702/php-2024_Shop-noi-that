<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'image',
        'description',
        'hot',
        'active'
    ];

    public function scopegetParent()
    {
        return Category::where('parent_id', 0);
    }
    public function scopeGetCategory($query, $category_id){
        return $query->where('id', $category_id);
    }
    public function scopeGetCategoryHot($query){
        return $query->orderBy('hot', 'desc');
    }
    function scopeCategoriesList($query){
        return $query->orderBy('id', 'desc');
    }

    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
