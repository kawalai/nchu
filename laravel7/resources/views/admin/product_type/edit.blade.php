@extends('layouts.app')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('product_type_update', ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="data-form row">
            <label for="">名稱</label>
            <input name="name" type="text" value="{{$data->name}}" />
        </div>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>

@endsection

@section('js')

@endsection