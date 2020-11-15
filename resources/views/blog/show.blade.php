@extends('includes.head')

@section('title',"$posts->title")

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="post-item">
                    <div class="post-inner">
                        <div class="post-head clearfix">
                            <div class="col-md-12">
                                <div class="detail">
                                    <h2 class="handle">{{$posts->title}}</h2>
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
                                        <i class="fa fa-reddit"></i>
                                    </div>
                                    <div class="tags">
                                        <span class="label label-success"># tags</span>
                                    </div>
                                    <div class="kategori">
                                        <span class="label label-default">{{$posts->category->name}}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="avatar_show"><a href="#"><img src="../images/post1.jpeg"></a></div>
                            <br>
                            <div class="post-content">
                                <p>{!! $posts->content!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                            <div class="col-md-3">
                                <div class="editdelete">
                                    <a href="{{route('posts.edit',$posts->id)}}" class="btn btn-block btn-success">Edit</a>
                                        <br>
                                    <form action="" method="post">
                                        <input type="" name="" value="Hapus" class="btn btn-block btn-danger">
                                    </form>
                                </div>
                            </div>

                            @include('includes.sidebar')
                        </div>
                    </div>



@endsection