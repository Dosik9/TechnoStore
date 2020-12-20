@include('master temp admin.head')

<div class="main">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">@include('master temp admin.left-head')
            </div>
            <div class="col-md-9">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    <a href="{{route('products.create')}}" class="btn btn-secondary">Add Product</a>
                <h6></h6>

                    <section>
                        <div class="container">
                            <h1>List Products</h1>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Country name</th>
                                    <th scope="col">City name</th>
                                    <th scope="col">Details</th>


                                </tr>
                                </thead>
                                <tbody>


                                @if (!$products->isEmpty())
                                    <?php $i = 1;?>
                                    @foreach ($products as $product)
                                        <th scope="row" width="5%">{{ $i }}</th>
                                        <td width="50%">{{$product->name}}</td>
                                        <td width="50%">{{$product->price}}</td>
                                        <td width="45%" ><a href="{{route('products.show', $product->id)}}" class="btn btn-info">Details</a>
                                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Edit</a>
                                            <form style="display: inline" action="{{route('products.destroy', $product->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                                            </form>
                                        </td>
                                        <tr>
                                        <?php  $i++ ;?>
                                    @endforeach

                                @else
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php echo '<h1 style="color: #718096">' . "List is empty" . '</h1>'; ?></div>
                                @endif


                            @if (!$products->isEmpty())
                                <?php $i = 1;?>
                            @foreach($products as $product)
                            <div class="card" style="width: 36rem;">
                                <img class="card-img-top" src="{{asset('/storage/'. $product->image)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">{{$product->description}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Price:</b> {{$product->price}}</li>
                                    <li class="list-group-item"><b>Brand:</b> {{$product->brand->name}}</li>
                                    <li class="list-group-item"><b>Category:</b> {{$product->category->name}}</li>
                                </ul>
                                <div class="card-body text-center">
                                    <a href="{{route('products.show', $product->id)}}" class="btn btn-info">Details</a>
                                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Edit</a>
                                    <form style="display: inline" action="{{route('products.destroy', $product->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"  onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                                        <br><br>
                                        @endforeach

                                        @else
                                        <div class="text-center">
                                            <?php echo '<h1 style="color: #718096">' . "List is empty" . '</h1>'; ?></div>
                                        @endif

                        </div>

                    </section>

            </div>

            </div>
        </div>
    </div>


