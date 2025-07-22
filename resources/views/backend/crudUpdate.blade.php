<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <!-- <div>
          <form method="post" action="/updateTestGetDataId">
            @csrf
            <input type="text" name="first_name" value="{{ $crudUpdate->first_name }}">
            <input type="text" name="last_name" value="{{ $crudUpdate->last_name }}">
            <button type="submit" value="submit" name="update_btn" value="{{ $crudUpdate->id }}" id="update_btn"></button>
          </form>
      </div> -->

         <div class="container mt-4">
          <div class="card">
            <div class="card-header">
              <h4>Edit</h4>
            </div>
            <div class="card-body">
              <form method="post" action="/crudUpdateGetDataId" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" id="title" name="title" class="form-control"  value="{{ $crudUpdate->title }}">
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" id="description" name="description" class="form-control" value="{{ $crudUpdate->description }}">
                </div>              
                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input class="form-control" type="file" id="image" name="image">
                  <input class="form-control" type="hidden" id="image" name="old_image" value="{{ $crudUpdate->image }}">
                  <img src="{{ asset('assets/images/' . $crudUpdate->image) }}" height="200" width="200">
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="text" id="price" name="price" class="form-control" value="{{ $crudUpdate->price }}">
                </div>
                <div class="mb-3">
                  <label for="stock" class="form-label">In Stock</label>
                  <input type="text" id="stock" name="stock" class="form-control" value="{{ $crudUpdate->stock }}">
                </div>
                <div class="mb-3">
                  <label for="color" class="form-label">Color</label>
                  <input type="text" id="color" name="color" class="form-control" value="{{ $crudUpdate->color }}">
                </div>
                <div class="mb-3">
                  <label for="size" class="form-label">Size</label>
                  <input type="text" id="size" name="size" class="form-control" value="{{ $crudUpdate->size }}">
                </div>
              <button class="btn btn-success" type="submit" name="update_btn" value="{{ $crudUpdate->id }}">Update</button>
              </form>
            </div>
          </div>
        </div>
</body>
</html>