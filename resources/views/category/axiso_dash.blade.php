<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Axios</title>
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">AXISO CRUD</h1>
        <hr>
        <div class="row mt-3">
            <div class="col-md-8">
                <h4 class="">Manage Category</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sl</td>
                            <td>name</td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-secondary">View</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="col-md-4">
                <h4>Add New Category</h4>
                <form action="" id="addNewCat">
                    <div class="form-group">
                        <input type="text"  class="form-control" id="name" placeholder="Add New Category">
                    </div>

                    <div class="d-grid gap-2 mt-2">
                        <button type="submit" class="btn btn-sm btn-success" type="button">Add New Category</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    @include('category.axiso_js')

  </body>
</html>








