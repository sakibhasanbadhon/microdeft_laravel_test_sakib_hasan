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

<div class="card">
    @include('alertmsg')
    <div class="card-header">
        <h4 class="d-flex justify-content-between">
            Products
            <a href="{{ route('index') }}"> Product List</a>
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('update',$products->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="mb-3 py-2">
                        <label for="shops" class="form-label"> <strong>Shops</strong> </label>

                        <select name="shops" id="shops" class="form-control">
                            <option value="">shops Select</option>

                            @foreach ($shops as $item)

                                <option value="{{ $item->id }}" {{ $products->shop_id == $item->id ? 'selected' : '' }}> {{ $item->name }}</option>

                            @endforeach

                        </select>

                        @error('shops')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 py-2">
                        <strong><label for="product_name" class="form-label">product Name</label></strong>
                        <input type="text" name="product_name" value="{{ $products->name }}" class="form-control" id="product_name">
                        @error('product_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 py-2">
                        <strong><label for="product_price" class="form-label">price</label></strong>
                        <input type="text" name="product_price" value="{{ $products->price }}" class="form-control" id="product_price">
                        @error('product_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 py-2">
                        <strong><label for="product_price" class="form-label">price</label></strong>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                </div>

            </div>


                <div class="d-flex justify-content-end mr-3">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
