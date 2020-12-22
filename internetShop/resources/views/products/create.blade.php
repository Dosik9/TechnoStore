@include('master temp admin.head')
<div class="main">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">@include('master temp admin.left-head')
            </div>
            <div class="col-md-9">
                <h6>Add Product</h6>

                <form action="{{route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" >
                        <label for="">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="">Slug Name:</label>
                        <input type="text" name="slug_name" class="form-control" value="{{old('slug_name')}}">
                        @error('slug_name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="">Description:</label>
                        <textarea type="text" name="desc" class="form-control desc" value="{{old('desc')}}"></textarea>
                        @error('desc')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="">Price:</label>
                        <input type="number" min="0.00" step="any" name="price" class="form-control" value="{{old('price')}}">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>

                        <label for="">Image:</label>
                        <input type="file" name="image" class=""  accept=".jpg, .jpeg, .png, .webp">
                        <br>

                        <label for="disabledSelect">Brand</label>
                        <select id="disabledSelect" class="form-control" name="brand_id">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="disabledSelect">Category</label>
                        <select id="disabledSelect" class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="">Discount:</label>
                        <input type="number" min="0.00" max="100" name="discount" class="form-control" value="{{old('discount')}}">
                        <br>
                        @foreach(['hit'=>'Hit','new'=>'New','recommend'=>'Recommended'] as $field=>$title)
                            <div class="form-group" >
                                <label for="">{{$title}}:</label>
                                <input type="checkbox" name="{{$field}}" id="{{$field}}"
                                    @if(isset($product)&& $product->$field ===1)
                                        checked="checked"
                                       @endif
                                >
                            </div>
                                @endforeach
                        <br>
                        <input type="submit" class="btn btn-primary" value="ADD">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

