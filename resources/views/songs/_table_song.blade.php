<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Editor</th>
      <th scope="col">Mod.</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($songs as $song)
    <tr>
      <th scope="row">{{$song->id}}</th>
      <td>{{$song->title}}</td>
      <td>{{$song->author}}</td>
      <td>{{$song->editor}}</td>
      <td>placeholder mod</td>
    </tr>   
    @endforeach
    
  </tbody>


</table>