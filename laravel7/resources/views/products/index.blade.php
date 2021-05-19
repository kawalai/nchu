@extends('layouts.template')

@section('css')

@endsection

@section('main')

@include('products.component.list')

@endsection

@section('js')
<script src="{{asset('js/frontend.js')}}"></script>
@endsection
