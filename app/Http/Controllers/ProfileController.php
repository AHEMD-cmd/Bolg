<?php

namespace App\Http\Controllers;

use Session;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('profile')->where('id', Auth::id())->first();
        return view('admin.user.profile', compact('user'));
    }



    public function update(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => ['required','email','max:100','min:3',"unique:users,email,$id"],
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'about' => 'nullable|max:1000',
            'img' => 'nullable|image',

        ]);

        $data = $request->all();

        if($request->hasFile('img')){
            if(File::exists('user_img/'.$user->profile->img)){
                File::delete('user_img/'.$user->profile->img);
            }

            $file = $request->file('img');
            $imageName = time().'_'. $file->getClientOriginalName();
            $file->move(\public_path('user_img/'),$imageName);
            $data['img'] = $imageName;
        }

        if($request->has('password')){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $user->password;

        }
        $user->profile->update($data);
        $user->update($data);


        Session::flash('success', 'profile updated successfully!');

        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
