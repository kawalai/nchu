<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    // 如果model name 有區分好單複數的話 laravel 會自動連接model 的樣子
    // 此狀況news 難以區分單複數，以防萬一，手動連接table
    protected $table = 'news';
    // 允許改動的欄位 : 白名單
    protected $fillable = ['title', 'date', 'img', 'content', 'views'];
    // // 允許改動的欄位 : 黑名單
    // protected $guarded = ['title', 'date', 'img', 'content', 'views'];
}
