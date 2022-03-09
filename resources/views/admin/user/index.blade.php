@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Users</div>

    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Permissions</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @if ($users->count() > 0)
                @foreach ($users as $i=>$user)
              <tr>
                  <th scope="row">{{ 1+ $i }}</th>
                  <td>
                      @if (isset($user->profile->img))
                            <img src="{{ asset('user_img/'.$user->profile->img) }}" alt="" width="50px" height="50px">
                      @else
                      <img src="{{ asset('user_img/profile.png') }}" alt="Profile iamge" width="50px" height="50px">
                      @endif
                    </td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                      @if ($user->admin)
                            <a href="{{ route('user.not.admin', $user->id) }}" class="btn btn-warning">Remove permissions</a>
                      @else
                            <a href="{{ route('user.admin', $user->id) }}" class="btn btn-success">Make admin</a>
                      @endif
                  </td>
                  <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">edit</a></td>

                  @if(Auth::id() !== $user->id)
                  <td><form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                  @endif

                </tr>
                  @endforeach
                  @else
                  <tr>
                      <p style="position: absolute;top:170px;color:red;font-size:25px">No users!</p>
                  </tr>

                  @endif
            </tbody>
          </table>

    </div>
</div>

@stop
