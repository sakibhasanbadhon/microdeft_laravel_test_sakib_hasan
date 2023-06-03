<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row justify-align-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-between">
                            Products
                            <a href="{{ route('create') }}"> Create</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>image</th>
                                    <th>name</th>
                                    <th>price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="" alt=""></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>

                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
