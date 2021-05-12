@extends('layouts.template')

@section('css')

@endsection

@section('main')

<ul>
    <li>{{$data->type}}</li>
    <li>{{$data->name}}</li>
    <li>{{$data->price}}</li>
    <li><img src="{{$data->img}}" alt=""></li>
    <li>{{$data->description}}</li>
</ul>

@endsection

@section('js')

@endsection
