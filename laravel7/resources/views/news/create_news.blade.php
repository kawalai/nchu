@extends('layouts.template')

@section('css')
@endsection

@section('main')

<div class="container">
    @if ($result)
    <form action="/news/update" method="POST">
    @else
    <form action="/news/store" method="POST">
    @endif
        @csrf
        <div class="form-group">
            @if ($result)
            <input type="hidden" name="id" value="{{$result->id}}" />
            @else
            <input type="hidden" name="id" />
            @endif
        </div>
        <div class="form-group">
            <label for="title">標題</label>
            @if ($result)
            <input type="text" name="title" id="title" value="{{$result->title}}" />
            @else
            <input type="text" name="title" id="title" />
            @endif
        </div>
        <div class="form-group">
            <label for="date">時間</label>
            @if ($result)
            <input type="date" name="date" id="date" value="{{$result->date}}" />
            @else
            <input type="date" name="date" id="date" />
            @endif

        </div>
        <div class="form-group">
            <label for="img">圖片</label>
            @if ($result)
            <input type="text" name="img" id="img" value="{{$result->img}}" />
            @else
            <input type="text" name="img" id="img" />
            @endif
        </div>
        <div class="form-group">
            <label for="views">觀看數</label>
            @if ($result)
            <input type="text" name="views" id="views" value="{{$result->views}}" />
            @else
            <input type="text" name="views" id="views" />
            @endif
        </div>
        <div class="form-group">
            <label for="content">內容</label>
            @if ($result)
            <textarea name="content" id="content" cols="30" rows="10">{{$result->content}}</textarea>
            @else
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            @endif
        </div>
        <button>送出</button>
    </form>
</div>

@endsection

@section('js')
@endsection