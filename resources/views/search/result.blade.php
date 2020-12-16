@extends('includes.head')
@section('title','Hasil Pencarian')
@section('content')


@if (count($posts)>0)
<div class="container">
    <div class="text-center">
        <h1>Hasil Pencarian</h1>
    </div>

    @foreach ($posts->all() as $post)
    <div class="post-item">
        <div class="post-inner">
            <div class="post-head clearfix">
                <div class="col-md-4">
                <a href=""><img src="{{asset('images/'.$post->image)}}" alt="gambar post" style="width: 50%; height:20%;"></a>
                </div>
                <div class="col-md-8">
                    <div class="detail">
                    <h3 class="handle">
                        <a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a>
                    </h3>
                    <h4 class="handle">{{$post->location}}</h4>
                    </div>
                    <div class="post-meta">
                        <div>
                        <span>{{date('j F Y',strtotime($post->created_at))}}</span>
                        <span>By: </span>
                        <span><a href="">Admin</a></span>
                        </div>
                    </div>
                    <span class="share">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                    </span>

                    {{-- menampilkan tag --}}
                    @foreach ($post->tags as $tag)
                    <span class="label label-success">{{$tag->name}}</span>
                    @endforeach
                    
                    {{-- isi konten --}}
                    <div class="content" style="margin-top:12px ">
                        {!!str_limit($post->content, 150)!!}
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endforeach
</div>
@else
    <div class="container" style="margin-bottom: 20%">
        <div class="text-center"><h1>Hasil Pencarian</h1></div>
        <div class="post-item">
            <div class="post-inner">
                <div class="text-center">
                    <h1>No Result Found -_-</h1>  
                </div>
               
            </div>
        </div>
          
    </div>    
@endif
    
@endsection