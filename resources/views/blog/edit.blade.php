@extends('includes.head')
@section('title','Edit Post')
@section('content')

<br>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="well">
        
            <form action="{{route('posts.update', $posts->id)}}" method="post">
                <div class="text-center"><h4>Buat Post Baru</h4></div>
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="{{$posts->title}}" class="form-control" placeholder="Input Title...">
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