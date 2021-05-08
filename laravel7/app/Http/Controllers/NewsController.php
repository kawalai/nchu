<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\News;

use function Psy\debug;

class NewsController extends Controller
{
    public function Index()
    {
        $result = News::all();
        return view('news.layout_01', compact('result'));
    }
    public function Create()
    {
        return view('news.create_news');
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
        return redirect('news');
    }
    
    public function Edit($id)
    {
        $result = News::find($id);
        return view('news.create_news', compact('result'));
    }

    public function Update(Request $request)
    {
        // $result = News::where('id', $request->id)->Update([
        //     'title' => $request->title,
        //     'date' => $request->date,
        //     'img' => $request->img,
        //     'content' => $request->content,
        //     'views' => $request->views,
        // ]);

        $result = News::where('id', $request->id)->first()->Update($request->all());
        // $result = News::find($request->id)->Update($request->all());

        return redirect('news');
    }
    public function Destroy(Request $request)
    {
        $resutl = News::Destroy($request->id);
        return $resutl;
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

    public function Detail($id)
    {
        $result = News::find($id);
        if ($result) {
            return view('news.layout_02', compact('result'));
        } else {
            return redirect('news');
        }
    }
    public function getNewNews()
    {
        $result = News::all();
        return $result;
    }
}
