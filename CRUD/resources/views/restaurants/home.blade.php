<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
        
    @endif

    @if (Session::has('error'))
    <div class="alert alert-error" role="alert">
        {{Session::get('error')}}
    </div>
        
    @endif
    <div class="container">
    <a href="{{ route('restaurants.create') }}"><button type="button" class="btn btn-dark">Add New Restaurant</button></a>
      <table class="table table-striped">
  <thead>
    
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Discription</th>
      <th scope="col">Rating</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($restaurants as $restaurant)
        <tr>
      <th scope="row">{{$restaurant->id}}</th>
      <td>{{$restaurant->name}}</td>
      <td>{{$restaurant->discription}}</td>
      <td>{{$restaurant->rating}}</td>
      <td> <img src="{{$restaurant->image}}" alt="" style="width: 150px"></td>
      <td>
        <a href="{{ route('restaurants.edit', $restaurant->id) }}"><button type="button" class="btn btn-warning">Edit</button></a>

        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
          @csrf
          @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    
    @endforeach
    </div>
  </tbody>
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>