<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['qty','user_id','cake_id','order_id','ordered', ];
    public function cake()
    {
        return $this->hasOne('App\Models\Cake','id','cake_id');
    }
    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }
}
