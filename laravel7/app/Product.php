<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['type_id', 'name', 'price', 'img', 'description', 'sort'];

    public function productType()
    {
        return $this->hasOne('App\ProductType', 'id', 'type_id');
    }
    public function productImgs()
    {
        return $this->hasMany('App\ProductImg', 'product_id', 'id');
    }
}
