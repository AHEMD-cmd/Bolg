@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Edit settings</div>

    <div class="card-body">

        <form action="{{ route('settings.update') }}" method="post" >
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="enter name" value="{{$settings->name   }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" placeholder="enter email" value="{{$settings->email }}">
                @error('img')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Number</label>
                <textarea type="text" name="number"  rows="5" class="form-control @error('number') is-invalid @enderror" placeholder="enter number">{{$settings->number   }}</textarea>
                @error('number')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <textarea type="text" name="address"  rows="5" class="form-control @error('address') is-invalid @enderror" placeholder="enter address">{{$settings->address   }}</textarea>
                @error('address')
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

