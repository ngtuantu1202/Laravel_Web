<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'customer_id',
        'shipping_id',
        'payment_id',
        'order_total',
        'order_status',
    ];

    public $timestamps = true;
}
