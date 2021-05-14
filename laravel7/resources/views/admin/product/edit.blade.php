@extends('layouts.app')

@section('css')
<style>
    .del {
        position: relative;
    }

    .del_x {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        position: absolute;
        text-align: center;
        line-height: 25px;
        color: #fff;
        top: 0;
        right: 0;
        background-color: #f00;
    }
</style>
@endsection

@section('main')

<div class="container">
    <form action="{{route('update', ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="type_id">類型</label>
            {{-- <input name="type_id" type="text" value="{{$data->type}}" /> --}}
            <select class="form-control" name="type_id" id="type_id">
                @foreach ($productTypes as $productType)
                <option class="form-control" value="{{$productType->id}}" @if ($data->type_id == $productType->id)
                    selected @endif>{{$productType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">名稱</label>
            <input class="form-control" id="name" name="name" type="text" value="{{$data->name}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="price">價格</label>
            <input class="form-control" id="price" name="price" type="text" value="{{$data->price}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="img">主要圖片</label>
            <img src="{{$data->img}}" alt="">
            <input class="form-control" id="img" name="img" type="file" accept="image/*" value="{{$data->img}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="imgs">其他圖片</label>
            <input class="form-control" id="imgs" name="imgs[]" type="file" accept="image/*" multiple
                value="{{$data->img}}" />
            @foreach ($data->productImgs as $i)
            <div class="del">
                <img data-id="{{$i->id}}" width="200" src="{{$i->img}}" alt="">
                <span class="del_x">X</span>
            </div>
            @endforeach
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">敘述</label>
            <textarea class="form-control" id="description" name="description" cols="30"
                rows="10">{{$data->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>

@endsection

@section('js')
<script>
    $('.del_x').on('click', function(){
        // // 取得同階上一行
        console.log(this.previousElementSibling.getAttribute('data-id'));
        var imgId =this.previousElementSibling.getAttribute('data-id');

        if (confirm('是否刪除此圖片?')) {
            // alert('123');
            fetch(`/admin/fetchDestroy/${this.previousElementSibling.getAttribute('data-id')}`)
            .then(function(response) {
                return(response.text());
            }).then(function(result){
                if (result) {
                    location.reload();
                }
            })
            .catch(function(err) {
                // 錯誤處理
            });
        }
    })
</script>

@endsection