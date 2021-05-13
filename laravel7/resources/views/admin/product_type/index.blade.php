@extends('layouts.app')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
<style>
    img{
        max-width: 200px;
    }
</style>


@endsection

@section('main')

@include('admin.product_type.component.list')

@endsection

@section('js')

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script>
    const dataTable = $('#example').DataTable();
</script>

@endsection
