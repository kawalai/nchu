@extends('layouts.app')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('product_type_store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="data-form row">
            <label for="">名稱</label>
            <input name="name" type="text" />
        </div>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
