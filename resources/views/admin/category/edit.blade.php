@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Edit category </div>

    <div class="card-body">

        <form action="{{ route('category.update',$cat->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="enter name" value="{{$cat->name   }}">
                @error('name')
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
