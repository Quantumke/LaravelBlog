<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BLogController extends Controller
{
    //
    ublic function index()
    {
        $POSTS = Posts::where ('published_at','<=',Carbon::now)())
            ->orderBy('published_at','desc')
            ->paginate(config('blog.posts_per_page'));
        return view('blog.index',compact('posts'));
    }
    public function showPOst($slug)
    {
        $post =Post::whereSlug($slug)->firstOrFail();
        return view ('blog.post')->withPost($post);
    }
}
