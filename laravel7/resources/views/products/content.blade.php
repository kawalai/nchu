@extends('layouts.template')

@section('css')

@endsection

@section('main')

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
    <li>{{$data->description}}</li>
</ul>

@endsection

@section('js')

@endsection
