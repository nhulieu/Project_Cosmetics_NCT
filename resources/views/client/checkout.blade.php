@extends('layout.layout')
@section('title', 'Checkout')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/order">Orders</a></li>
                <li class="breadcrumb-item active">Checkout</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>User Information</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input readonly class="form-control" value="{{$user->fname}}" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input readonly class="form-control" value="{{$user->lname}}" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input readonly class="form-control" value="{{$user->email}}" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input readonly class="form-control" value="{{$user->phone}}" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input readonly class="form-control" value="{{$user->address}}" type="text" placeholder="Address">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>Cart Total</h1>
                            <p class="sub-total">Sub Total<span>${{number_format(json_decode($order)->totalPrice, 2)}}</span></p>
                            <p class="ship-cost">Coupon<span>-${{number_format($coupon, 2)}}</span></p>
                            <h2>Grand Total<span>${{number_format(json_decode($order)->totalPrice-$coupon, 2)}}</span></h2>
                        </div>

                        <form class="checkout-payment" onsubmit="handleGoBill(this)">
                            @csrf
                            <div class="payment-methods">
                                <h1>Payment Methods</h1>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio"required class="custom-control-input" id="payment-1" value="0" name="paymentMethod">
                                        <label class="custom-control-label" for="payment-1">Credit Card</label>
                                    </div>
                                    <div class="payment-content" id="payment-1-show">
                                        <p>
                                        <div class="col-md-12">
                                            <label>Owner</label>
                                            <input type="text" class="form-control" placeholder="Owner" name="owner">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Card Number</label>
                                            <input type="number" minlength="16" maxlength="16" class="form-control" placeholder="Card Number" name="card_number">
                                        </div>
                                        <div class="col-md-8">
                                            <label>Expiration</label>
                                            <input type="date" class="form-control" placeholder="Expiration" name="expiration">
                                        </div>
                                        <div class="col-md-8">
                                            <label>Security</label>
                                            <input type="number" class="form-control" minlength="3" maxlength="3" placeholder="Security Code" name="security_code">
                                        </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required class="custom-control-input" id="payment-2" value="1" name="paymentMethod">
                                        <label class="custom-control-label" for="payment-2">COD</label>
                                    </div>
                                    <div class="payment-content" id="payment-2-show">
                                        <p>
                                            The order will be deliveried to the {{$user->address}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-btn">
                                <button type="submit">Go Bill</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
