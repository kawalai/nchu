<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ProductType::get();
        $data = Product::with('productType')->orderBy('sort', 'desc')->get();
        return view('products.index', compact('data', 'types'));
    }

    public function typeSearch(Request $request)
    {
        if ($request->id == 0) {
            $data = Product::with('productType', 'productImgs')->orderBy('sort', 'desc')->get();
        } else {
            $data = Product::with('productType', 'productImgs')->where('type_id', $request->id)->orderBy('sort', 'desc')->get();
        }


        // // 處理要顯示在頁面上的資料
        // $dataString = '';
        // foreach ($data as $item) {
        //     $dataString .= "<article>
        //     <a href='/products/content/{$item->id}'>
        //         <h3>{$item->productType->name}</h3>
        //         <div>{$item->name}</div>
        //         <div>{$item->price}</div>
        //         <div>
        //             <div class='div-img' style='background-image: url({$item->img})'></div>
        //         </div>
        //         <div>{$item->description}</div>
        //         <div>{$item->created_at}</div>
        //     </a>
        // </article>";
        // }

        return $data;
    }

    public function content($id)
    {
        $data = Product::with('productType', 'productImgs')->find($id);
        return view('products.content', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
