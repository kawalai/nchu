@extends('layouts.template')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="/news/update" method="POST">
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
</div>

@endsection

@section('js')

@endsection