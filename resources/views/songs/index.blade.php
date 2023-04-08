@extends('layouts.app')

@section('cdn')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
@endsection

@section('title')
  Songs
@endsection

@section('main-content')
  <div class="container py-5">
    <div class="row py-4">
      <div class="col-8">
        <form class="d-flex">
          <input class="form-control me-2" type="text" name="term" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>

      <div class="col-4">
        <div class="d-flex">
          <a href="{{ route('songs.create') }}" class="btn btn-outline-success ms-auto" type="submit">Aggiungi Canzone</a>
        </div>
      </div>

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
            <a href="{{route('songs.show',['song' => $song])}}" class="px-2">
              <i class="bi bi-card-list"></i>
            </a>
            <a href="{{route('songs.edit',['song' => $song])}}" class="px-2">
              <i class="bi bi-pencil-square"></i>
            </a>
            <button type="button" class="btn bi bi-trash" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$song->id}}"></button>

          </td>
        </tr>   
        @endforeach
      </tbody>
    </table>


    {{-- pagination  --}}
    {{$songs->links('pagination::bootstrap-5')}}


  </div>
@endsection
  
  
  
@section('modals')
  <!-- Modal -->
  @foreach ($songs as $song)
  <div class="modal fade" id="delete-modal-{{$song->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Conferma di Eliminazione della canzone</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Se si procede, l'elemento selezionato verrà eliminato.<br>
          L'operazione non è reversibile <br>
          Vuoi davvero procedere?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form action="{{route('songs.destroy',['song' => $song])}}" method="POST" class="px-2 text-danger">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection