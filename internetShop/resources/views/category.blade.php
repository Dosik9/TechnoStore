@extends('master temp.templates')

@section('title','Category')

@section('content')

    <div class="container">
    @if(!$c_products->isEmpty())

        <!-- STORE -->
    <div id="store" class="col-md-9">
        <!-- store top filter -->
        <div class="store-filter clearfix">
            <div class="store-sort">
                <label>
                    Sort By:
                    <select class="input-select">
                        <option value="0">Popular</option>
                        <option value="1">Position</option>
                    </select>
                </label>

                <label>
                    Show:
                    <select class="input-select">
                        <option value="0">20</option>
                        <option value="1">50</option>
                    </select>
                </label>
            </div>
            <ul class="store-grid">
                <li class="active"><i class="fa fa-th"></i></li>
                <li><a href="#"><i class="fa fa-th-list"></i></a></li>
            </ul>
        </div>
        <!-- /store top filter -->

        <!-- store products -->
        <div class="row">

            @foreach($c_products as $product)
            <!-- product -->
                <div class="col-md-4 col-xs-6">
                    @include('master temp.one_product')
                </div>
                <!-- /product -->
                @endforeach

        </div>
        <!-- /store products -->

        <!-- store bottom filter -->
        <div class="store-filter clearfix">
            <span class="store-qty">Showing 20-100 products</span>
            <ul class="store-pagination">
                <li class="active">1</li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
        <!-- /store bottom filter -->
    </div>
                @else
            <h1>is Empty</h1>
                    @endif

    <!-- /STORE -->
    </div>
@endsection
