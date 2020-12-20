@include('master temp admin.head')

<div class="content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">@include('master temp admin.left-head')
            </div>
            <div class="col-md text-center" style="align-content: center">
                <div class="col-md text-center" >
                    <h5>CRUD(Create, Read, Update, Delete)</h5>

                </div>
                <div class="form-group text-center">
                    <h6>Show</h6>
                </div>



                <div class="card-header">

                    <h1>Name: {{$product->name}}</h1>
                </div>
                <br><br>
                <label for=""> <b>Name:</b></label>
                <p> {{$product->name}}</p>
                <br>
                <label for=""><b>Slug Name:</b></label>
                <p> {{$product->slug_name}}</p>
                <br>
                <label for=""><b>Description:</b></label>
                <p> {{ $product->description}}</p>
                <br>
                <label for=""><b>Price:</b></label>
                <p> {{$product->price}}</p>
                <br>
                <label for=""><b>Image:</b></label>
                <img src="{{asset('/storage/'. $product->image)}}" width="250px" alt="logo"><br>
                <br>
                <label for="disabledSelect"><b>Brand</b></label>
                <p>{{$product->brand->name}}</p>
                <br>
                <label for="disabledSelect"><b>Category</b></label>
                <p>{{$product->category->name}}</p>
                <a href="{{route('products.index')}}" class="btn btn-dark mt-3">BACK</a>
            </div>

            </div>
        </div>
    </div>
</div>
</div>
