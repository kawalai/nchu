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
                <div class="progess-bar"></div>
                <div class="progess-point-yet">
                    <p>
                        3
                    </p>
                    填寫資料
                </div>
                <div class="progess-bar-empty"></div>
                <div class="progess-point-yet">
                    <p>
                        4
                    </p>
                    完成訂購
                </div>
            </div>
        </div>
        <hr>


        <form action="/shopping_cart/address" method="post">
            @csrf
            <!-- 計算欄位 -->
            <div class="row pay-way">
                <div class="col-12">
                    付款方式
                </div>
                <hr>
                @php
                $payment = Session::get('payment');
                $shipment = Session::get('shipment');
                @endphp
                <label class="col-12">
                    <input type="radio" name="payment" id="" value="credit" @if ($payment==='credit' ) checked @endif
                        required>
                    信用卡付款
                </label>
                <hr>
                <label class="col-12">
                    <input type="radio" name="payment" id="" value="atm" @if ($payment==='atm' ) checked @endif
                        required>
                    網路 ATM
                </label>
                <hr>
                <label class="col-12">
                    <input type="radio" name="payment" id="" value="store" @if ($payment==='store' ) checked @endif
                        required>
                    超商代碼
                </label>
                <hr>
            </div>
            <hr>
            <div class="row deliver-way">
                <div class="col-12">
                    運送方式
                </div>
                <hr>
                <label class="col-12">
                    <input type="radio" name="shipment" id="" value="home" @if ($shipment==='home' ) checked @endif
                        required>
                    黑貓宅配
                </label>
                <hr>
                <label class="col-12">
                    <input type="radio" name="shipment" id="" value="s2s" @if ($shipment==='s2s' ) checked @endif
                        required>
                    超商店到店
                </label>
                <hr>
            </div>

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
                    <a href="/checkout1" class="btn-previous">
                        上一步
                    </a>
                </div>
                <div class="offset-8 col-2">
                    <button class="btn-next">
                        下一步
                    </button>
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>


@endsection

@section('js')

@endsection