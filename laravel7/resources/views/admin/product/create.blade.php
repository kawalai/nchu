@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('main')

<div class="container">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="">類型</label>
            {{-- <input name="type_id" type="text" /> --}}
            <select class="form-control" name="type_id" id="type_id">
                @foreach ($productTypes as $productType)
                <option value="{{$productType->id}}">{{$productType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">名稱</label>
            <input class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="price">價格</label>
            <input class="form-control" id="price" name="price" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="img">主要圖片</label>
            <input class="form-control" id="img" name="img" type="file" accept="image/*" />
            <img id="test" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="imgs">其他圖片</label>
            <input class="form-control" id="imgs" name="imgs[]" type="file" accept="image/*" multiple />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">敘述</label>
            <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="sort">排序</label>
            <input class="form-control" id="sort" name="sort" type="number" />
        </div>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
            // callbacks: {
            //     onImageUpload: function(files) {
            //         console.log(files);
            //         $('#description').summernote('insertImage', 'create');
            //     }
            // }
        });

        // 當要放預覽圖的input選取圖片後
        document.querySelector('#img').addEventListener('change',function(e){
            const file = this.files[0]
            const fr = new FileReader()
            fr.onload=e=> document.querySelector('#test').setAttribute('src', e.target.result)
            fr.readAsDataURL(file)
        })
    });
</script>
@endsection
