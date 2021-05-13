<div class="container">
    <a href="{{route('create')}}"><button class="btn btn-success">新增</button></a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>類型</th>
                <th>名稱</th>
                <th>價錢</th>
                <th>圖片</th>
                <th>敘述</th>
                <th>建立時間</th>
                <th>動作</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i)
            <tr>
                <td>{{$i->productType->name}}</td>
                <td>{{$i->name}}</td>
                <td>{{$i->price}}</td>
                <td><img src="{{asset($i->img)}}" alt=""></td>
                <td>{{$i->description}}</td>
                <td>{{$i->created_at}}</td>
                <td>
                    <a href="{{route('edit', ['id'=> $i->id])}}"><button class="btn btn-primary">編輯</button></a>
                    <a href="{{route('destroy', ['id'=> $i->id])}}"><button class="btn btn-danger">刪除</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>