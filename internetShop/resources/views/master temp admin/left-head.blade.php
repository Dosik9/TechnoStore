<div class="bg-light border-right" id="sidebar-wrapper">
    <div style="height: 300px;" class="text-center">
         <img src="{{asset('img/picture.jpg')}}" width="200" height="250px" alt="">
    </div>

    <div class="list-group list-group-flush">
        <a href="{{route('brands.index')}}" class="list-group-item list-group-item-action bg-light">Brands</a>
        <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action bg-light">Categories</a>
        <a href="{{route('subcategories.index')}}" class="list-group-item list-group-item-action bg-light">Subcategories</a>
        <a href="{{route('telecoms.index')}}" class="list-group-item list-group-item-action bg-light">Telecommunications</a>
        <a href="{{route('products.index')}}" class="list-group-item list-group-item-action bg-light">Products</a>
        <a href="{{route('orders.index')}}" class="list-group-item list-group-item-action bg-light">Orders</a>

    </div>
</div>
