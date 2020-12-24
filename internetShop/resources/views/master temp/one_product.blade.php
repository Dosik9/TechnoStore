<!-- product -->
<div class="product">
    <div class="product-img">
        <img src="{{asset('/storage/'. $product->image)}}" alt="">
        <div class="product-label">
            @if($product->isDiscount())
                <span class="sale">-{{$product->discount}}%</span>
            @endif
            @if($product->isNew())
                <span class="new">NEW</span>
            @endif

            @if($product->isHit())
                <span class="hit">Hit</span>
            @endif

            @if($product->isRecommend())
                <span class="hit">Recom</span>
            @endif
        </div>
    </div>
    <div class="product-body">
        <p class="product-category">{{$product->category->name}}</p>
        <h3 class="product-name size"><a href="{{route('product-page',$product->slug_name)}}">{{$product->name}}</a>
        </h3>
        @if($product->isDiscount())
            <h4 class="product-price">{{$product->sumDiscount()}} Tg.
                <del class="product-old-price">{{($product->price)}} Tg.</del>
            </h4>
        @else
            <h4 class="product-price">{{($product->price)}} Tg.</h4>
        @endif
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span>
            </button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span>
            </button>
            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
        </div>
    </div>
    <div class="add-to-cart">
        <form action="{{route('basket-add', $product)}}" method="post">
            @csrf
            <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
        </form>
    </div>
</div>
<!-- /product -->
