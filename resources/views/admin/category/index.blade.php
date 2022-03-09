@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Categories</div>

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
                @if ($categories->count() > 0)
                @foreach ($categories as $i=>$cat)
              <tr>
                  <th scope="row">{{ 1+ $i }}</th>
                  <td>{{ $cat->name }}</td>
                  <td><a href="{{ route('category.edit', $cat->id) }}" class="btn btn-info">edit</a></td>
                  <td><form action="{{ route('category.destroy', $cat->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
                  @endforeach
                  @else
                  <tr>
                      <p style="position: absolute;top:170px;color:red;font-size:25px">No categories!</p>
                  </tr>

                  @endif
            </tbody>
          </table>

    </div>
</div>

@stop
