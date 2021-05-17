<div class="container product-container">

    <div class="product-category">
        <a class="btn btn-success" href="{{route('products')}}">所有產品</a>
        @foreach ($types as $type)
        <a class="btn btn-success" href="{{route('products.type.search', ['typeId' => $type->id])}}">{{$type->name}}</a>
        {{-- <button data-id="{{$type->id}}">{{$type->name}}</button> --}}
        @endforeach
    </div>

    <div class="product-list">
        @foreach ($data as $i)
        <article>
            <a href="{{url('products/content')}}/{{$i->id}}">
                <h3>{{$i->productType->name}}</h3>
                <div>{{$i->name}}</div>
                <div>{{$i->price}}</div>
                <div>
                    <div class="div-img" style="background-image: url({{$i->img}})"></div>
                </div>
                <div>{{$i->description}}</div>
                <div>{{$i->created_at}}</div>
            </a>
        </article>
        @endforeach
    </div>
</div>
