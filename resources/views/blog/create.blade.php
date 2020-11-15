@extends('includes.head')
@section('title','Create Post')
@section('content')

<br>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="well">
        
            <form action="{{route('posts.store')}}" method="post">
                <div class="text-center"><h4>Buat Post Baru</h4></div>
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Input Title...">
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category_id" class="form-control">
                        <option value="" class="disable selected">Pilih Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tag:</label>
                    <select name="tags" multiple="multiple" class="form-control selectpicker">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea type="" name="content" class="form-control" placeholder="Input Content..."></textarea>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection