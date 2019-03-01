<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post)
    {
      return view('blog.show')->with('post', $post);
    }

    public function category(Category $category)
    {
      $search = request()->query('search');

      if ($search) {
        $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
      } else {
        $posts = $category->posts()->simplePaginate(3);
      }

      return view('blog.category')
        ->with('category', $category)
        ->with('posts', $posts)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
      return view('blog.tag')
        ->with('tag', $tag)
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('posts', $tag->posts()->simplePaginate(3));
    }
}
