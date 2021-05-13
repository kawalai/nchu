@extends('layouts.app')

@section('css')

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
                <option class="form-control" value="{{$productType->id}}" @if ($data->type_id == $productType->id) selected @endif>{{$productType->name}}</option>
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
            <label class="col-sm-2 col-form-label" for="img">圖片</label>
            <input class="form-control" id="img" name="img" type="file" accept="image/*" value="{{$data->img}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">敘述</label>
            <textarea class="form-control" id="description" name="description" cols="30" rows="10">{{$data->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>

@endsection

@section('js')

@endsection