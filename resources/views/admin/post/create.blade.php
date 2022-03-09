@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Create new post</div>

    <div class="card-body">

        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="enter title" value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="img"  class="form-control @error('img') is-invalid @enderror" value="{{ old('img') }}">
                @error('img')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Conetnt</label>
                <textarea type="text" name="content" id="summernote" rows="5" class="form-control @error('content') is-invalid @enderror" placeholder="enter conetnt">{{ old('title') }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Choose category</option>  {{-- //value ="" فاضية يعني null --}}
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">

                <label > Select tags</label>
                @foreach ($tags as $tag)
                    <div class="checkbox">
                        <label> <input type="checkbox"  name="tags[]" value="{{ $tag->id }}"> &nbsp;{{ $tag->tag }}</label>
                    </div>
                @endforeach

            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-light" style="background: rgb(108, 212, 155)">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>

@stop

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@stop
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

    $(document).ready(function() {
        $('#summernote').summernote();
    });
    </script>
@stop
