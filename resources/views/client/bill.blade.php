@extends('layout.layout')
@section('title', 'Bill')
@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/order">Orders</a></li>
            <li class="breadcrumb-item"><a href="/checkout">Checkout</a></li>
            <li class="breadcrumb-item active">Bill</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="70%">
                                        <img src="../img/logo.png" alt="Logo">
                                    </td>
                                    <td  class="text-left">
                                        <h2>Invoice #{{$order->id}}</h2>
                                        Issued {{$order->order_date}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br/>
                        <hr/>
                        <br/>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <b>From:</b>
                                    </td>
                                    <td width="80%" class="text-left">590 Cach Mang Thang Tam, Ward 11, District 3, Ho Chi Minh City</td>

                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <b>To:</b>
                                    </td>
                                    <td width="80%" class="text-left">{{$order->invoice->recipient_address}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <b>Payment Method:</b>
                                    </td>
                                    <td width="80%" class="text-left">
                                        @switch($order->invoice->type)
                                            @case(0)
                                                Credit Card
                                            @break

                                            @case(1)
                                                Cash On Delivery
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br/>
                        <hr/>
                        <br/>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                            </thead>
                            <tbody class="align-middle">

                            @if(isset($order->items))
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>
                                            <p>{{$item->product->name}}</p>
                                        </td>
                                        <td>${{number_format($item->product->price, 2)}}</td>
                                        <td>{{$item->product->discount ? number_format($item->product->discount, 2) : 0}}%</td>
                                        <td>
                                            {{$item->quantity}}
                                        </td>
                                        <td>${{number_format(($item->product->price * $item->quantity * (1 - $item->product->discount/100)), 2) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr class="table-borderless">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Coupon</th>
                                <th>-${{$order->coupon_value}}</th>
                            </tr>
                            <tr class="table-borderless">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th>${{$order->total()}}</th>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
