@extends('layouts.app')

@section('title')
    Songs
@endsection

@section('main-content')
  <div class="container py-5">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Editor</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($songs as $song)
        <tr>
          <th scope="row">{{$song->id}}</th>
          <td>{{$song->title}}</td>
          <td>{{$song->author}}</td>
          <td>{{$song->editor}}</td>
          <td><a href="{{route('songs.show',['song' => $song])}}">Dettaglio</a></td>
        </tr>   
        @endforeach

      </tbody>
    </table>

    {{$songs->links('pagination::bootstrap-5')}}
  </div>
@endsection