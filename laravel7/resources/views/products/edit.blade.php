@extends('layouts.app')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('update', ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="data-form row">
            <label for="">類型</label>
            <input name="type" type="text" value="{{$data->type}}" />
        </div>
        <div class="data-form row">
            <label for="">名稱</label>
            <input name="name" type="text" value="{{$data->name}}" />
        </div>
        <div class="data-form row">
            <label for="">價格</label>
            <input name="price" type="text" value="{{$data->price}}" />
        </div>
        <div class="data-form row">
            <label for="">圖片</label>
            <input name="img" type="file" accept="image/*" value="{{$data->img}}" />
        </div>
        <div class="data-form row">
            <label for="">敘述</label>
            <textarea name="description" id="" cols="30" rows="10">{{$data->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>

@endsection

@section('js')

@endsection