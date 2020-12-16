@extends('includes.head')
@section('title','Edit Post')
@section('content')

<br>

<div class="container">
    <a href="{{ url('/posts/create') }}"><button class="btn btn-primary">Back</button></a>
    <br>
    <div class="col-md-8 col-md-offset-2">
        <div class="well">
        
            <form action="{{route('posts.update', $posts->id)}}" method="post" enctype="multipart/form-data">
                <div class="text-center"><h4>Edit Post</h4></div>
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="{{$posts->title}}" class="form-control" placeholder="Input Title...">
                </div>

                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" value="{{$posts->location}}" class="form-control" placeholder="Input Location...">
                </div>

                <div class="form-group">
                    <label for="linkLocation">Link Location:</label>
                    <input type="link" name="linkLocation" value="{{$posts->linkLocation}}" class="form-control" placeholder="Input Link Location...">
                </div>


                {{-- untuk category --}}
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select name="category_id" class="form-control">
                        <option value="" class="disable selected">Pilih Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}"<?php if ($posts->category_id == $category->id) {
                        echo"selected";
                    }?>>{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>

                {{-- untuk tag --}}
                <div class="form-group">
                    <label for="tags">Tag:</label>
                    <select name="tags[]" multiple="multiple" class="form-control selectpicker">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                    </select>
                </div>

                {{-- untuk gambar --}}
                <div class="form-group">
                    <label for="image">Pilih Gambar</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <img src="{{asset('images/'.$posts->image)}}" style="width:50%" height="50%">
                </div>
                
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea type="" name="content" class="form-control" placeholder="Input Content...">{{$posts->content}}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                
            </form>
            
        </div>
    </div>

    
</div>


@endsection

@section('tekseditor')
<script type="text/javascript">
    $('.selectpicker').selectpicker().val({!!json_encode($posts->tags()->allRelatedIds())!!}).trigger('change');

    CKEDITOR.replace( 'content' );
</script>
    
@endsection