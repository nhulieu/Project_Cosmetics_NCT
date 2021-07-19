@extends('layout.layout')
@section('title', 'Home')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap mb-5">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ul>
        </div>
    </div>

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/"><i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/product-list?mark=4"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/product-list?status=2"><i class="fa fa-plus-square"></i>New Arrivals</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#fashion-beauty"><i class="fa fa-female"></i>Beauty</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#fashion-beauty"><i class="fa fa-tshirt"></i>Famous Brands</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#fashion-beauty"><i class="fa fa-cart-plus"></i>Accessories</a>--}}
{{--                            </li>--}}
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item">
                            <img src="img/slider-1.png" alt="Slider Image"/>
                            <div class="header-slider-caption">
                                <p>The best-buy brand</p>
                                <a class="btn" href="/product-list"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="img/slider-2.png" alt="Slider Image"/>
                            <div class="header-slider-caption">
                                <p>The best sale all the time</p>
                                <a class="btn" href="/product-list"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="img/slider-3.png" alt="Slider Image"/>
                            <div class="header-slider-caption">
                                <p>It's your shopping time</p>
                                <a class="btn" href="/product-list"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="img/category-1.png"/>
                            <a class="img-text" href="/product-list">
                                <p>Click here to buy</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="img/category-2.png"/>
                            <a class="img-text" href="/product-list">
                                <p>Click here to buy</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Brand Start -->
    <div class="brand" id="fashion-beauty">
        <div class="container-fluid">
            <div class="brand-slider">
                @foreach(\App\Models\brand::all() as $brand)
                    <a class="brand-item" href="{{url('/product-list?brand='.$brand->id)}}"><img src="{{$brand->logo}}"
                                                                                                 alt=""/></a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>Secure Payment</h2>
                        <p>
                            Be satisfied with our secured payment process
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Worldwide Delivery</h2>
                        <p>
                            Ship goods to every corners of globe
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>90 Days Return</h2>
                        <p>
                            Free to check & change
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>24/7 Support</h2>
                        <p>
                            Call us now
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->

    <!-- Category Start-->
    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/category-3.png"/>
                        <a class="category-name" href="/product-list">
                            <p>For more info, click here</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-250">
                        <img src="img/category-4.jpg"/>
                        <a class="category-name" href="/product-list">
                            <p>For more info, click here</p>
                        </a>
                    </div>
                    <div class="category-item ch-150">
                        <img src="img/category-5.png"/>
                        <a class="category-name" href="/product-list">
                            <p>For more info, click here</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-150">
                        <img src="img/category-6.jpg"/>
                        <a class="category-name" href="/product-list">
                            <p>For more info, click here</p>
                        </a>
                    </div>
                    <div class="category-item ch-250">
                        <img src="img/category-7.png"/>
                        <a class="category-name" href="/product-list">
                            <p>For more info, click here</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/category-8.jpg"/>
                        <a class="category-name" href="/product-list">
                            <p>For more info, click here</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End-->

    <!-- Call to Action Start -->
    <div class="call-to-action">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Call us for any queries</h1>
                </div>
                <div class="col-md-6">
                    <a href="tel:0123456789">+84962382911</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1 id="best-sale">Best sale</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach(\App\Models\product::where("mark", "=", 5)->take(5)->get() as $item)
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
                                    <img src="{{$item->images->first()->path}}" alt="Product Image">
                                </a>
                            @endif
                            <div class="product-action">
                                <a product="{{$item->toJson()}}" canBuy="{{$item->status == 1}}" class="btn add-to-cart"><i class="fa fa-cart-plus"></i></a>
                                <a class="add-to-wishlist" productid="{{$item->id}}"><i class="fa fa-heart"></i></a>
                                <a href="{{url('/product-details/'.$item->id)}}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>{{number_format($item->price * (100 - $item->discount) / 100, 2)}}</h3>
                            <a buyNow="true" canBuy="{{$item->status == 1}}" product="{{$item->toJson()}}" class="btn add-to-cart buy-now"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured Product End -->

    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Subscribe Our Newsletter</h1>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <input type="email" value="Your email here">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- `N`ewsletter End -->

    <!-- Recent Product Start -->
    <div class="recent-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1 id="new-arrival">New Arrival</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach(\App\Models\product::where("status", "=", 2)->take(5)->get() as $item)
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{url('/product-details/'.$item->id)}}">{{$item->name}}</a>
                                <div class="ratting">
                                    @for($i=0; $i < $item->mark; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                                <div class="product-image">
                                    @if(isset($item->images->first()->path))
                                        <a>
                                            <img src="{{$item->images->first()->path}}" alt="Product Image">
                                        </a>
                                    @endif
                                    <div class="product-action">
                                        <a product="{{$item->toJson()}}" canBuy="{{$item->status == 1}}" class="btn add-to-cart"><i
                                                class="fa fa-cart-plus"></i></a>
                                        <a class="add-to-wishlist" productid="{{$item->id}}"><i class="fa fa-heart"></i></a>
                                        <a href="{{url('/product-details/'.$item->id)}}"><i
                                                class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>{{$item->price * (100 - $item->discount) / 100}}</h3>
                                <a buyNow="true" canBuy="{{$item->status == 1}}" product="{{$item->toJson()}}" class="btn add-to-cart"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Recent Product End -->

    <!-- Newsletter Start -->
    <div class="call-to-action mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Review from our client</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Start -->
    <div class="review">
        <div class="container-fluid">
            <div class="row align-items-center review-slider normal-slider">
                @foreach(\App\Models\review::where("mark", ">=", 4)->take(5)->get() as $review)
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="https://i.pravatar.cc/150?img={{$review->user->id+2}}" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>{{$review->user->lname." ".$review->user->fname}}</h2>
                            <div class="ratting">
                                @for($i=0; $i < $review->mark; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                            <p>
                                {{$review->content}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Review End -->
@endsection
