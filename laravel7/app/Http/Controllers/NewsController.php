<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\News;

class NewsController extends Controller
{
    public function Index()
    {
        $result = News::all();
        return view('news.layout_01', compact('result'));
    }
    public function Create()
    {
        // $result = {};
        return view('news.create_news', compact('result'));
    }
    public function Store(Request $request)
    {
        date_default_timezone_set('Asia/Taipei');
        // 兩種做法
        // // 第一種
        // News::create([
        //     'title' => $request->title,
        //     'date' => $request->date,
        //     'img' => $request->img,
        //     'content' => $request->content,
        //     'views' => $request->views,
        // ]);
        // 第二種 會自動找相對應的欄位，所以欄位跟form 資料id 相對應比較好
        News::create($request->all());
    }
    public function Edit($id)
    {
        $result = News::find($id);
        return view('news.create_news', compact('result'));
    }
    public function Update()
    {

        $result = News::all();
        return view();
    }
    public function Insert()
    {
        $w = mt_rand(400, 600);
        $h = mt_rand(200, 400);
        $img = 'https://placeholder.pics/svg/' . $w . 'x' . $h;
        date_default_timezone_set('Asia/Taipei');

        $result = News::create([
            'title' => '自動生成的標題',
            'date' => date("Y-m-d", mt_rand(1262055681, 1790055681)),
            'img' => $img,
            'content' => file_get_contents('http://loripsum.net/api'),
            'views' => rand(100, 10000),
        ]);
        return compact('result');
    }

    // public function Update($id)
    // {
    //     $w = mt_rand(400, 600);
    //     $h = mt_rand(200, 400);
    //     $img = 'https://placeholder.pics/svg/' . $w . 'x' . $h;
    //     date_default_timezone_set('Asia/Taipei');

    //     $result = News::where('id', $id)
    //         ->update([
    //             'title' => '更新過的標題',
    //             'date' => date("Y-m-d", mt_rand(1262055681, 1790055681)),
    //             'img' => $img,
    //             'content' => '更新過的文件',
    //             'views' => 7788,
    //         ]);
    //     return compact('result');
    // }

    // public function Delete($id)
    // {
    //     $result = News::where('id', $id)
    //         ->delete();
    //     return compact('result');
    // }

    public function Detail($id)
    {
        $result = News::find($id);
        if ($result) {
            return view('news.layout_02', compact('result'));
        } else {
            return redirect('news');
        }
    }
}
