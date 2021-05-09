@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('main')

<div class="container">
    <div class="title-bar">
        <img src="https://www.taiwan.net.tw/att/topTitleImg/21_0001001.svg" alt="">
        <h1>最新消息</h1>
    </div>
    <div class="data-infos">
        <div class="data-info">資料總筆數：<span>{{count($result)}}</span></div>
        <div class="data-info">每頁筆數：<span>10</span></div>
        <div class="data-info">總頁數：<span>18</span></div>
        <div class="data-info">目前頁次：<span>1</span></div>
    </div>
    <hr>
    @foreach ($result as $item)
    <section>
        <img src="{{$item->img}}" alt="">
        <div class="context">
            <div class="category"><span>最新消息</span></div>
            <div class="title"><a href="{{url('news/content')}}/{{$item->id}}">{{$item->title}}</a></div>
            <div class="date">{{$item->date}}</div>
            <div class="text">
                {{$item->content}}
            </div>
        </div>
    </section>
    @endforeach



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">請確認是否刪除下列資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">確定</button>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('js')

@endsection