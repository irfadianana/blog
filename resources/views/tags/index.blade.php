@extends('includes.head')
@section('title','Tags Index')
@section('content')

<div class="container" style="min-height: 70vh">
    <div class="text-center">
        <h2>All Tags <small>({{$tags->total()}})</small></h2>
    </div>
    
    <hr>
    
    @foreach ($tags as $tag)
<h4><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a></h4>
        <div style="border-bottom: 1px solid #099; margin-bottom: 7px">
        <p>{{$tag->posts()->count()}} <i class="fa fa-list-alt"></i> Posts</p>
        </div>
    <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{$tag->created_at->diffForHumans()}}</small></p>
    @endforeach
</div>
<div class="text-center">
    {!!$tags->links();!!}
</div>

@endsection