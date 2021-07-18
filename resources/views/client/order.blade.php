@extends('layout.layout')
@section('title', 'Order')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ul>
        </div>
    </div>

    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>

                                <tbody class="align-middle">
                                @if(isset(json_decode($order)->items))
                                    @foreach(json_decode($order)->items as $item)
                                        <tr>
                                            <td>
                                                <div class="img">
{{--                                                    {{dd(\App\Models\product::find($item->id)->images)}}--}}
                                                    <a href="#"><img src="{{\App\Models\product::find($item->id)->images->first()->path}}" alt="Image"></a>
                                                    <p>{{$item->name}}</p>
                                                </div>
                                            </td>
                                            <td>${{number_format($item->price, 2)}}</td>
                                            <td>{{$item->discount ? number_format($item->discount, 2) : 0}}%</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus item-qty-minus" prdid="{{$item->id}}" onclick="changeQuantity(-1, this)"><i class="fa fa-minus"></i></button>
                                                    <input class="item-qty" prdid="{{$item->id}}" type="text" previousValue="{{$item->count}}" value="{{$item->count}}" min="0" max="99" onchange = "changeQuantity(null, this)">
                                                    <button class="btn-plus item-qty-plus" prdid="{{$item->id}}" onclick="changeQuantity(1, this)"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td id="{{'item-total-price-'.$item->id}}">${{number_format($item->price, 2) * number_format($item->count, 2)}}</td>
                                            <td><button product="{{json_encode($item)}}" class="remove-item"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="coupon">
                                    <input id="coupon-code" type="text" placeholder="Coupon Code">
                                    <button onclick="applyCoupon()">Apply Code</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Cart Summary</h1>
                                        @if(isset(json_decode($order)->items))
                                            <p>Sub Total<span id="order_total_value">${{number_format(json_decode($order)->totalPrice, 2)}}</span></p>
                                            <p>Coupon<span>-$<b id="coupon_value">0</b></span></p>
                                            <h2>Grand Total<span id="order_grand_total_value">${{number_format(json_decode($order)->totalPrice, 2)}}</span></h2>
                                        @else
                                            <p>Sub Total<span>$0</span></p>
                                            <p>Shipping Cost<span id="coupon_value">$<b id="coupon_value">0</b></span></p>
                                            <h2>Grand Total<span>$0</span></h2>
                                        @endif
                                    </div>
                                    <div class="cart-btn">
                                        <button onclick="location.href='/product-list'">Continue</button>
                                        <button id="checkout_btn" onclick="location.href='/checkout'">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@endsection
