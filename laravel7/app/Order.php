<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'order_no', 'name', 'phone', 'email', 'county', 'district', 'zipcode', 'address', 'price', 'pay_type', 'is_paid', 'shipping', 'shipping_fee', 'shipping_status_id', 'order_status_id', 'remark'];
}
