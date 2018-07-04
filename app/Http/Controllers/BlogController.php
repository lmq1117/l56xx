<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    //
    public function index()
    {
        $posts = Post::where('published_at','<=',time())
            ->orderBy('published_at','desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.home.index',compact('posts'));
    }


    public function showPost($slug)
    {
        $post = Post::where('slug','=',$slug)->firstOrFail();
        return view('blog.home.post')->with(['post'=>$post]);
    }
}
