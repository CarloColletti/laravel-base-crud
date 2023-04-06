@extends('layouts.app')

@section('cdn')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
@endsection

@section('title')
  Songs
@endsection

@section('main-content')
  <div class="container py-5">
    <div class="row">
      <form class="d-flex">
        <input class="form-control me-2" type="text" name="term" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
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
          <td>
            <a href="{{route('songs.show',['song' => $song])}}">
              <i class="bi bi-card-list"></i>
            </a>
          </td>
        </tr>   
        @endforeach

      </tbody>
    </table>

    {{$songs->links('pagination::bootstrap-5')}}
  </div>
@endsection