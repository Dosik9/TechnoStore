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
                        <h1>Brand</h1>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><h6>Name of Brand</h6></label>
                                {{$order->name}}
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><h6>User name:</h6></label>
                                {{$order->user->name}}
                            </div>
                        </li><li class="list-group-item">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><h6>Time Ordered: </h6></label>
                                {{$order->created_at->format('H:i d/m/Y')}}
                            </div>
                        </li>
                    </ul>
                    </form>
                </div>
                <a href="{{route('brands.index')}}" class="btn btn-dark mt-3">BACK</a>
            </div>
        </div>
    </div>
</div>
</div>
