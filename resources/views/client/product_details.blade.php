@extends('layout.layout')
@section('title', 'Product Details')
@section('content')

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/product-list">Product</a></li>
            <li class="breadcrumb-item active">{{$product->name}}</li>
        </ul>
    </div>
</div>

<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            {{-- {{dd($product->images)}} --}}
                            <div class="product-slider-single normal-slider">
                                @foreach($product->images as $image)
                                    <img src="{{asset($image->path)}}" alt="Product Image">
                                @endforeach
                            </div>
                            <div class="product-slider-single-nav normal-slider">
                                @foreach($product->images as $image)
                                    <img src="{{asset($image->path)}}" alt="Product Image">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2>{{$product->name}}</h2>
                                </div>
                                <div class="ratting">
                                    @for ($i = 0; $i < $product->mark; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                                <div class="price">
                                    <h4>Price:</h4>
                                    <p>
                                        @if ($product->discount > 0)
                                        ${{$product->price - ($product->price * $product->discount / 100)}}
                                        <span>
                                            ${{$product->price}}
                                        </span>
                                        @else
                                        ${{$product->price}}
                                        @endif
                                    </p>
                                </div>
                                <div class="quantity">
                                    <h4>Quantity:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input id="product-qty" type="number" value="1" min = "0" max="99">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="price">
                                    <h4>Status:</h4>
                                    <!-- <div class="qty"> -->
                                    @if ($product->status == 1)
                                    <button type="button" class="btn btn-success">Available</button>
                                    @else
                                    <button type="button" class="btn btn-danger">Unavailable</button>
                                    @endif

                                    <!-- </div> -->
                                </div>
                                <div class="price">
                                    <h4>Category:</h4>
                                    <button type="button" class="btn btn-success">{{$product->category->name}}</button>
                                </div>
                                <div class="price">
                                    <h4>Brand:</h4>
                                    <button type="button" class="btn btn-success">{{$product->brand->name}}</button>
                                </div>
                                <div class="action">
                                    <button productid="{{$product->id}}" class="btn add-to-wishlist"><i class="fa fa-heart"></i>Add to Wishlist</button>
                                    <button  product="{{$product->toJson()}}"
                                    class="btn add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                    <button class="btn buy-now"><i class="fa fa-shopping-bag"></i>Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>

                </script>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#reviews" id="reviews_count">Reviews</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p>
                                    {{$product->description}}
                                </p>

                            </div>
                            <div id="specification" class="container tab-pane fade">
                                <h4>Product specification</h4>
                                <ul>
                                    {{$product->feature}}
                                </ul>

                            </div>
                            <div id="reviews" class="container tab-pane fade">
                                <div id="review_list">
                                    @foreach($product->reviews as $review)
                                        <div class="reviews-submitted">
                                            <div class="reviewer">{{$review->user->lname." ".$review->user->fname}} - <span>{{$review->created_at}}</span></div>
                                            <div class="ratting">
                                                @for ($i = 0; $i < $review->mark; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            <p>
                                                {{$review->content}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="reviews-submit">
                                    <h4 class="mb-2"><b>Give your Review:</b></h4>

                                    <form id="review_form">
                                        <div class="row form">
                                            <div class="col-sm-6 mb-2" id="rating">
                                                Your rating:
                                                <select name="mark">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                <i class="fa fa-star ratting"></i>
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review" name="content"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button id="review_form_submit_btn" productId="{{$product->id}}">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <div class="section-header">
                        <h1>Related Products</h1>
                    </div>

                    <div class="row align-items-center product-slider product-slider-3">
                        @foreach($products as $item)
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="{{url('/product-details/'.$item->id)}}">{{$item->name}}</a>
                                        <div class="ratting">
                                            @for($i=0; $i < $item->mark; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="product-image">
{{--                                        {{dd($item->images)}}--}}
                                        @if(isset($item->images->first()->path))
                                            <a>
                                                <img src="/{{$item->images->first()->path}}" alt="Product Image">
                                            </a>
                                        @endif
                                        <div class="product-action">
                                            <a product="{{$item->toJson()}}" class="btn add-to-cart"><i class="fa fa-cart-plus"></i></a>
                                            <a class="add-to-wishlist" productid="{{$item->id}}"><i class="fa fa-heart"></i></a>
                                            <a href="{{url('/product-details/'.$item->id)}}"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{$item->price}}</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#best-sale"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#new-arrival"><i class="fa fa-plus-square"></i>New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#fashion-beauty"><i class="fa fa-female"></i>Beauty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#fashion-beauty"><i class="fa fa-tshirt"></i>Famous Brands</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#fashion-beauty"><i class="fa fa-cart-plus"></i>Accessories</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="sidebar-widget widget-slider">
                    <div class="sidebar-slider normal-slider">
                        @foreach($products as $item)
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="{{url('/product-details/'.$item->id)}}">{{$item->name}}</a>
                                        <div class="ratting">
                                            @for($i=0; $i < $item->mark; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        @if(isset($item->images->first()->path))
                                            <a>
                                                <img src="/{{$item->images->first()->path}}" alt="Product Image">
                                            </a>
                                        @endif
                                        <div class="product-action">
                                            <a product="{{$item->toJson()}}" class="btn add-to-cart"><i class="fa fa-cart-plus"></i></a>
                                            <a class="add-to-wishlist" productid="{{$item->id}}"><i class="fa fa-heart"></i></a>
                                            <a href="{{url('/product-details/'.$item->id)}}"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{$item->price}}</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="sidebar-widget brands">
                    <h2 class="title">Our Brands</h2>
                    <ul>
                        @foreach (\App\Models\brand::all() as $brand)
                            <li><a  href="{{url('/product-list?brand='.$brand->id)}}">{{$brand->name}}</a><span>({{$brand->products->count()}})</span></li>
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
<!-- Product Detail End -->

<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            @foreach(\App\Models\brand::all() as $brand)
            <div class="brand-item"><img src="{{$brand->logo}}" alt=""></div>
            @endforeach
        </div>
    </div>
</div>
<!-- Brand End -->
@endsection
