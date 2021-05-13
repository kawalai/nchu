<div class="container">
    <a href="{{route('product_type_create')}}"><button class="btn btn-success">新增</button></a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>名稱</th>
                <th>商品數量</th>
                <th>建立時間</th>
                <th>動作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i)
            <tr>
                <td>{{$i->name}}</td>
                <td>{{count($i->products)}}</td>
                <td>{{$i->created_at}}</td>
                <td>
                    <a href="{{route('product_type_edit', ['id'=> $i->id])}}"><button
                            class="btn btn-primary">編輯</button></a>
                    <a href="{{route('product_type_destroy', ['id'=> $i->id])}}"><button
                            class="btn btn-danger">刪除</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>