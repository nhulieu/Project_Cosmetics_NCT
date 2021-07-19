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
                        <a class="nav-link {{$active == 0 ? 'active' : ''}}" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                        <a class="nav-link {{$active == 1 ? 'active' : ''}}" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                        <a class="nav-link {{$active == 3 ? 'active' : ''}}" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Address</a>
                        <a class="nav-link {{$active == 4 ? 'active' : ''}}" id="wishlist-nav" data-toggle="pill" href="#wishlist-tab" role="tab"><i class="fa fa-heart"></i>Wistlist</a>
                        <a class="nav-link" href="/signoutExt"><i class="fa fa-sign-out-alt"></i>Sign out</a>
                    </div>
                </div>
                {{--Detail information form--}}
                <div class="col-md-9">
                    <div class="tab-content">
                        {{--Active 4--}}
                        <div class="tab-pane fade {{$active == 4 ? 'show active' : ''}}" id="wishlist-tab" role="tabpanel" aria-labelledby="wishlist-nav">
                            <h2 class="mb-4"><b>Wistlist</b></h2>
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
                                            <td>
                                                @switch($wishItem->product->status)
                                                    @case(0)
                                                        Unavailable
                                                    @break

                                                    @case(1)
                                                        Available
                                                    @break

                                                    @case(2)
                                                        Incoming
                                                    @break
                                                @endswitch
                                            </td>
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
                            <h2 class="mb-4"><b>Account Details</b></h2>
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
                            <h2 class="mb-4"><b>Password change</b></h2>
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
                                <h2 class="mb-4"><b>Orders History</b></h2>
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>OrderID</th>
                                        <th>Order Date</th>
                                        <th>Total Price</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->orders as $order)
                                        <tr>
                                            <td>#{{$order->id}}</td>
                                            <td>{{$order->order_date}}</td>
                                            <td>${{$order->total()}}</td>
                                            <td>
                                                @switch($order->status)
                                                    @case(0)
                                                        Credit Card
                                                    @break
                                                    @case(1)
                                                        Cash On Delivery
                                                    @break
                                                @endswitch
                                            </td>
                                            <td><a href="{{url('/check-bill/'.$order->id)}}" class="btn">View</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--Active 3--}}
                        <div class="tab-pane fade {{$active == 3 ? 'show active' : ''}}" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <h2 class="mb-4"><b>Address</b></h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Main Address</label>
                                    <input value="{{$user->address}}" class="form-control" type="text" readonly>
                                </div>
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
