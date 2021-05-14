<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    protected $table = 'product_imgs';
    protected $fillable = ['product_id', 'img'];

    public function products()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
