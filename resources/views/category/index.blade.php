@extends('includes.head')
@section('title','Categories Index')
@section('content')

<div class="container" style="margin-bottom: 60px; min-height: 75vh">
    <div class="text-center">
        <h2>All Categories <small>({{$categories->total()}})</small></h2>
    </div>
    
    <hr>
    
    @foreach ($categories as $category)
        <h4><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></h4>
        <div style="border-bottom: 1px solid #099; margin-bottom: 7px">
        <p>{{$category->posts()->count()}} <i class="fa fa-list-alt"></i> Posts</p>
        </div>
    <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{$category->created_at->diffForHumans()}}</small></p>
    @endforeach
</div>
<div class="text-center">
    {!!$categories->links();!!}
</div>

@endsection