@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Posts</div>

    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">content</th>
                <th scope="col">Edit</th>
                <th scope="col">Trash</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

               @if ($posts->count() > 0)
                    @foreach ($posts as $i=>$post)
                    <tr>
                        <th scope="row">{{ 1+ $i }}</th>
                        {{-- <td><img src="{{$post->img }}" alt="{{ $post->title }}" width="50px" height="50px"></td> --}}
                        <td><img src="{{asset('post_img/'. $post->img )}}" alt="{{ $post->title }}" width="50px" height="50px"></td>
                        <td>{{ $post->title }}</td>
                        <td> {{\Illuminate\Support\Str::words(html_entity_decode(strip_tags($post->content)), 20)}} </td>
                        <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a></td>
                        <td><a href="{{ route('soft.delete', $post->id) }}"  class="btn btn-warning"><i class="fas fa-trash"></i></a></td>
                        <td><form action="{{ route('post.destroy', $post->id) }} " method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-backspace"></i></button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
               @else
               <tr>

                   <p style="position: absolute;top:170px;color:red;font-size:25px">No posts!</p>
               </tr>
               @endif


            </tbody>
          </table>

    </div>
</div>

@stop
