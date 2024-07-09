<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'image',
    ];
    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
    // public function scopeTotalRevenueByMonth($query)
    // {
    //     return $query->where('status', 4)
    //         ->selectRaw('MONTH(created_at) as month')
    //         ->selectRaw('SUM(quantity * price) as total_revenue')
    //         ->groupByRaw('MONTH(created_at)');
    // }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
    public function scopeTotalRevenueByMonth($query)
    {
        return $query->selectRaw('MONTH(created_at) as month, SUM(quantity * price) as total_revenue')
            ->whereHas('order', function ($query) {
                $query->where('status', 4);
            })
            ->groupByRaw('MONTH(created_at)');
    }
}
