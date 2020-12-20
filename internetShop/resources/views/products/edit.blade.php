@include('master temp admin.head')

<div class="content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">@include('master temp admin.left-head')
            </div>
            <div class="col-md text-center">
                <div class="col-md-12 text-center">
                    <h5>CRUD(Create, Read, Update, Delete)</h5>

                </div>
                <div class="form-group text-center">
                    <h6>Editing</h6>
                </div>
                <div class="card" style="width: 24rem;margin-left:32%">
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">

                                <h1>Name: {{$product->name}}</h1>
                        </div>
                        <label for="">Name:</label>
                        <input type="text" name="name" value="{{old('name',isset($product->name) ? $product->name : null)}}" class="form-control">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="">Slug Name:</label>
                        <input type="text" name="slug_name" value="{{old('slug_name',isset($product->slug_name) ? $product->slug_name : null)}}" class="form-control">
                        @error('slug_name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="">Description:</label>
                        <textarea type="text" name="desc" class="form-control desc" >{{old('desc',isset($product->description) ? $product->description : null)}}</textarea>
                        @error('desc')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="">Price:</label>
                        <input type="number" min="0.00" step="any" name="price" value="{{old('price',isset($product->price) ? $product->price : null)}}" class="form-control">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>

                        <img src="{{asset('/storage/'. $product->image)}}" width="250px" alt="logo"><br>

                        <label for="">Image:</label>
                        <input type="file" name="image" class=""  accept=".jpg, .jpeg, .png, .webp">
                        <br>
                        <label for="disabledSelect">Brand</label>
                        <select id="disabledSelect" class="form-control" name="brand_id">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if ($product->brand->id==$brand->id) selected @endif >{{$brand->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="disabledSelect">Category</label>
                        <select id="disabledSelect" class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if ($product->category->id==$category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <li class="list-group-item">
                            <input type="submit" value="EDIT" class="btn btn-info">
                        </li>
                    </form>
                </div>
                <a href="{{route('products.index')}}" class="btn btn-dark mt-3">BACK</a>
            </div>
        </div>
    </div>
</div>
