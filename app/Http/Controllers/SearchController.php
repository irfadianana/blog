<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');
        $posts = Post::where('title','LIKE','%' .$query. '%')->get();
        
        return \view('search.result',['posts'=>$posts]);
    }
}
