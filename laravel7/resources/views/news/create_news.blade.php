@extends('layouts.template')

@section('css')
@endsection

@section('main')

<div class="container">
    
    @if (isset($result))
    <form action="/news/update" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" name="id" value="{{$result->id}}" />
        </div>
        <div class="form-group">
            <label for="title">標題</label>
            <input type="text" name="title" id="title" value="{{$result->title}}" />
        </div>
        <div class="form-group">
            <label for="date">時間</label>
            <input type="date" name="date" id="date" value="{{$result->date}}" />

        </div>
        <div class="form-group">
            <label for="img">圖片</label>
            <input type="text" name="img" id="img" value="{{$result->img}}" />
        </div>
        <div class="form-group">
            <label for="views">觀看數</label>
            <input type="text" name="views" id="views" value="{{$result->views}}" />
        </div>
        <div class="form-group">
            <label for="content">內容</label>
            <textarea name="content" id="content" cols="30" rows="10">{{$result->content}}</textarea>
        </div>
        <button>送出</button>
    </form>
    @else
    <form action="/news/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">標題</label>
            <input type="text" name="title" id="title" />
        </div>
        <div class="form-group">
            <label for="date">時間</label>
            <input type="date" name="date" id="date" />
        </div>
        <div class="form-group">
            <label for="img">圖片</label>
            <input type="text" name="img" id="img" />
        </div>
        <div class="form-group">
            <label for="views">觀看數</label>
            <input type="text" name="views" id="views" />
        </div>
        <div class="form-group">
            <label for="content">內容</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <button>送出</button>
    </form>
    @endif
</div>

@endsection

@section('js')
@endsection