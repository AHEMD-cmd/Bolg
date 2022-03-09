<?php

namespace App\Http\Controllers;

use App\Tag;
use Session;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index')->with('tags', Tag::all());
    }


    public function create()
    {
        return view('admin.tag.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $tag = Tag::create([
            'tag' => $request->tag,
        ]);

        Session::flash('success', 'Tag created successfully!');

        return redirect()->route('tag.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit')->with('tag', $tag);
    }


    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->tag = $request->tag;
        $tag->save();

        Session::flash('success', 'Tag updated successfully!');

        return redirect()->route('admin.tags');

    }


    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        Session::flash('success', 'Tag deleted successfully!');

        return redirect()->route('tag.index');
    }
}
