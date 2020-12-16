@extends('includes.head')
@section('title', 'Welcome')

@section('content')


 <div class="header_wrap">
  <div class="info">
     <div class="container">
         <div class="row">
           
            </div>
        </div>
  </div>
</div>
 
        <section class="wp-separator" >
            <article class="section">
                <div class="container">
                    <div class="row text-center">
                        <a href="{{ url('/category/1') }}" style="margin-right:20px"><img src="/images/eat.png" alt="Eat Category" style="width: 6%;"></a>
                        <a href="{{ url('/category/2') }}" style="margin-right:20px"><img src="/images/play.png" alt="Play Category" style="width: 6%;"></a>
                        <a href="{{ url('/category/3') }}" style="margin-right:20px"><img src="/images/relax.png" alt="Relax Category" style="width: 6%;"></a>
                        <a href="{{ url('/category/4') }}" ><img src="/images/trip.png" alt="Trip Category" style="width: 6%;"></a>
                    </div>
                    <div class="row text-center" style="color: black; ">
                        <span style="margin-right:65px">Eat</span>
                        <span style="margin-right:65px">Play</span>
                        <span style="margin-right:65px">Relax</span>
                        <span>Trip</span>
                    </div>
                </div>
            </article>
        </section>

<div class="container-fluid">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                <div class="well well-sm wl">
                    
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
                        </span> List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="fa fa-th"></span> Grid</a>
                    </div>
                </div>

      <div id="grid_post" class="row list-group">

 
 @foreach($posts as $post)
         <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail as">
            <img class="group list-group-image" src="{{asset('images/'.$post->image)}}" alt="gambar" style="width: inherit; height: inherit; " />
                <div class="caption">
                   
                    <div class="c_hr">
                    <h4 class="group inner list-group-item-heading"><a href="/posts/{{$post->slug}}">{{ str_limit($post->title,20)}}</a></h4>
                    <h4 class="group inner list-group-item-heading">{{$post->location}}</h4>
                         <small>{{date('j F Y,h:ia', strtotime($post->created_at))}}</small> | by 
                         <a href="#">Admin</a>
                     </div>
                    
                     
                    <div class="group inner list-group-item-text share">
                        <a href="/posts/{{$post->slug}}"><button class="btn btn-primary" >More Info</button></a>
                    </div>
                   
                </div>
                
            </div>
        </div>

     @endforeach

  </div><!-- end grid -->
</div>

  {{-- @include('includes.sidebar') --}}
    </div><!-- end row -->
    <div class="container-fluid text-center" style="background-color: #cff5ff">
       <p>Singgahki' di</p> 
        <p> Merupakan ciri khas dari website kami yang di dalamnya mendeskripsikan temapt wisata di Sulawesi Selatan yang menyediakan informasi tentang lokasi tempat wisata yang disertai gambar dari fasilitas yang tersedia di tempat tersebut. Dalam website ini pengguna dapat memberikan komentas dan rekomendasi tempat wisata lain yang belum terdapat di website
        </p>
    </div>
</div>
       </section>
       <div class="text-center">
        {!!$posts->links();!!}
         </div>
       
      
</div><!-- end con fluid -->


@endsection