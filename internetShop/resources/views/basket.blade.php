@extends('master temp.templates')

@section('title', 'Basket')

@section('content')
<div class="main">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-9">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

                <!-- Product tab -->
                    <div class="col-md-12">
                        <div id="product-tab">
                            <!-- product tab nav -->
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Basket</a></li>
                                <li><a data-toggle="tab" href="#tab2">My Orders</a></li>
                            </ul>
                            <!-- /product tab nav -->

                            <!-- product tab content -->
                            <div class="tab-content">
                                <!-- tab1  -->
                                <div id="tab1" class="tab-pane fade in active">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Photo </th>
                                            <th scope="col">name</th>
                                            <th scope="col">Count</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Cost</th>




                                        </tr>
                                        </thead>
                                        <tbody>


                                        @if ( !$order->products->isEmpty())
                                            <?php $i = 1;?>
                                            @foreach($order->products as $opr)
                                                <tr>
                                                    <th scope="row" width="2%">{{ $i }}</th>
                                                    <td><img src="{{asset('/storage/'. $opr->image)}}" width="100px" alt=""></td>
                                                    <td width="50%"><a href="{{route('product-page', $opr->id)}}">{{$opr->name}}</a></td>
                                                    <td style="width: 25%">
                                                        <span class="badge">{{$opr->pivot->count}}</span>
                                                        <div class="btn-group">
                                                            <form action="{{route('basket-add', $opr->id)}}" style="display: inline" method="post">
                                                                <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
                                                                @csrf
                                                            </form>
                                                            <form action="{{route('basket-remove', $opr->id)}}" style="display: inline" method="post">
                                                                <button class="btn btn-danger"><span class="glyphicon glyphicon-minus"></span></button>
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>{{$opr->price}} Tg.</td>
                                                                                            <td>{{$opr->price * $opr->pivot->count}} Tg.</td>
                                                    <td>{{$opr->getcost()}} Tg.</td>
                                                </tr>
                                                <?php  $i++ ;?>
                                            @endforeach
                                            <tr>
                                                <td colspan="5"><b>All price:</b></td>
                                                <td width="10%"><b>{{$order->allsum()}} Tg.</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <form action="{{route('order')}}" method="post">
                                            <button type="submit" class="btn btn-success">Ordering</button>
                                            @csrf
                                        </form>
                                    </div>
                                    @else
                                    </tbody>
                                    </table>
                                    <div class="text-center">
                                        <h1 style="color: #718096">Basket is empty</h1></div>
                                    @endif

                                </div>
                                <!-- /tab1  -->

                                <!-- tab2  -->
                                <div id="tab2" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h1 style="color: #718096">Order is empty</h1></div>                                        </div>
                                    </div>
                                </div>
                                <!-- /tab2  -->

                            </div>
                            <!-- /product tab content  -->
                        </div>
                    </div>

{{--                <section>--}}
{{--                    <div class="container">--}}
{{--                        <div class="text-center"><h1> Basket </h1></div>--}}

{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">#</th>--}}
{{--                                <th scope="col">Photo </th>--}}
{{--                                <th scope="col">name</th>--}}
{{--                                <th scope="col">Count</th>--}}
{{--                                <th scope="col">Price</th>--}}
{{--                                <th scope="col">Cost</th>--}}




{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}


{{--                            @if ( !$order->products->isEmpty())--}}
{{--                                <?php $i = 1;?>--}}
{{--                                @foreach($order->products as $opr)--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row" width="2%">{{ $i }}</th>--}}
{{--                                        <td><img src="{{asset('/storage/'. $opr->image)}}" width="100px" alt=""></td>--}}
{{--                                        <td width="50%"><a href="{{route('product-page', $opr->id)}}">{{$opr->name}}</a></td>--}}
{{--                                        <td style="width: 25%">--}}
{{--                                            <span class="badge">{{$opr->pivot->count}}</span>--}}
{{--                                            <div class="btn-group">--}}
{{--                                                <form action="{{route('basket-add', $opr->id)}}" style="display: inline" method="post">--}}
{{--                                                    <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>--}}
{{--                                                    @csrf--}}
{{--                                                </form>--}}
{{--                                                <form action="{{route('basket-remove', $opr->id)}}" style="display: inline" method="post">--}}
{{--                                                    <button class="btn btn-danger"><span class="glyphicon glyphicon-minus"></span></button>--}}
{{--                                                    @csrf--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>{{$opr->price}} Tg.</td>--}}
{{--                                        <td>{{$opr->price * $opr->pivot->count}} Tg.</td>--}}
{{--                                        <td>{{$opr->getcost()}} Tg.</td>--}}
{{--                                    </tr>--}}
{{--                                    <?php  $i++ ;?>--}}
{{--                                @endforeach--}}
{{--                                <tr>--}}
{{--                                    <td colspan="5"><b>All price:</b></td>--}}
{{--                                    <td width="10%"><b>{{$order->allsum()}} Tg.</b></td>--}}
{{--                                </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                                <div class="text-center">--}}
{{--                                    <form action="{{route('order')}}" method="post">--}}
{{--                                        <button type="submit" class="btn btn-success">Ordering</button>--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            @else--}}

{{--                        <div class="text-center">--}}
{{--                            <?php echo '<h1 style="color: #718096">' . "Basket is empty" . '</h1>'; ?></div>--}}
{{--                        @endif--}}

{{--                    </div>--}}

{{--                </section>--}}

            </div>

        </div>
    </div>
</div>


@endsection

{{--@foreach($order->products as $opr)--}}
{{--    <div class="product-widget">--}}
{{--        <div class="product-img">--}}
{{--            <img src="{{asset('/storage/'. $opr->image)}}" alt="">--}}
{{--        </div>--}}
{{--        <div class="product-body">--}}
{{--            <h3 class="product-name"><a href="#">{{$opr->name}}</a></h3>--}}
{{--            <h4 class="product-price"><span class="qty">1x</span>{{$opr->price}}</h4>--}}
{{--        </div>--}}
{{--        <button class="delete"><i class="fa fa-close"></i></button>--}}
{{--    </div>--}}
{{--@endforeach--}}
