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



                <div class="card" style="width: 18rem;margin-left:32%">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <h1>
                                Name: {{$category->name}}</h1>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Name of Category</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{$category->name}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Slug Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="slug_name" value="{{$category->slug_name}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <input type="submit" value="EDIT" class="btn btn-info">
                            </li>
                        </ul>
                    </form>
                </div>
                <a href="{{route('categories.index')}}" class="btn btn-dark mt-3">BACK</a>
            </div>
        </div>
    </div>
</div>
</div>
