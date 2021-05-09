@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="{{asset('css/home.css')}}">
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
                                <th>標題</th>
                                <th>日期</th>
                                <th>內文</th>
                                <th>圖片</th>
                                <th>觀看數</th>
                                <th>編輯</th>
                                <th>刪除</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>


                </div>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
            </div>
        </div>
    </div>
</div>

<div class="ajax-modal"></div>

@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script>
    
    function afterAjax(){
        dataTable.data = response;
        dataTable.ajax.reload();
    }

    const dataTable = $('#example').DataTable({
        "ajax": {
            "url": "/news/home_all_data", //要抓哪個地方的資料
            "type": "POST", //使用什麼方式抓
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "dataType": 'json', //回傳資料的類型
            // "success": function(response){
            //     console.log("你是右邊!!")
            //     dataTable.ajax.reload(null, false);
            //     // afterAjax();
            //     // dataTable.data = response;
            //     // dataTable.draw();
            // }, //成功取得回傳時的事件
            // "error": function(){
            //     console.log("資料取得失敗 回去檢討檢討")
            //     } //失敗事件
            },
        "columns": [
            { "data": "title" },
            { "data": "date" },
            { "data": "content" },
            { "data": "img" },
            { "data": "views" },
            // { "data": "salary" }
            ],
        "language": {
                "processing": "處理中...",
                "loadingRecords": "載入中...",
                "lengthMenu": "顯示 _MENU_ 項結果",
                "zeroRecords": "沒有符合的結果",
                "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                "infoPostFix": "",
                "search": "搜尋:",
                "paginate": {
                    "first": "第一頁",
                    "previous": "上一頁",
                    "next": "下一頁",
                    "last": "最後一頁"
                },
                "aria": {
                    "sortAscending": ": 升冪排列",
                    "sortDescending": ": 降冪排列"
                }
            },
        "dom": `<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
            
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
                    // dataTable.draw(true);
                }
            });
        }
        function callModal(id){
            document.querySelector('.modal-title').innerHTML = `請確認是否刪除下列資料`
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
<script>
    function updateData(dataUpdate){
        $.ajax({
            data: dataUpdate,
            url: 'news/home_update',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $(`#componentModal`).modal('hide');
                $('#example').DataTable().ajax.reload();
                // location.reload();
            }
        });
    }
    function callEditModal(id){
        $.ajax({
            data: {id:id},
            url: 'news/home_edit',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('.ajax-modal').html(response);
                $('#component-modal-btn-sumbit').on('click', function(){
                    let dataUpdate = {
                        'id':id,
                        'title':document.querySelector('input[name=title]').value,
                        'date':document.querySelector('input[name=date]').value,
                        'views':document.querySelector('input[name=views]').value,
                        'img':document.querySelector('input[name=img]').value,
                        'content':document.querySelector('textarea[name=content]').value,
                    };
                    updateData(dataUpdate);
                })
                // hidden event remove modal
                $(`#componentModal`).on('hidden.bs.modal', function (e) {
                    document.querySelector(`#componentModal`).remove()
                    })
                $('#componentModal').modal('show');
            }
        });
        

    }
    $(document).ready(function(){
    // 編輯功能
        let btnEdit = document.querySelectorAll('.btn-edit')
        btnEdit.forEach((i)=>{
            let btnId = i.getAttribute('data-id')
            i.setAttribute('onclick',`callEditModal(${btnId})`)
        })
    });
    
</script>
@endsection