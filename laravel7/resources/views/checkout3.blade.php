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

        <form action="/shopping_cart/checkoutEnd" method="post">
            @csrf
            <!-- 地址資料 -->
            <div class="row address-data">
                <div class="col-12">
                    寄送資料
                </div>
                <div class="col-12 form-group">
                    <label for="name">姓名</label>
                    <input class="form-control" type="text" name="name" placeholder="姓名" required>
                </div>
                <div class="col-12 form-group">
                    <label for="phone">電話</label>
                    <input class="form-control" type="text" name="phone" placeholder="電話" required>
                </div>
                <div class="col-12">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="mail" placeholder="Email" required>
                </div>
                <div class="form-group col-12">
                    <label for="email">地址</label>
                    <div class="city-selector-set d-flex col-12">
                        <select class="col-4 county form-control" required></select>
                        <select class="col-4 district form-control" required></select>
                        <input class="col-4 zipcode form-control" name="zipcode" type="text" size="3" readonly
                            placeholder="郵遞區號">
                    </div>
                    <div class="col-12">
                        <input class="form-control" type="text" name="address" placeholder="地址" required>
                    </div>
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
                            {{$data['qty']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 offset-8">
                            小計 :
                        </div>
                        <div class="col-2">
                            {{$data['sum']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 offset-8">
                            運費 :
                        </div>
                        <div class="col-2">
                            {{$data['shipping']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 offset-8">
                            總計 :
                        </div>
                        <div class="col-2">
                            {{$data['total']}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- btn-block -->
            <div class="row">
                <div class="col-2">
                    <a class="btn btn-previous" href="/checkout2">
                        上一步
                    </a>
                </div>
                <div class="offset-8 col-2">
                    <button class="btn-next">
                        下一步
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@section('js')

<script src="{{asset('js/tw-city-selector.js')}}"></script>
<script>
    new TwCitySelector({
      el: '.city-selector-set',
      elCounty: '.county', // 在 el 裡查找 element
      elDistrict: '.district', // 在 el 裡查找 element
      elZipcode: '.zipcode' // 在 el 裡查找 element
    });
</script>

@endsection