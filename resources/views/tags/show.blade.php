@extends('includes.head')
@section('title',"$tags2->name Tag")
@section('content')


<div class="container" style="margin-bottom: 150px">
    <hr>
    <div class="text-center">
    <h1>{{$tags2->name}} <small>( {{$tags2->posts()->count()}} Posts)</small></h1>
    <hr>
    </div>
    <div class="row">
        <div class="col-md-9">
            {{-- menampilkan post sesuai kategori --}}
            @foreach ($tags2->posts as $post) 
            <div class="post-item">
                <div class="post-inner">
                    <div class="post-head clearfix">
                        <div class="col-md-4">
                        <a href=""><img src="{{asset('images/'.$post->image)}}" alt="gambar post" style="width: 100%; height:auto;"></a>
                        </div>
                        <div class="col-md-8">
                            <div class="detail">
                            <h3 class="handle"><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></h3>
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
       
            @include('includes.sidebar')
        
    </div>
</div>

@endsection