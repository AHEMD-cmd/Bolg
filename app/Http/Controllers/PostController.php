<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'content', 'img')->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $tags = Tag::select('id', 'tag')->get();
        if(count($categories) == 0){
            return redirect()->route('category.create')->with('cat', 'Sorry, you need to create category first!');
        }
        if($tags->count() == 0 ){
            return redirect()->route('tag.create')->with('cat', 'Sorry, you need to create tag first!');
        }

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|max:1000',
            'img' => 'image|required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('img')){
            $file = $request->file('img');
            $imageName = time().'_'. $file->getClientOriginalName();
            $file->move(\public_path('post_img/'),$imageName);
            $data['img'] = $imageName;
        }

        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::id();

        $post = Post::create($data);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully!');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cats = Category::select('id', 'name')->get();
        $post = Post::with('tags')->findOrFail($id);
        // $post_tags = $post->tags()->pluck('id')->toArray();
        $tags = Tag::select('id', 'tag')->get();
        return view('admin.post.edit', compact('cats', 'post', 'tags'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|max:1000',
            'img' => 'image|nullable',
            'category_id' => 'required',

        ]);

        $data = $request->except('img');

        if($request->hasFile('img')){
            if(File::exists('post_img/'.$post->img)){
                File::delete('post_img/'.$post->img);
            }

            $file = $request->file('img');
            $imageName = time().'_'. $file->getClientOriginalName();
            $file->move(\public_path('post_img/'),$imageName);
            $data['img'] = $imageName;
        }

        $data['slug'] = Str::slug($request->title);


        $post->update($data);
        $post->tags()->sync($request->tags);


        Session::flash('success', 'Post updated successfully!');

        return redirect()->route('post.index');
    }


    public function destroy($id)
    {

        $post = Post::findOrFail($id);
        if(File::exists('post_img/'.$post->img)){
            File::delete('post_img/'.$post->img);
        }
        $post->forceDelete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');

    }

    public function softDelete($id)
    {

        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post was just trashed!');

    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('post.index')->with('success', 'Post restored successfully!');

    }

    public function trash()
    {

        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trash', compact('posts'));

    }
}
