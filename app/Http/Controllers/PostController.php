<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->paginate(3);
        $categories = Category::orderBy('id','desc')->paginate(4);
        $posts = Post::all();
        return \view('blog.index')->withPosts($posts)->withTags($tags)->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('blog.create')->withCategories($categories)->withTags($tags)->withPosts($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'location' => 'required',
            'linkLocation' => 'required',
            'tags' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',

        ]);

        $posts = new Post;
        $posts->title = $request->title;
        $posts->location = $request->location;
        $posts->linkLocation = $request->linkLocation;
        $posts->slug = str_slug($posts->title);
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;
        // untuk simpan image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = \public_path('/images'); //gambar akan tersimpan dalam public path folder image
                $file->move($destinationPath,$fileName);
                $posts->image = $fileName;
            }
        $posts->save();
        $posts->tags()->sync($request->tags); //untuk mengupdate/menambah tag pada post
        return back()->withInfo('Post baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tags = Tag::paginate(3);
        $categories = Category::paginate(4);
        $posts = Post::where('slug','=', $slug)->first();
        return view('blog.show')->withPosts($posts)->withTags($tags)->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::find($id);
        return view('blog.edit')->withPosts($posts)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5',
            'location' => 'required',
            'linkLocation' => 'required',
            'content' => 'required',

        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->location = $request->location;
        $post->linkLocation = $request->linkLocation;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images'); //gambar akan tersimpan dalam public path folder image
            $file->move($destinationPath, $fileName);

            $oldFilename = $post->image;
            \Storage::delete($oldFilename); //foto yg sudah ada dihapus dan diganti dgn yg baru
            $post->image = $fileName;
        }
        $post->save();
        $post->tags()->sync($request->tags); //untuk mengupdate/menambah tag pada post

        return \back()->withInfo('Post baru berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        Storage::delete($posts->image);
        $posts->tags()->detach();
        $posts->delete();
        return \back()->withInfo('Data berhasil di hapus!');
    }
}
