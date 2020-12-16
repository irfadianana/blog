@extends('includes.head')
@section('title',"$categories2->name")
@section('content')


<div class="container" style="margin-bottom: 150px; min-height: 85vh">
    <hr>
    <div class="text-center">
        @if ($categories2->id == 1)
        <img src="/images/eat.png" alt="" style="width: 15%; ">
        @elseif($categories2->id == 2)
        <img src="/images/play.png" alt="" style="width: 15%; ">
        @elseif($categories2->id == 3)
        <img src="/images/relax.png" alt="" style="width: 15%; ">
        @else
        <img src="/images/trip.png" alt="" style="width: 15%; ">
        @endif

    </div>
    
    <div class="text-center">
    <h1>{{$categories2->name}} <small>( {{$categories2->posts()->count()}} Posts)</small></h1>
    <hr>
    </div>
    <div class="row">
        <div class="col-md-9">
            {{-- menampilkan post sesuai kategori --}}
            @foreach ($categories2->posts as $post) 
            <div class="post-item">
                <div class="post-inner">
                    <div class="post-head clearfix">
                        <div class="col-md-4">
                        <a href=""><img src="{{asset('images/'.$post->image)}}" alt="gambar post" style="width: 100%; height:200px;"></a>
                        </div>
                        <br>
                        <div class="col-md-8">
                            <div class="detail">
                            <h3 class="handle"><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></h3>
                            <h4 class="handle">{{$post->location}}</h4>
                            </div>
                            <div class="post-meta">
                                <div>
                                <span>{{date('j F Y',strtotime($post->created_at))}}</span>
                                <span>By: </span>
                                <span><a href="">Admin</a></span>
                                </div>
                            </div>
                           

                            {{-- menampilkan ktegori --}}
                           
                            <span class="label label-success">{{$categories2->name}}</span>
                            
                            
                            {{-- isi konten --}}
                            {{-- <div class="content" style="margin-top:12px ">
                                {!!str_limit($post->content, 150)!!}
                            </div> --}}

                            <span class="share">
                                <i class="fa fa-thumbs-up"></i>
                            </span>
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