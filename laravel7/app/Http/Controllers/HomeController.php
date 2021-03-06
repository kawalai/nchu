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
                'editBtn' => "<button class='btn btn-primary btn-edit' onclick='callEditModal($i->id)'>編輯</button>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='callModal($i->id)' data-toggle='modal' data-target='#destroyModal'>刪除</button>",
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

    public function createModal(Request $request)
    {
        $result = News::find($request->id);
        $otherData = [
            'modalTitle' => '新增資料',
            'mainBtn' => '新增',
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

    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Taipei');

        $result = $request->all();
        
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $this->fileUpload($file,'product');
            $result['img'] = $path;
        }
        $result = News::create($result);
        return redirect('home');
    }

    private function fileUpload($file,$dir){
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if( ! is_dir('upload/')){
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if ( ! is_dir('upload/'.$dir)) {
            mkdir('upload/'.$dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/'.$dir.'/'.$filename;
    }
}
