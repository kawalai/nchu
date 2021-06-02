<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImg;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::with('productType', 'productImgs')->all();
        return view('products.index', compact('data'));
    }

    public function productContent($id)
    {
        $data = Product::find($id);
        return view('products.content', compact('data'));
    }

    public function productList()
    {
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();
        return view('admin.product.create', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        date_default_timezone_set('Asia/Taipei');

        request()['description'] = $this->summernote_base64_to_file(request()['description']);

        // dd(request()['description']);

        // $data = $this->summernote_base64_to_file($data['description']);

        // if ($request->hasFile('img')) {
        //     $file = $request->file('img');
        //     $path = Storage::disk('myfile')->putfile('product', $file);
        //     $data['img'] = Storage::disk('myfile')->url($path);
        // }
        // Product::create($data);

        if ($request->hasFile('img')) {
            $local = Storage::disk('local');

            $file = $request->file('img');
            $path = $local->putFile('public', $file);
            $data['img'] = $local->url($path);
        }
        $data['description'] = request()['description'];
        $mainData = Product::create($data);

        if ($request->hasFile('imgs')) {
            $localS = Storage::disk('local');

            $fileS = $request->file('imgs');
            $imgs = [];
            foreach ($fileS as $i) {
                $pathS = $localS->putFile('public', $i);
                $imgs[] = $localS->url($pathS);
            }
        }
        foreach ($imgs as $img) {
            ProductImg::create([
                'product_id' => $mainData->id,
                'img' => $img
            ]);
        }

        // dd($fileS,$mainData->id, $imgs);

        return redirect()->route('admin');
    }


    public function storetest($times, Request $request)
    {

        date_default_timezone_set('Asia/Taipei');
        for ($i = 0; $i < $times; $i++) {
            $data = $request->all();
            $size = mt_rand(200, 400);
            $data['img'] = 'https://via.placeholder.com/' . $size;
            Product::create($data);
        }
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::with('productType', 'productImgs')->find($id);
        $productTypes = ProductType::all();
        return view('admin.product.edit', compact('data', 'productTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        date_default_timezone_set('Asia/Taipei');
        $data = $request->all();
        $dbData = Product::find($id);
        $myfile = Storage::disk('local');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $myfile->putFile('public', $file);
            $data['img'] = $myfile->url($path);
            File::delete(public_path($dbData->img));
        }
        $dbData->update($data);

        if ($request->hasFile('imgs')) {
            // $this->fetchDestroyByProdId($id);
            $localS = Storage::disk('local');

            $fileS = $request->file('imgs');
            $imgs = [];
            foreach ($fileS as $i) {
                $pathS = $localS->putFile('public', $i);
                $imgs[] = $localS->url($pathS);
            }
            foreach ($imgs as $img) {
                ProductImg::create([
                    'product_id' => $id,
                    'img' => $img
                ]);
            }
        }

        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = Product::with('productImgs')->find($id);
        // $pattern='/src="(\S*)"/';
        // preg_match_all($pattern, $dbData['description'], $matches);
        // dd($dbData['description'],$matches);

        if (isset($dbData->img)) {
            // dd($dbData->img);
            File::delete(public_path($dbData->img));
            if (isset($dbData->productImgs)) {
                foreach ($dbData->productImgs as $i) {
                    File::delete(public_path($i->img));
                    // dd(public_path($dbData->img), public_path($i->img));
                }
            }
        }

        Product::destroy($id);
        $this->fetchDestroyByProdId($id);
        $imgs = ProductImg::where('product_id', $id)->get();
        foreach ($imgs as $img) {
            $img->delete();
        }
        // $path =  $myfile->putfile('upload', $data);
        // Storage::url($path);

        return redirect()->route('admin');
    }

    public function fetchDestroy(Request $request)
    {
        $data = ProductImg::find($request->id);
        if (ProductImg::destroy($request->id)) {
            File::delete(public_path($data->img));
            return true;
        } else {
            return false;
        }
    }

    public function fetchDestroyByProdId($productId)
    {
        $productImgs = ProductImg::where('product_id', $productId)->get();
        if (isset($productImgs)) {
            foreach ($productImgs as $productImg) {
                File::delete(public_path($productImg->img));
                $productImg->delete();
            }
            return true;
        } else {
            return false;
        }
    }

    public function summernote_base64_to_file($content)
    {
        if (!($content && Str::contains($content, ['src="data:image', 'src=\'data:image']))) {
            return $content;
        }

        $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';
        $res = preg_replace_callback($pattern, function ($matches) {
            // 生成路径
            $public_path = public_path();
            $folder_path = '/summernote/' . date('Ym') . '/' . date('d') . '/';
            if (!is_dir($dir = $public_path . $folder_path)) {
                mkdir($dir, 0777, true);
            }

            // 生成文件名
            $matches[2] = $matches[2] === 'jpeg' ? 'jpg' : $matches[2];
            $filename = md5(time() . \Illuminate\Support\Str::random()) . '.' . $matches[2];
            $file = $dir . $filename;

            // 保存文件
            file_put_contents($file, base64_decode($matches[4])); // base64 转图片

            // 返回相对路径
            return $folder_path . $filename;
        }, $content);

        return $res;
    }

    public function summernote_delete_image($content)
    {
        if (!($content && Str::contains($content, ['summernote']))) {
            return null;
        }

        $pattern = '/(\/summernote[^\'\"]+)/';
        $times = preg_match_all($pattern, $content, $matches);
        if ($times) {
            foreach ($matches[0] as $value) {
                unlink(public_path() . $value);
            }
        }
    }
}
