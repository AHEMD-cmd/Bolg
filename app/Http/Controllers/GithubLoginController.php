<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Socialite;
use Hash;
use Str;

class GithubLoginController extends Controller
{



    public function github()
    {
        return Socialite::driver('github')->redirect();

    }

    public function github_redirect()
    {
        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
        ]);
        Auth::login($user, true);

        return redirect('/');
    }


}
