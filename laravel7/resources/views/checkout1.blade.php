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
                <div class="progess-bar"></div>
                <div class="progess-point-yet">
                    <p>
                        2
                    </p>
                    付款與運送方式
                </div>
                <div class="progess-bar-empty"></div>
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

        <!-- 訂單明細 -->
        <div class="row">
            <div class="col-12 text-left">
                <h3>
                    訂單明細
                </h3>
            </div>
        </div>

        @foreach ($cart as $item)
        <div class="app">
            <div class="row">
                <div class="col-12 position-relative">
                    <button class="position-absolute delBtn" onclick="deleteBtn(this,{{$item->id}})">X</button>
                    <div class="row">
                        <div class="col-1">
                            <img src="{{asset($item->attributes->img)}}" alt="">
                        </div>
                        <div class="col-3">
                            <p>
                                {{$item->name}}
                            </p>
                            #_{{$item->id}}
                        </div>
                        <div class="col-1 offset-4 d-flex">
                            <button class="product-quantity" onclick="minus(this);">減</button>
                            <input class="product-quantity" type="number" id="" value="{{$item->quantity}}">
                            <button class="product-quantity" onclick="plus(this);">加</button>
                        </div>
                        <input type="number" value="{{$item->price}}" hidden>
                        <div class="col-2 offset-1 product-sum">
                            {{number_format($item->quantity*$item->price)}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        @endforeach

        <!-- 計算欄位 -->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2 offset-8">
                        數量 :
                    </div>
                    <div class="col-2 result-count">
                        這裡要填入對應數量
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 offset-8">
                        小計 :
                    </div>
                    <div class="col-2 result-sum">
                        這裡要填入對應小計
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 offset-8">
                        運費 :
                    </div>
                    <div class="col-2 shopping-fee">
                        這裡要填入對應運費
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 offset-8">
                        總計 :
                    </div>
                    <div class="col-2 ending-sum">
                        這裡要填入對應總計
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- btn-block -->
        <div class="row">
            <div class="col-2">
                <a href="./main.html">返回購物</a>
            </div>
            <div class="offset-8 col-2">
                <a href="/checkout2">
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

<script>
    // 抓數量框
    let inputValue = document.querySelectorAll('input.product-quantity')
    inputValue.forEach((el) => {
        el.addEventListener('change',(e) => {
            // 隨數量框內的數字變更總額
            changeSum(el)
        })
    })
    
    function minus(event) {
        // 取得現有數量
        let currentValue = event.parentElement.querySelector('input').value * 1
        // 大於1才能減數量
        if (currentValue>1) {
            // 現有數量減一
            event.parentElement.querySelector('input').value = currentValue - 1
            // 修改頁面上顯示的總價
            changeSum(event)
        }
    }

    function plus(event) {
        let currentValue = event.parentElement.querySelector('input').value * 1
        event.parentElement.querySelector('input').value = currentValue + 1
        changeSum(event)
    }

    function changeSum(element) {
        // 取得單價
        let prodPrice = element.parentElement.nextElementSibling.value
        // 修改頁面上的總價並加上千分位
        let sumOnPage = element.parentElement.nextElementSibling.nextElementSibling
        sumOnPage.innerHTML = (prodPrice*element.parentElement.querySelector('input').value).toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")

        calcResult()
    }

    function calcResult() {
        
        // 取得每項商品的數量input
        let inputValue = document.querySelectorAll('input.product-quantity')
        // 取得數量的位置
        let resultCount = document.querySelector('.result-count') 
        // 要塞回頁面的小計
        let inputQty = 0
        inputValue.forEach((item) => {
            // 避免千分號，目前應該不會遇到
            inputQty += (item.value.toString().replace(/[,]+/g, ""))*1
        })
        // 加上千分號放回頁面
        resultCount.innerText = inputQty.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")

        // 取得所有單品總額
        let allProductSum = document.querySelectorAll('div.product-sum')
        // 取得小計的位置
        let resultSumDom = document.querySelector('.result-sum') 
        // 要塞回頁面的小計
        let resultSum = 0
        allProductSum.forEach((prod) => {
            // 把千分號(,)拔掉
            resultSum += (prod.innerText.replace(/[,]+/g, ""))*1
        })
        // 加上千分號放回頁面
        resultSumDom.innerText = resultSum.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")

        // 運費部分
        let shoppingFee = document.querySelector('.shopping-fee')
        // 如果大於一定數額免運費or小於一定數額要運費
        if (resultSum<10000) {
            shoppingFee.innerText = 80
        }else{
            // 免運
            shoppingFee.innerText = 0
        }

        // 結尾總計
        let endindSum = document.querySelector('.ending-sum')
        // 加上千分號放回頁面
        endindSum.innerText = ((resultSum*1)+(shoppingFee.innerText*1)).toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",")
    }

    function deleteBtn(event, productId){
        let theProductRow = event.parentElement.parentElement.parentElement
        // console.log(event);
        if (confirm(`是否要刪除此項商品`)) {
            var formData = new FormData();
            formData.append('productId', productId);
            formData.append('_token', '{{ csrf_token() }}');
            fetch('/shopping_cart/remove_specific_product',{
                method:'POST',
                body:formData
            }).then(
                response=>response.text()
            ).then(
                result=>{
                    if (result==='success') {
                        theProductRow.remove()
                        calcResult()
                    }
                }
            )
        }
    }

    calcResult()

</script>

@endsection