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


                <a href="{{route('categories.create')}}" class="btn btn-secondary">Add Category</a>
                <h6></h6>

                <section>
                    <div class="container">
                        <h1>List categories</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category name</th>
                                <th scope="col">Details</th>


                            </tr>
                            </thead>
                            <tbody>


                            @if ( !$categories->isEmpty())
                                <?php $i = 1;?>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row" width="2%">{{ $i }}</th>
                                        <td width="50%">{{$category->name}}</td>
                                        <td  style="margin-top: 10px;width:48%" >
                                            <a href="{{route('categories.show', $category->id)}}" class="btn btn-info">Details</a>
                                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">Edit</a>
                                            <form class="form-delete" action="{{route('categories.destroy', $category->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"  onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php  $i++ ;?>
                                @endforeach

                            @else
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?php echo '<h1 style="color: #718096">' . "List is empty" . '</h1>'; ?></div>
                        @endif

                    </div>

                </section>

            </div>

        </div>
    </div>
</div>


