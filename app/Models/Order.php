<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name', 'order_date', 'total_amount'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

