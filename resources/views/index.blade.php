<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Locadora</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($categories as $category)
      @php
        $date=date('Y-m-d', $category['date']);
        @endphp
      <tr>
        <td>{{$categories['id']}}</td>
        <td>{{$categories['name']}}</td>
        
        <td><a href="{{action('LocadoraController@edit', $category['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('LocadoraController@destroy', $category['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>