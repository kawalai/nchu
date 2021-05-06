@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('main')

<div class="container">
    <div class="title">{{$result->title}}</div>
    <div class="info">發布日期：{{$result->date}} 瀏覽次數：{{$result->views}}</div>
    <hr>
    <section>
        {{$result->content}}
    </section>
</div>

@endsection

@section('js')

@endsection