@extends('layout.layout')
@section('title', 'Account')
@section('content')

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            {{--Vertical Account Detail Actions--}}
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="account-nav active" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a>
                    <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Address</a>
                    <a class="nav-link" id="wishlist-nav" data-toggle="pill" href="#wishlist-tab" role="tab"><i class="fa fa-heart"></i>Wistlist</a>
                    <a class="nav-link" href="/signout"><i class="fa fa-sign-out-alt"></i>Sign out</a>
                </div>
            </div>
            {{--Detail information form--}}
            <div class="col-md-9">
                <div class="tab-content">
                    {{--Active 4--}}
                    <div class="tab-pane fade {{$active == 4 ? 'show active' : ''}}" id="wishlist-tab" role="tabpanel" aria-labelledby="wishlist-nav">
                        <h4>Wistlist</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="wishlist-table">
                                    @foreach ($user->wishlists as $wishItem)
                                    <tr>
                                        <td>{{$wishItem->product->name}}</td>
                                        <td>{{$wishItem->created_at}}</td>
                                        <td>${{$wishItem->product->price}}</td>
                                        <td>{{$wishItem->product->status}}</td>
                                        <td>
                                            <a href="{{url('/product-details/'.$wishItem->product->id)}}" class="btn">View</a>
                                        </td>
                                        <td>
                                            <a productid="{{$wishItem->id}}" title="Remove this item from your wishlist" href="#" class="btn remove-from-wishlist">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--Active 0--}}
                    <div class="tab-pane fade {{$active == 0 ? 'show active' : ''}}" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Account Details</h4>
                        <form id="register-form" action="/update-account" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input value="{{$user->fname}}" class="form-control" type="text" placeholder="First Name" name="txtFirstName">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input value="{{$user->lname}}" class="form-control" type="text" placeholder="Last Name" name="txtLastName">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input value="{{$user->email}}" class="form-control" type="email" placeholder="E-mail" name="txtEmail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input value="{{$user->phone}}" class="form-control" type="tel" placeholder="Mobile No" name="txtPhone">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input value="{{$user->address}}" class="form-control" type="text" placeholder="Address" name="txtAddress">
                                </div>
                                <div class="col-md-12">
                                    @switch($status)
                                    @case(0)
                                    @break
                                    @case(1)
                                    <div class='alert alert-danger'><strong>Fail!</strong> Cannot update account details.</div>
                                    @break
                                    @case(2)
                                    <div class='alert alert-success'><strong>Success!</strong> Account details has been updated.</div>
                                    @break
                                    @default
                                    @endswitch
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn" value="Save Changes" />
                                </div>
                            </div>
                        </form>
                        <br />
                        <h4>Password change</h4>
                        <form action="/update-password" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" required type="password" placeholder="Current Password" name="txtCurrentPassword">
                                </div>
                                <div class="col-md-6">
                                    <input id="password" class="form-control" required type="password" placeholder="New Password" name="txtNewPassword">
                                </div>
                                <div class="col-md-6">
                                    <input id="confirm-password" required class="form-control" type="password" placeholder="Confirm Password" name="txtNewPasswordConfirm">
                                </div>
                                <div class="col-md-12">
                                    @switch($status)
                                    @case(0)
                                    @break
                                    @case(3)
                                    <div class='alert alert-danger'><strong>Fail!</strong> Cannot change password.</div>
                                    @break
                                    @case(4)
                                    <div class='alert alert-success'><strong>Success!</strong> Account password has been updated.</div>
                                    @break
                                    @case(5)
                                    <div class='alert alert-danger'><strong>Fail!</strong> Current password is not correct.</div>
                                    @break
                                    @default
                                    @endswitch
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn" value="Save Changes" />
                                </div>
                                <script>
                                    document.getElementById("confirm-password").onkeyup = function(e) {
                                        var pwd1 = document.getElementById("password");
                                        var pwd2 = document.getElementById("confirm-password");
                                        pwd2.setCustomValidity("");

                                        if (pwd1.value != pwd2.value) {
                                            document.getElementById("confirm-password").setCustomValidity("The passwords don't match"); //The document.getElementById("cnfrm-pw") selects the id, not the value
                                        } else {
                                            document.getElementById("confirm-password").setCustomValidity("");
                                            //empty string means no validation error
                                        }
                                        e.preventDefault(); //would still work if this wasn't present
                                    }

                                    document.getElementById("password").onkeyup = document.getElementById("confirm-password").onkeyup;
                                </script>
                            </div>
                        </form>
                    </div>
                    {{--Active 1--}}
                    <div class="tab-pane fade {{$active == 1 ? 'show active' : ''}}" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <h4>Orders History</h4>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>OrderID</th>
                                        <th>Order Date</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->orders as $order)
                                    <tr>
                                        <td>{{$order->order_date}}</td>
                                        <td>${{$order->total}}</td>
                                        <td>{{$order->status}}</td>
                                        <td><a href="{{url('/order-details/'.$order->id)}}" class="btn">View</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--Active 2--}}
                    <div class="tab-pane fade {{$active == 2 ? 'show active' : ''}}" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Payment Method</h4>
                        <div class="container">
                            <!-- Credit Card Payment Form - START -->
                            <div class="container">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="row">
                                                {{--image visa--}}
                                                <div class="col-6">
                                                    <img class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                                                </div>
                                                {{--visa information form--}}
                                                <div class="panel-body">
                                                    <form role="form">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>CARD NUMBER</label>
                                                                    <div class="input-group">
                                                                        <input type="tel" class="form-control" placeholder="Valid Card Number" />
                                                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                                    <input type="tel" class="form-control" placeholder="MM / YY" />
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>CV CODE</label>
                                                                    <input type="tel" class="form-control" placeholder="CVC" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>CARD OWNER</label>
                                                                    <input type="text" class="form-control" placeholder="Card Owner Names" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                                {{--Submit form--}}
                                                <div class="panel-footer">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <button class="btn btn-warning btn-lg btn-block">Process payment</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                            </div>

                            <style>
                                .cc-img {
                                    margin: 0 auto;
                                }
                            </style>
                            <!-- Credit Card Payment Form - END -->

                        </div>
                    </div>
                    {{--Active 3--}}
                    <div class="tab-pane fade {{$active == 3 ? 'show active' : ''}}" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Payment Address</h5>
                                <p>{{$user->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->

@endsection
