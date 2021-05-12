@extends('layouts.template')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="{{$data->id}}">
        <div>類型<input type="text" value="{{$data->type}}"/></div>
        <div>名稱<input type="text" value="{{$data->name}}"/></div>
        <div>價格<input type="text" value="{{$data->price}}"/></div>
        <div>圖片<input type="file" accept="image/*" value="{{$data->img}}" /></div>
        <div>敘述<textarea name="" id="" cols="30" rows="10">{{$data->description}}</textarea></div>
    </form>
</div>

@endsection

@section('js')

@endsection