@extends('master temp.templates')
@section('cats')
<div class="col-md-6">
    <div class="header-search">
        <form >
            <select class="input-select" style="width: 25%">
                @foreach($caths as $category)
                    <option  value="{{$category->id}}" style="margin-left: 10px">{{$category->name}} ({{$category->products->count()}})</option>
                @endforeach
            </select>
            <input class="input" style="width: 60%" placeholder="Search here">
            <button type="submit"  class="search-btn" style="width: 15%"  >Search</button>
        </form>
    </div>
</div>
@endsection
