@extends('includes.head')
@section('title','Create Post')
@section('content')

<br>
<div class="container">

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Add New Post</a></li>
      <li><a data-toggle="tab" href="#menu1"><i class="fa fa-list-alt" aria-hidden="true"></i> All Post</a></li>
    </ul>
  
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
          <br>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
                
                    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                        <div class="text-center"><h4>Buat Post Baru</h4></div>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Input Title...">
                        </div>
                        
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" name="location" class="form-control" placeholder="Input Location...">
                        </div>

                        <div class="form-group">
                            <label for="linkLocation">Link Location:</label>
                            <input type="link" name="linkLocation" class="form-control" placeholder="Input Link Location...">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="category_id" class="form-control">
                                <option value="" class="disable selected">Pilih Kategori</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
        
                        <div class="form-group">
                            <label for="tags">Tag:</label>
                            <select name="tags[]" multiple="multiple" class="form-control selectpicker">
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                            </select>
                        </div>
        
                        {{-- //untuk input gambar --}}
                        <div class="form-group">
                            <label for="image">Pilih Gambar</label>
                            <input type="file" name="image" class="form-control">
                        </div>
        
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea type="" name="content" class="form-control" placeholder="Input Content..."></textarea>
                        </div>
        
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

      {{-- tab menu semua Post --}}
      <div id="menu1" class="tab-pane fade">
        <br>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="info">
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Tanggal Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td><a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="#{{$post->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                                        <td>{{$post->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>
                        {{-- modal untuk hapus post  --}}
                        @foreach($posts as $post)
                        <div class="modal fade" id="{{$post->id}}-delete">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden='true'>
                                            &times;
                                        </button>
                                        <h4 class="modal-title">Hapus Post?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h2>{{$post->title}}</h2>
                                        <form action="{{route('posts.destroy',$post->id)}}" method="post" role="form">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <br>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
      </div>
      {{-- end tab menu 1 --}}
      
    </div>
    {{-- end tab content --}}
  </div>
  {{-- end container --}}


@endsection

@section('tekseditor')
<script>
    CKEDITOR.replace( 'content' );
</script>  
@endsection
