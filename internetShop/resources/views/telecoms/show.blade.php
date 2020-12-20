@include('master temp admin.head')

<div class="content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">@include('master temp admin.left-head')
            </div>
            <div class="col-md text-center" style="align-content: center">
                <div class="form-group text-center">
                    <h6>Show</h6>
                </div>



                <div class="card" style="width: 18rem;margin-left:32%">
                    <div class="card-header">
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <h1>Brand</h1>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name of Category</label>
                                <h1>{{$category->name}}</h1>
                            </div>
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
