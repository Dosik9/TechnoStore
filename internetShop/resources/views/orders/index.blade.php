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


{{--                <a href="{{route('orders.create')}}" class="btn btn-secondary">Add Category</a>--}}
                <h6></h6>

                <section>
                    <div class="container">
                        <h1>List orders</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order name</th>
                                <th scope="col">Tel number</th>
                                <th scope="col">Ordered time</th>
                                <th scope="col">Order price</th>

                                <th scope="col">Details</th>


                            </tr>
                            </thead>
                            <tbody>


                            @if ( !$orders->isEmpty())
                                <?php $i = 1;?>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row" width="2%">{{ $i }}</th>
                                        <td width="50%">{{$order->name}}</td>
                                        <td width="50%">{{$order->telnum}}</td>
                                        <td width="50%">{{$order->created_at->format('H:i d/m/Y')}}</td>
                                        <td width="50%">{{$order->allsum()}}Tg.</td>
                                        <td  style="margin-top: 10px;width:48%" >
                                            <a href="{{route('orders.show', $order->id)}}" class="btn btn-info">Details</a>
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


