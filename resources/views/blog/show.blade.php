@extends('includes.head')

@section('title',"$posts->title")

@section('content')

<br>
    <div class="container " >
        <div class="row" >
            <div class="col-md-9" >
                <div class="post-item">
                    <div class="post-inner" style="background: #cff5ff">
                        <div class="post-head clearfix">
                            <div class="col-md-12">
                                <div class="detail">
                                    <h2 class="handle">{{$posts->title}}</h2>
                                    <h4 class="handle">{{$posts->location}}</h4>
                                    <div class="post-meta">
                                    <div class="asker-meta">
                                        <span>{{date('j F Y', strtotime($posts->created_at))}}</span>
                                        <span>by</span>
                                        <span><a href="#">Admin</a></span>
                                    </div>
                                    <div class="share">
                                        <label>Share:</label>
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-instagram"></i>
                                    </div>
                                    <div class="tags">
                                        @foreach ($posts->tags as $tag)
                                        <span class="label label-success"># {{$tag->name}}</span>
                                        @endforeach
                                       
                                    </div>
                                    <div class="kategori">
                                        <span class="label label-default">{{$posts->category->name}}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                            
                            <div class="avatar_show col-md-8">
                                <a href="#"><img src="{{asset('images/'.$posts->image)}}" style="width: 90%; height:300px"></a>
                            </div>
                            <div class="location col-md-4 text-center">
                                <br><br><br>
                                <img src="/images/place.png" style="width: 70%" alt=""> <br><br>
                            <a href="{{$posts->linkLocation}}" target="_blank" style="text-decoration: none"><p> Click to find location</p></a>
                            </div>
                            <br>
                            <div class="col-md-12">
                            <div class="post-content">
                                <h3>Get To Know!! </h3>
                                <p>{!! $posts->content!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- comment form --}}
            <hr>
            <h4>Comment</h4>
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading" style="border-bottom: none">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">All Comment</a></li>
                        <li><a href="#tab2" data-toggle="tab">Add Comment</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                    
                            @if($posts->comments()->count() < 1)
                             <div class="text-center">No Comment</div>
                            @else    
                                @foreach ($posts->comments as $comment)
                                <div class="post-item">
                                    <div class="post-inner">
                                        <div class="post-head clearfix">
                                            <div class="col-md-2">
                                                <img src="//a.disquscdn.com/1504815928/images/noavatar92.png" style="border-radius: 120px;" alt="">
                                            </div>

                                            <div class="col-md-10">
                                                <h5>{{$comment->comment}}</h5>
                                                <hr>
                                                <p>by <a href="">{{$comment->user->name}}</a></p>
                                                <div class="pull-right">
                                                    <small>{{$comment->created_at->diffforHumans()}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                
                        </div>
                       
                        {{-- add comment --}}
                        <div class="tab-pane fade" id="tab2">
                        <form action="{{route('createComment.store',$posts->id)}}" method="post">
                            {{csrf_field()}}
                                <label>Tulis Komentar :</label>
                                <div class="form-group">
                                    <textarea type="text" name="comment" class="form-control" placeholder="Tulis disini yah" cols="30" rows="5"></textarea>
                                </div>

                                <button class="btn btn-success" type="submit">Submit</button>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div> 
                            @include('includes.sidebar')
                        </div>
                    </div>



@endsection