@extends('layout.layout')
@section('title', 'Product')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/product-list">Product</a></li>
            </ul>
        </div>
    </div>
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        {{--Search div--}}
                        <form class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <input type="text" name="name" placeholder="Type a name" value="{{$name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <select name="category" class="dropdown-toggle" data-toggle="dropdown" value="{{$categoryInput}}">
                                                    @if($categoryInput == "")
                                                        <option selected value="" class="dropdown-item">Product by Category</option>
                                                    @else
                                                        <option value="" class="dropdown-item">Product by Category</option>
                                                    @endif
                                                    @foreach(\App\Models\category::all() as $category)
                                                        @if($categoryInput == $category->id)
                                                            <option selected value="{{$category->id}}" class="dropdown-item">{{$category->name}}</option>
                                                        @else
                                                            <option value="{{$category->id}}" class="dropdown-item">{{$category->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <select name="brand" class="dropdown-toggle" data-toggle="dropdown">
                                                    @if($brandInput == "")
                                                        <option selected value="" class="dropdown-item">Product by Brand</option>
                                                    @else
                                                        <option value="" class="dropdown-item">Product by Brand</option>
                                                    @endif
                                                    @foreach(\App\Models\brand::all() as $brand)
                                                        @if($brandInput == $brand->id)
                                                            <option selected value="{{$brand->id}}" class="dropdown-item">{{$brand->name}}</option>
                                                        @else
                                                            <option value="{{$brand->id}}" class="dropdown-item">{{$brand->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <input type="number" name="from" placeholder="Product from min price" value="{{$from}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <input type="number" name="to" placeholder="Product to max price" value="{{$to}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <select name="status" class="dropdown-toggle" data-toggle="dropdown" value="{{$status}}">
                                                    @if($status == "")
                                                        <option selected value="" class="dropdown-item">Product by Status</option>
                                                    @else
                                                        <option value="" class="dropdown-item">Product by Status</option>
                                                    @endif
                                                    @if($status == "1")
                                                        <option selected value="1" class="dropdown-item">Available</option>
                                                    @else
                                                        <option value="1" class="dropdown-item">Available</option>
                                                    @endif
                                                    @if($status == "0")
                                                        <option selected value="0" class="dropdown-item">Unavailable</option>
                                                    @else
                                                        <option value="0" class="dropdown-item">Unavailable</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <input class="btn btn-success" type="submit" value="Filter"/>
                                    </div>
                                    <div class="col-md-1">
                                        <input id="reset-filter" class="btn btn-danger" onclick="reset()" type="reset" value="Reset"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @foreach($products as $item)
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="{{url('/product-details/'.$item->id)}}" title="{{$item->name}}">{{$item->name}}</a>
                                        <div class="ratting">
                                            @for($i=0; $i < $item->mark; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        @if(isset($item->images->first()->path))
                                            <a>
                                                <img src="{{$item->images->first()->path}}" alt="Product Image">
                                            </a>
                                        @endif
                                        <div class="product-action">
                                            <a product="{{$item->toJson()}}" class="btn add-to-cart"><i class="fa fa-cart-plus"></i></a>
                                            <a class="add-to-wishlist" productid="{{$item->id}}"><i class="fa fa-heart"></i></a>
                                            <a href="{{url('/product-details/'.$item->id)}}"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{number_format($item->price - ($item->price * $item->discount / 100), 2)}}</h3>
                                        <a buyNow="true" product="{{$item->toJson()}}" class="btn add-to-cart"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Pagination Start -->

                        <div class="col-md-12 mt-5">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="{{$products->currentPage() == 1 ?$products->url(1) : $products->url($products->currentPage()-1)}}" >Previous</a>
                                    </li>
                                    @for($i=1;$i<=$products->lastPage();$i++)
                                        <li class="{{$products->currentPage() == $i ? "page-item active":"page-item"}}"><a class="page-link" href="{{$products->url($i)}}">{{$i}}</a></li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{$products->nextPageUrl()}}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->

                    </div>
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    {{--CATEGORY-SIDEBAR--}}
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/product-list?mark=4"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/product-list?newArrival=true"><i class="fa fa-plus-square"></i>New Arrivals</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Beauty</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Famous Brands</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#"><i class="fa fa-cart-plus"></i>Accessories</a>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">Our Brands</h2>
                        <ul>
                            @foreach(\App\Models\brand::all() as $brand)
                                <li><a href="{{url('/product-list?brand='.$brand->id)}}">{{$brand->name}} </a><span>({{$brand->products->count()}})</span></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-widget tag">
                        <h2 class="title">Tags Cloud</h2>
                        @foreach(\App\Models\tag::all() as $tag)
                            <a href="{{url('/product-list?tag='.$tag->id)}}">{{$tag->label}} </a>
                        @endforeach
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product List End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                @foreach(\App\Models\brand::all() as $brand)
                    <a class="brand-item" href="{{url('/product-list?brand='.$brand->id)}}"><img src="{{$brand->logo}}" alt=""/></a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Brand End -->
@endsection
