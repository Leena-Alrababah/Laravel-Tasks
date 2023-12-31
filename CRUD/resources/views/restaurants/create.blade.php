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
      <div class="container">
        <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
  <div class="form-group" >
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Restaurant Name" name="name">
  </div>
  <div class="form-group">
    <label for="desc">Description</label>
        <input type="text" class="form-control" id="desc" placeholder="Enter Description" name="discription">

  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect2">Rating</label>
    <select  class="form-control" id="exampleFormControlSelect2" name="rating">
      <option value="" >Select Rate</option>
      <option value="1 Star">1 Star</option>
      <option value="2 Stars">2 Stars</option>
      <option value="3 Stars">3 Stars</option>
      <option value="4 Stars">4 Stars</option>
      <option value="5 Stars">5 Stars</option>
    </select>
  </div>
  <div class="form-group">
    <label for="img">Image</label>
        <input type="file" class="form-control" id="img" placeholder="Enter Description" name="image" accept="image/*"  >

  </div>
  <button type="submit" class="btn btn-success">Add</button>
</form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>