@extends('layout.layout')
@section('title', 'Order Details')
@section('content')

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
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="img/product-1.jpg" alt="Image"></a>
                                            <p>{{$item->product->name}}</p>
                                        </div>
                                    </td>
                                    <td>{{$item->product->price}}</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>{{$item->product->name * $item->quantity}}</td>
                                    <td><a href="{{url('/product-details/'.$item->product->id)}}" class="btn">View</a></td>
                                </tr>
                                @endforeach
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
                                <input type="text" placeholder="Coupon Code">
                                <button>Apply Code</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>$99</span></p>
                                    <p>Shipping Cost<span>$1</span></p>
                                    <h2>Grand Total<span>$100</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <button>Update Cart</button>
                                    <button>Checkout</button>
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