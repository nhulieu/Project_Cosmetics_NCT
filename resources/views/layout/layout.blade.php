<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('lib/alertifyjs/css/alertify.css') }}" />
    <!-- include a theme, can be included into the core instead of 2 separate files -->
    <link rel="stylesheet" href="{{ asset('lib/alertifyjs/css/themes/bootstrap.css') }}" />
    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    @include('layout.header')
    <!-- /HEADER-->

    <!-- NAVIGATION -->
    @include('layout.navigation')
    <!-- /NAVIGATION-->

    <!-- section -->
    @yield('content')
    <!-- /section -->

    <!-- FOOTER -->
    @include('layout.footer')
    <!-- /FOOTER-->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('lib/shoppingcart/jquery.shoppingcart.js')}}"></script>
    <script src="{{ asset('lib/alertifyjs/alertify.js')}}"></script>
    <script src="{{ asset('js/bootstrap-show-password.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(".add-to-wishlist").click(function(e) {
            $id = e.currentTarget.getAttribute("productid");
            //console.log($id);
            $.ajax({
                url: '/add-wishlist/' + $id,
                type: 'GET',
                data: {}
            }).done(function(response) {
                $('#wishlist-amount').html(response.result)
                alertify.notify("Added 1 item to Wishlist");
            }).fail(function(error){
                console.log(error);
            });
        });

        $(".remove-from-wishlist").click(function(e) {
            $id = e.currentTarget.getAttribute("productid");
            //console.log($id);

            $.ajax({
                url: '/delete-wishlist/' + $id,
                type: 'GET',
                data: {}
            }).done(function(response) {
                $('#wishlist-amount').html(response.result)
                e.currentTarget.parentElement.parentElement.hidden = true;
            }).fail(function(error){
                console.log(error);
            });
        });

        $(".add-to-cart").click(function(e){
            $qtyInput = $("#product-qty")[0];
            $qty = 1;
            if($qtyInput != null){
                $qty = $qtyInput.value;
            }
            $jsonObj = JSON.parse(e.currentTarget.getAttribute("product"));
            $product = {
                id : $jsonObj.id,
                name : $jsonObj.name,
                price : $jsonObj.price,
                discount : $jsonObj.discount,
                brand_id : $jsonObj.brand_id,
                count : parseInt($qty)
            }
            console.log($product);
            if($.shoppingcart('add',$product)){
                $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');
                $.ajax({
                    url: '/update-order',
                    type: 'POST',
                    data: {
                        order : {
                            totalQty : $.shoppingcart('getCount'),
                            totalPrice : $.shoppingcart('getPrice'),
                            items : $.shoppingcart('getAll')
                        },
                        _token : "{{csrf_token()}}"
                    }
                }).done(function(response) {
                    //console.log(response.result);
                    alertify.notify("Added " + $qty + " item(s)");
                }).fail(function(error){
                    console.log(error);
                });
            }
        })

        $(".remove-item").click(function(e){
            $item = JSON.parse(e.currentTarget.getAttribute("product"));
            $oldAmount = $.shoppingcart('getCount');
            if($.shoppingcart('remove', $item)){
               $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');
                $.ajax({
                    url: '/update-order',
                    type: 'POST',
                    data: {
                        order : {
                            totalQty : $.shoppingcart('getCount'),
                            totalPrice : $.shoppingcart('getPrice'),
                            items : $.shoppingcart('getAll')
                        },
                        _token : "{{csrf_token()}}"
                    }
                }).done(function(response) {
                    //console.log(response.result);
                    alertify.notify("Removed " + $oldAmount + " item(s)");
                }).fail(function(error){
                    console.log(error);
                });
            }
        });

        $(".sign-out").click(function(e){
            alertify.confirm("Are you sure ?",
            function(){
                $.ajax({
                    url: '/signout',
                    type: 'GET'
                }).done(function(response) {
                    //console.log(response.result);
                    $.shoppingcart('clear');
                    alertify.success("Sign out success !", "1", function(e){
                        location.href = "/";
                    });
                }).fail(function(error){
                    console.log(error);
                });
            },
            function(){
            });
        });

        $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');

        // $(".item-qty").change(function(e){
        //     $product = e.target.getAttribute("product");
        //     console.log($product);
        // })
        function changeQuantity(newQty, btn){
            $id = btn.getAttribute('prdid');
            $prd = $.shoppingcart('getById', $id);
            $coupon = $('#coupon-value').html();
            //console.log($prd);
            $canUpdate = false;
            if(newQty == null){
                if(btn.value <= 99 && btn.value >= 0){
                    btn.setAttribute("previousValue", btn.value);
                    $prd.count = btn.value;
                    $canUpdate = true;
                }else{
                    btn.value = btn.getAttribute("previousValue");
                }
            }else{
                if(newQty == 1 && $prd.count < 99){
                    btn.setAttribute("previousValue", btn.value);
                    $prd.count += newQty;
                    $canUpdate = true;
                }else if(newQty == -1 && $prd.count > 0){
                    btn.setAttribute("previousValue", btn.value);
                    $prd.count += newQty;
                    $canUpdate = true;
                }else{
                    btn.value = btn.getAttribute("previousValue");
                }
            }

            if($canUpdate){
                if($.shoppingcart("edit", $prd)){
                    $.ajax({
                        url: '/update-order',
                        type: 'POST',
                        data: {
                            order : {
                                totalQty : $.shoppingcart('getCount'),
                                totalPrice : $.shoppingcart('getPrice'),
                                items : $.shoppingcart('getAll')
                            },
                            _token : "{{csrf_token()}}"
                        }
                    }).done(function(response) {
                        //console.log("Update Quantity success");
                        $('#item-total-price-'+$id).html("$" + ($prd.price * $prd.count * (1 - $prd.discount/100)));
                        $('#order_total-value').html("$" + ($.shoppingcart("getPrice")));
                        $('#order_grand_total-value').html("$" + (parseInt($.shoppingcart("getPrice")) + $coupon));
                    }).fail(function(error){
                        console.log(error);
                    });
                }
            }
        }

        function applyCoupon(){
            $code = $("#coupon-code").val();
            $ids = [];
            $.shoppingcart("getAll").forEach(function($item, $index){
                $ids.push($item.brand_id);
            })
            if($ids.length > 0 && $code.length > 0){
                $.ajax({
                    url: '/apply-coupon',
                    type: 'POST',
                    data: {
                        code : $code,
                        ids : $ids,
                        _token : "{{csrf_token()}}"
                    }
                }).done(function(response) {
                    // console.log("Apply coupon success!");


                    switch (parseInt(response.result.state)){
                        case 0:
                            alertify.success("Apply coupon success!");
                            $('#coupon-value').html(response.result.coupon.discount);
                            $coupon = $('#coupon-value').html();
                            $('#order_total-value').html("$" + ($.shoppingcart("getPrice")));
                            $('#order_grand_total-value').html("$" + (parseInt($.shoppingcart("getPrice")) - $coupon));
                            break;
                        case 1:
                            alertify.error("The coupon has been expired!");
                            break;
                        case 2:
                            alertify.error("The coupon is not existed!");
                            break;
                    }

                }).fail(function(error){
                    console.log(error);
                    alertify.error("Apply coupon fail!");
                });
            }
            //console.log($ids);
        }
    </script>
</body>

</html>
