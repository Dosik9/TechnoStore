@extends('master temp.templates')

@section('title', 'Store')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <form action="{{route('store')}}" method="GET">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        @foreach($caths as $cat)
                        <div class="input-checkbox">
                            <input type="checkbox" id="category-{{$cat->id}}">
                            <label for="category-{{$cat->id}}">
                                <span></span>
                                {{$cat->name}}
                                <small>({{$cat->products->count()}})</small>
                            </label>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number" min="0.00" step="any" name="price_min" value="0">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number" name="price_max" step="any" max="1000000" value="1000000">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        @foreach($brands as $brand)
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-{{$brand->id}}">
                            <label for="brand-{{$brand->id}}">
                                <span></span>
                                {{$brand->name}}
                                <small>({{$brand->products->count()}})</small>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /aside Widget -->

{{--                    <!-- aside Widget -->--}}
{{--                    <div class="aside">--}}
{{--                        <h3 class="aside-title">Labels</h3>--}}
{{--                        <div class="checkbox-filter">--}}
{{--                            @foreach(['hit'=>'Hit','new'=>'New','recommend'=>'Recommended'] as $field=>$title)--}}
{{--                                <div class="input-checkbox">--}}
{{--                                    <input type="checkbox" id="{{$field}}" name="{{$title}}" checked>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /aside Widget -->--}}

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    @foreach($top_sellings as $top)
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="{{asset('/storage/' .$top->image)}}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$top->category->name}}</p>
                            <h3 class="product-name"><a href="#">{{$top->name}}</a></h3>
                            <h4 class="product-price">{{$top->price}} <del class="product-old-price">{{$top->price * 1.2}} Tg.</del></h4>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            @if(!$products -> isEmpty())
            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select" id="p_label" name="p_label" value="{{ old('p_label','all') }}">
                                <option value="all" selected>All</option>
                                @foreach(['hit', 'new', 'recommend'] as $field)
                                    <option value="{{$field}}">{{$field}}</option>
                                @endforeach
                            </select>
                        </label>

                        <label>
                            Show:
                            <input type="number" id="n_paginate" name="n_paginate" value="{{old('n_paginate','6')}}">
                        </label>
                    </div>
                    <input type="submit" class="btn btn-danger" value="Filter">

                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    @foreach($products as $product)
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
{{--                        @foreach($paginator->count() as $page)--}}
{{--                        <li class="active">{{$paginator->currentPage()}}</li>--}}
{{--                        @endforeach--}}
                    </ul>
                </div>
            {{$products->links()}}

            <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
                @else
            <h2>Product not found</h2>
                @endif
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
