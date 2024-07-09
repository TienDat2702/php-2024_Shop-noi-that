<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends = ['totalPrice'];
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'user_id',
        'phone',
        'address',
        'status',
        'note',
        'token'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function details(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function scopeGetOrder($query){
        return $query->orderBy('id', 'DESC');
    }
    public function scopeorderStatistical($query){
        return  $query->where('status', 1)
        ->orWhere('status', 0);
    }
    public function getTotalPriceAttribute(){
        $tong = 0;
        foreach ($this->details as $item) {
            $tong += $item->price * $item->quantity;
        }

        return $tong;
    }
}
