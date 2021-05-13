@extends('layouts.app')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">類型</label>
            {{-- <input name="type_id" type="text" /> --}}
            <select name="type_id" id="type_id">
                @foreach ($productTypes as $productType)
                <option value="{{$productType->id}}">{{$productType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">名稱</label>
            <input id="name" name="name" type="text" />
        </div>
        <div class="form-group">
            <label for="price">價格</label>
            <input id="price" name="price" type="text" />
        </div>
        <div class="form-group">
            <label for="img">圖片</label>
            <input id="img" name="img" type="file" accept="image/*" />
        </div>
        <div class="form-group">
            <label for="description">敘述</label>
            <textarea id="description" name="description" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection