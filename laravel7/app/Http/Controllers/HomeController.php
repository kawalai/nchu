<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = News::all();
        return view('home', compact('data'));
    }

    public function test($times)
    {
        date_default_timezone_set('Asia/Taipei');
        for ($i = 0; $i < $times; $i++) {
            News::create([
                'title' => mt_rand(500, 1000),
                'date' => date("Y-m-d", mt_rand(1262055681, 1790055681)),
                'img' => mt_rand(500, 1000),
                'content' => mt_rand(500, 1000),
                'views' => mt_rand(500, 1000),
            ]);
        }
        return redirect('news');
    }

    public function getAllData()
    {
        $result = News::all();

        $data = [];

        foreach ($result as $i) {
            $data[] = [
                'title' => $i->title,
                'date' => $i->date,
                'views' => $i->views,
                'img' => $i->img,
                'content' => $i->content,
            ];
        }

        $data = ['data' => $data];

        return $data;
    }

    public function getModal(Request $request)
    {
        $result = News::find($request->id);
        $otherData = [
            'modalTitle' => '編輯資料',
            'mainBtn' => '確認',
            'cancelBtn' => '取消',
        ];
        return view('php_component.modal', compact('result', 'otherData'));
    }

    public function homeUpdate(Request $request)
    {
        $target = News::find($request->id);

        if (isset($target)) {

            $target->Update($request->all());

            return true;
        } else {
            # code...
            return false;
        }
    }
}
