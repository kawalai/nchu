<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
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
        $data = Product::all();
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
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request->all();
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $path = Storage::disk('myfile')->putfile('p', $file);
            // dd(Storage::disk('myfile')->url($path));
            $data['img'] = Storage::disk('myfile')->url($path);
        }
        // $path =  Storage::disk('myfile')->putfile('upload', $data);
        // Storage::disk('myfile')->url($path);
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
        $data = Product::find($id);
        // $path =  Storage::disk('myfile')->putfile('upload', $data);
        // Storage::url($path);
        return view('products.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $path =  Storage::disk('myfile')->putfile('upload', $data);
        // Storage::url($path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
