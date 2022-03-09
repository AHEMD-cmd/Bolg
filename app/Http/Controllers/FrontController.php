<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Settings;
use App\Tag;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   
    public function index()
    {
        $settings = Settings::first();
        $cats = Category::select('id', 'name')->take(5)->get();
        $categories = Category::with('posts')->select('id', 'name')->take(3)->get();
        $first_post = Post::with('category')->latest()->first();
        $second_post = Post::with('category')->latest()->skip(1)->take(1)->first();
        $third_post = Post::with('category')->latest()->skip(2)->take(1)->first();

        return view('index', compact('settings', 'first_post', 'cats', 'second_post', 'third_post', 'categories'));
    }





    public function search()
    {
        $posts = Post::where('title', 'like', '%'. request('query'). '%')->get();
        $settings = Settings::first();
        $tags = Tag::select('id', 'tag')->get();
        $cats = Category::select('id', 'name')->take(5)->get();
        $query = request('query');
        return view('search', compact('settings', 'cats', 'posts', 'tags', 'query'));

    }

    
    public function single_page($slug)
    {
        $settings = Settings::first();
        $tags = Tag::select('id', 'tag')->get();
        $cats = Category::select('id', 'name')->take(5)->get();
        $post = Post::with('category', 'tags', 'user')->where('slug', $slug)->first();
        $next = Post::where('id', '>', $post->id)->first();
        $prev = Post::where('id', '<', $post->id)->first();
        return view('single', compact('settings', 'cats', 'post', 'next', 'prev', 'tags'));

    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function category($id)
    {
        $settings = Settings::first();
        $tags = Tag::select('id', 'tag')->get();
        $cats = Category::select('id', 'name')->take(5)->get();
        $category = Category::with('posts')->where('id', $id)->first();
        return view('category', compact('settings', 'cats', 'category', 'tags'));

    }
    public function tag($id)
    {
        $settings = Settings::first();
        $tags = Tag::select('id', 'tag')->get();
        $cats = Category::select('id', 'name')->take(5)->get();
        $tag = Tag::with('posts')->where('id', $id)->first();
        return view('tag', compact('settings', 'cats', 'tag', 'tags'));

    }



  
  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
