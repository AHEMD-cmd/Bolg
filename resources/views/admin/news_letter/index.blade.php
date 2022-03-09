@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">NewsLetter</div>

    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
               
              </tr>
            </thead>
            <tbody>
                @if ($newsletter->count() > 0)
                @foreach ($newsletter as $i=>$news)
              <tr>
                  <th scope="row">{{ 1+ $i }}</th>
                  <td>{{ $news->email }}</td>
                  

                  
                  @endforeach
                  @endif
            </tbody>
          </table>

    </div>
</div>

@stop
