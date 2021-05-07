<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    protected $table = 'indexes';
    // 允許改動的欄位 : 白名單
    protected $fillable = ['name', 'mail', 'tel', 'title', 'content'];
}
