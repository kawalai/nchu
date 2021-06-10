@extends('layouts.template')

@section('css')

<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

@endsection

@section('main')

<div class="container checkout1">
    <div class="main-shopping">

        <!-- title -->
        <div class="row">
            <div class="col-12 text-left">
                <h2>
                    購物車
                </h2>
            </div>
        </div>

        <!-- 進度條 -->
        <div class="row">
            <div class="col-12 d-flex justify-content-around">
                <div class="progess-point">
                    <p>
                        1
                    </p>
                    確認購物車
                </div>
                <div class="progess-bar-full"></div>
                <div class="progess-point">
                    <p>
                        2
                    </p>
                    付款與運送方式
                </div>
                <div class="progess-bar-full"></div>
                <div class="progess-point">
                    <p>
                        3
                    </p>
                    填寫資料
                </div>
                <div class="progess-bar"></div>
                <div class="progess-point-yet">
                    <p>
                        4
                    </p>
                    完成訂購
                </div>
            </div>
        </div>
        <hr>

        <!-- 訂單明細 -->
        <div class="row">
            <div class="col-12 text-left">
                <h3>
                    訂單明細
                </h3>
            </div>
        </div>

        <!-- 地址資料 -->
        <div class="row address-data">
            <div class="col-12">
                寄送資料
            </div>
            <div class="col-12">
                姓名
            </div>
            <div class="col-12">
                <input type="text" placeholder="姓名">
            </div>
            <div class="col-12">
                電話
            </div>
            <div class="col-12">
                <input type="text" placeholder="電話">
            </div>
            <div class="col-12">
                Email
            </div>
            <div class="col-12">
                <input type="text" placeholder="Email">
            </div>
            <div class="col-12">
                地址
            </div>
            <div class="col-6">
                <input type="text" placeholder="城市">
            </div>
            <div class="col-6">
                <input type="text" placeholder="郵遞區號">
            </div>
            <div class="col-12">
                <input type="text" placeholder="地址">
            </div>
        </div>


        <!-- 計算欄位 -->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2 offset-8">
                        數量 :
                    </div>
                    <div class="col-2">
                        這裡要填入對應數量
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 offset-8">
                        小計 :
                    </div>
                    <div class="col-2">
                        這裡要填入對應小計
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 offset-8">
                        運費 :
                    </div>
                    <div class="col-2">
                        這裡要填入對應運費
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 offset-8">
                        總計 :
                    </div>
                    <div class="col-2">
                        這裡要填入對應總計
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- btn-block -->
        <div class="row">
            <div class="col-2">
                <a href="/checkout2">
                    <button class="btn-previous">
                        上一步
                    </button>
                </a>
            </div>
            <div class="offset-8 col-2">
                <a href="/checkout4">
                    <button class="btn-next">
                        下一步
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection