@extends('layouts.app')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="">類型</label>
            {{-- <input name="type_id" type="text" /> --}}
            <select class="form-control" name="type_id" id="type_id">
                @foreach ($productTypes as $productType)
                <option value="{{$productType->id}}">{{$productType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">名稱</label>
            <input class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="price">價格</label>
            <input class="form-control" id="price" name="price" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="img">圖片</label>
            <input class="form-control" id="img" name="img" type="file" accept="image/*" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">敘述</label>
            <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection