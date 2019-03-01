<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function show(Post $post)
    {
      return view('blog.show')->with('post', $post);
    }
}
