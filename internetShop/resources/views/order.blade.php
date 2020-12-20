@extends('master temp.templates')

@section('title', 'Order')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <form action="{{route('order-save')}}" method="post">
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Billing address</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="name" placeholder="First Name" value="{{old()}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="telnum" placeholder="Telephone" value="{{old()}}">
                        @error('telnum')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <!-- /Billing Details -->

{{--                <!-- Order notes -->--}}
{{--                <div class="order-notes">--}}
{{--                    <textarea class="input" placeholder="Order Notes"></textarea>--}}
{{--                </div>--}}
{{--                <!-- /Order notes -->--}}
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        @foreach($order->products as $product)
                        <div class="order-col">
                            <div><b>{{$product->pivot->count}}x</b> {{$product->name}}</div>
                            <div>{{$product->getcost()}}</div>
                        </div>
                        @endforeach
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">{{$order->allsum()}} Tg.</strong></div>
                    </div>
                </div>


                <button type="submit" class="primary-btn order-submit">Place order</button>
                    @csrf
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
        </form>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
