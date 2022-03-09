@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">My profile </div>

    <div class="card-body">

        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" name="img" id="" class="form-control @error('img') is-invalid @enderror" >
                @error('img')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="enter name" value="{{$user->name   }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" placeholder="enter email" value="{{$user->email   }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror"  placeholder="enter password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Facebook</label>
                <input type="text" name="facebook" id="" class="form-control @error('facebook') is-invalid @enderror" placeholder="enter facebook email" value="{{$user->profile->facebook}}">
                @error('facebook')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Youtube</label>
                <input type="text" name="youtube" id="" class="form-control @error('youtube') is-invalid @enderror" placeholder="enter youtube channel" value="{{$user->profile->youtube}}">
                @error('youtube')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">About</label>
                <input type="text" name="about" id="" class="form-control @error('about') is-invalid @enderror" placeholder="say something about you" value="{{$user->profile->about}}">
                @error('youtube')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-light" style="background: rgb(108, 212, 155)">Update</button>
                </div>
            </div>
        </form>

    </div>
</div>

@stop
