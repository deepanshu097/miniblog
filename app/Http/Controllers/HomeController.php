<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user()->id;
        $posts = Post::orderBy('created_at','desc')->get();
        return view('blog.home',['posts'=>$posts]);
    }
}
