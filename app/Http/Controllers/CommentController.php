<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function createComment(Request $request, Post $post)
    {
        $comment= New Comment;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);

        return \back()->withInfo('Komentar telah terkirim:)');
    }
}
