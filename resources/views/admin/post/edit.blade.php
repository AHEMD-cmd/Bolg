@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">Edit post</div>

<div class="card-body">

    <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Titel</label>
            <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="enter name" value="{{$post->title   }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="img"  class="form-control @error('img') is-invalid @enderror" >
            @error('img')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Conetnt</label>
            <textarea type="text" name="content" id="summernote" rows="5" class="form-control @error('content') is-invalid @enderror" placeholder="enter conetnt">{{$post->content   }}</textarea>
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
                @foreach ($cats as $cat)
                <option value="{{ $cat->id }}" {{$cat->id == $post->category_id ? 'selected': "" }}>{{ $cat->name }}</option>
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
                    <label> <input type="checkbox"  name="tags[]" value="{{ $tag->id }}"

                        @foreach ($post->tags as $t)
                            @if ($tag->id == $t->id)
                                    checked
                            @endif
                        @endforeach
                        > &nbsp;{{ $tag->tag }}</label>
                </div>
            @endforeach

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
