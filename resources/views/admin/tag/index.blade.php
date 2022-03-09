@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Tags</div>

    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @if ($tags->count() > 0)
                @foreach ($tags as $i=>$tag)
              <tr>
                  <th scope="row">{{ 1+ $i }}</th>
                  <td>{{ $tag->tag }}</td>
                  <td><a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a></td>
                  <td><form action="{{ route('tag.destroy', $tag->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-backspace"></i></button>
                      </form>
                  </td>
                </tr>
                  @endforeach
                  @else
                  <tr>
                      <p style="position: absolute;top:170px;color:red;font-size:25px">No tags!</p>
                  </tr>

                  @endif
            </tbody>
          </table>

    </div>
</div>

@stop
