<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::first();
        return view('admin.settings.edit', compact('settings'));
    }

  
    public function update(Request $request)
    {
        $settings = Settings::first();
        $request->validate([
            'name' => 'required|max:255|string',
            'number' => 'required',
            'address' => 'required',
            'email' => 'required|email',
        ]);

        $settings->update($request->all());

        return back()->with('settings', 'Settings updated successfully!');
    }

}
