@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>date</th>
                                <th>content</th>
                                <th>img</th>
                                <th>views date</th>
                                <th>編輯</th>
                                <th>刪除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->content}}</td>
                                <td>{{$item->img}}</td>
                                <td>{{$item->views}}</td>
                                <td><button class="btn btn-warning btn-edit" data-id="{{$item->id}}" data-toggle="modal"
                                        data-target="#editModal">編輯</button></td>
                                <td><button class="btn btn-danger btn-destroy" data-id="{{$item->id}}" data-toggle="modal"
                                        data-target="#destroyModal">刪除</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>title</th>
                                <th>date</th>
                                <th>content</th>
                                <th>img</th>
                                <th>views date</th>
                                <th>編輯</th>
                                <th>刪除</th>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- editModal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                editModal
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary">確定</button>
            </div>
        </div>
    </div>
</div>
<!-- destroyModal -->
<div class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">請確認是否刪除下列資料</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body destroy-body">
                destroyModal
            </div>
            <div class="modal-footer destroy-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary">確定</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        let dataTable = $('#example').DataTable();
        // dataTable.on('click', 'tr',function(){ 
        //     console.log(this,'你在點我嗎?');
        // });
    });
</script>
<script>
    // 刪除功能
    function destroyData(id){
        $.ajax({
            data: {id:id},
            url: 'news/destroy',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(msg) {
                location.reload();
            }
        });
    }
    function callModal(id){
        document.querySelector('.destroy-body').innerHTML = `ID 為 ${id} 的資料`
        document.querySelector('.destroy-footer').innerHTML = `
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
            <button type="button" class="btn btn-primary" onclick="destroyData(${id});">確定</button>`
    }
    let btnDestroy = document.querySelectorAll('.btn-destroy')
    btnDestroy.forEach((i)=>{
        let btnId = i.getAttribute('data-id')
        i.setAttribute('onclick',`callModal(${btnId})`)
    })

</script>
@endsection