@include('master temp admin.head')
<div class="main">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">@include('master temp admin.left-head')
            </div>
            <div class="col-md-9">
                <h6>Add Category</h6>

                <form action="{{route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name:</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <label for="">Slug Name:</label>
                        <input type="text" name="slug_name" class="form-control">
                        @error('slug_name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="">Image:</label>
                        <input type="file" class="btn btn-default" name="image"  accept=".jpg, .jpeg, .png" class="form-control">
                        <br>
                        <input type="submit" class="btn btn-primary" value="ADD">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
