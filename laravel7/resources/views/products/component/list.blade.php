<div class="container">
    @foreach ($data as $i)
    <div>
        <a href="{{url('products/content')}}/{{$i->id}}">
            <ul>
                <li>{{$i->name}}</li>
                <li>{{$i->price}}</li>
                <li><img src="{{$i->img}}" alt=""></li>
                <li>{{$i->description}}</li>
                <li>{{$i->created_at}}</li>
            </ul>
        </a>
    </div>
    @endforeach
</div>