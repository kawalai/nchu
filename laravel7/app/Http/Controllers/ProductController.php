<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::with('productType')->all();
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
        Product::create($data);

        return redirect()->route('admin');
    }


    public function storetest($times, Request $request)
    {
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
        $data = Product::with('productType')->find($id);
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
        $dbData = Product::find($id);

        if (isset($dbData->img)) {
            File::delete(public_path($dbData->img));
        }

        Product::destroy($id);
        // $path =  $myfile->putfile('upload', $data);
        // Storage::url($path);

        return redirect()->route('admin');
    }
}
