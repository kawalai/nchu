@extends('layouts.template')

@section('css')

@endsection

@section('main')
<div class="container">
    <ul>
        <li>{{$data->productType->name}}</li>
        <li>{{$data->name}}</li>
        <li>{{$data->price}}</li>
        <li>
            <div class="div-img" style="background-image: url({{$data->img}})"></div>
        </li>
        <li>
            <div class="img-container">
                @foreach ($data->productImgs as $item)
                <div class="div-img" style="background-image: url({{$item->img}})"></div>
                @endforeach
            </div>
        </li>
        <li>{!!$data->description!!}</li>
        <li><button id="add_to_cart" data-id="{{$data->id}}" class="btn btn-success">加入購物車</button></li>
    </ul>

</div>
@endsection

@section('js')

<script>
    $('#add_to_cart').on('click',function(){
        let productId = $('#add_to_cart').attr('data-id')
        let path = `/shopping_cart/add`
        let formData = new FormData()
        formData.append('_token', '{{csrf_token()}}')
        formData.append('productId', productId);
        fetch(path,{
            'method':'POST',
            'body':formData,
        }).then(
            response=> response.text()
        ).then(
            result=>{
                fetch(`/shopping_cart/content`).then(
                    response=> response.json()
                ).then(
                    secondResult=>{
                        console.log(secondResult);
                        // alert(secondResult[productId].name)
                        Swal.fire({
                            icon: 'success',
                            title: `${secondResult[productId].name} 加入成功`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                )
            }
        )
    })
</script>

@endsection
