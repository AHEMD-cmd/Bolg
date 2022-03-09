@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Trashed Posts</div>

    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">content</th>
                <th scope="col">Restore</th>
              </tr>
            </thead>
            <tbody>
                @if ($posts->count() > 0)


                @foreach ($posts as $i=>$post)
                <tr>
                    <th scope="row">{{ 1+ $i }}</th>
                    <td><img src="{{asset('post_img/'. $post->img )}}" alt="{{ $post->title }}" width="50px" height="50px"></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td><a href="{{ route('post.restore', $post->id) }}"  class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i></a></td>

                </tr>
                    @endforeach

                    @else
                    <tr>
                        <p style="position: absolute;top:170px;color:red;font-size:25px">No trashed posts!</p>
                    </tr>

                    @endif
            </tbody>
          </table>

    </div>
</div>

@stop
