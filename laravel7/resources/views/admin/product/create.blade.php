@extends('layouts.app')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="data-form row">
            <label for="">類型</label>
            <input name="type" type="text" />
        </div>
        <div class="data-form row">
            <label for="">名稱</label>
            <input name="name" type="text" />
        </div>
        <div class="data-form row">
            <label for="">價格</label>
            <input name="price" type="text" />
        </div>
        <div class="data-form row">
            <label for="">圖片</label>
            <input name="img" type="file" accept="image/*" />
        </div>
        <div class="data-form row">
            <label for="">敘述</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
