<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\File;

use Session;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::with('profile')->get();
        return view('admin.user.index', compact('users'));
    }


    public function create()
    {
        // $categories = Category::select('id', 'name')->get();
        // $tags = Tag::select('id', 'tag')->get();
        // if(count($categories) <= 0){
        //     return redirect()->route('category.create')->with('cat', 'Sorry, you need to create category first!');
        // }

        return view('admin.user.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
        ]);

        $data = $request->all();

        $data['password'] = bcrypt('password');
        $user = User::create($data);

        $profile = Profile::create([
            'user_id' => $user->id,
        ]);


        Session::flash('success', 'User created successfully!');

        return redirect()->route('user.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        // $cats = Category::select('id', 'name')->get();
        // // $post_tags = $post->tags()->pluck('id')->toArray();
        // $tags = Tag::select('id', 'tag')->get();

        $user = User::with('profile')->findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = USer::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => ['required','email','max:100','min:3',"unique:users,email,$id"],

        ]);

        $data = $request->all();

        $data['password'] = bcrypt('password');
        $user->update($data);

        // $profile = Profile::create([
        //     'user_id' => $user->id,
        // ]);


        Session::flash('success', 'user updated successfully!');

        return redirect()->route('user.index');
    }


    public function destroy($id)
    {

        $user = User::findOrFail($id);
        if(File::exists('post_img/'.$user->profile->img)){
            File::delete('post_img/'.$user->profile->img);
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully!');

    }

    public function admin($id)
    {

        $user = User::findOrFail($id);
        $user->admin = 1;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User permissions changed!');

    }

    public function not_admin($id)
    {
        $user = User::findOrFail($id);
        $user->admin = 0;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User permissions changed!');

    }

    // public function trash()
    // {

    //     $posts = Post::onlyTrashed()->get();
    //     return view('admin.post.trash', compact('posts'));

    // }
}
