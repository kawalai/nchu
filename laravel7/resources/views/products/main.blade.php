<div class="container">
    @foreach ($data as $i)
    <div class="product">
        <ul>
            <li>{{$i->id}}</li>
            <li>{{$i->title}}</li>
            <li>{{$i->price}}</li>
            <li><img src="{{$i->img}}" alt=""></li>
            <li>{{$i->content}}</li>
            <li>{{$i->created_at}}</li>
        </ul>
    </div>
    @endforeach
</div>