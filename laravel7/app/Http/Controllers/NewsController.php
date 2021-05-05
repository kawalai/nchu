<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function Index()
    {
        $result = DB::select('select * from news');
        return view('news.layout_01', compact('result'));
    }
    public function Insert()
    {
        $result = DB::table('news')->insert([
            'title' => '自動生成的標題',
            'date' => date("Y-m-d"),
            'img' => 'https://placeholder.pics/svg/250x250',
            'content' => '自動生成的文件',
            'views' => 5566,
        ]);
        return compact('result');
    }

    public function Update($id)
    {
        $result = DB::table('news')
            ->where('id', $id)
            ->update([
                'title' => '更新過的標題',
                'date' => date("Y-m-d"),
                'img' => 'https://placeholder.pics/svg/250x250',
                'content' => '更新過的文件',
                'views' => 7788,
            ]);
        return compact('result');
    }

    public function Delete($id)
    {
        $result = DB::table('news')
            ->where('id', $id)
            ->delete();
        return compact('result');
    }

    public function Detail($id)
    {
        $result = DB::table('news')
            ->find($id);
        if ($result) {
            return view('news.layout_02', compact('result'));
        } else {
            return redirect('news');
        }
    }
}
