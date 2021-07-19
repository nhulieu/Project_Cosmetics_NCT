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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    {{-- CleaveJS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"
        integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('lib/shoppingcart/jquery.shoppingcart.js') }}"></script>
    <script src="{{ asset('lib/alertifyjs/alertify.js') }}"></script>
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
                if (response.result === "") {
                    location.href = "/signin";
                } else {
                    if(response.result !== ""){
                        $('#wishlist-amount').html(response.result)
                        alertify.success("Added 1 item to Wishlist");
                    }
                }
            }).fail(function(error) {
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
                alertify.success("Successfully remove item from wishlist !");
            }).fail(function(error) {
                console.log(error);
            });
        });

        $(".add-to-cart").click(function(e) {
            $qtyInput = $("#product-qty")[0];
            $goToOrderDetail = e.currentTarget.getAttribute("buyNow")
            $canBuy = e.currentTarget.getAttribute("canBuy");
            $qty = 1;
            if ($qtyInput != null) {
                $qty = $qtyInput.value;
            }
            $jsonObj = JSON.parse(e.currentTarget.getAttribute("product"));
            $product = {
                id: $jsonObj.id,
                name: $jsonObj.name,
                price: $jsonObj.price,
                discount: $jsonObj.discount,
                brand_id: $jsonObj.brand_id,
                count: parseInt($qty)
            }
            if($canBuy) {
                if ($.shoppingcart('add', $product)) {
                    $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');
                    $.ajax({
                        url: '/update-order',
                        type: 'POST',
                        data: {
                            order: {
                                totalQty: $.shoppingcart('getCount'),
                                totalPrice: $.shoppingcart('getPrice'),
                                items: $.shoppingcart('getAll')
                            },
                            _token: "{{ csrf_token() }}"
                        }
                    }).done(function (response) {
                        alertify.notify("Added " + $qty + " item(s)");
                        if ($goToOrderDetail) {
                            location.href = "/order";
                        }
                    }).fail(function (error) {
                        console.log(error);
                    });
                }
            }else{
                alertify.error("The chosen product is not available from now !");
            }
        })

        $(".remove-item").click(function(e) {
            $item = JSON.parse(e.currentTarget.getAttribute("product"));
            $oldAmount = $.shoppingcart('getCount');
            $coupon = $('#coupon_value').html();
            if ($.shoppingcart('remove', $item)) {
                $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');
                $.ajax({
                    url: '/update-order',
                    type: 'POST',
                    data: {
                        order: {
                            totalQty: $.shoppingcart('getCount'),
                            totalPrice: $.shoppingcart('getPrice'),
                            items: $.shoppingcart('getAll')
                        },
                        _token: "{{ csrf_token() }}"
                    }
                }).done(function(response) {
                    e.currentTarget.parentElement.parentElement.hidden = true;
                    alertify.notify("Removed " + $oldAmount + " item(s)");
                    $('#order_total_value').html("$" + parseFloat($.shoppingcart("getPrice")).toFixed(2));
                    $('#order_grand_total_value').html("$" + (parseFloat($.shoppingcart("getPrice")) +
                        parseFloat($coupon)).toFixed(2));
                    if ($.shoppingcart('getCount') <= 0) {
                        $('#checkout_btn')[0].setAttribute("disabled", "disabled");
                        $('#order_grand_total_value').html("$" + 0);
                        $.shoppingcart('clear');
                    }
                }).fail(function(error) {
                    console.log(error);
                });
            }
        });

        $(".sign-out").click(function(e) {
            alertify.confirm("Are you sure ?",
                function() {
                    $.ajax({
                        url: '/signout',
                        type: 'GET'
                    }).done(function(response) {
                        //console.log(response.result);
                        $.shoppingcart('clear');
                        alertify.success("Sign out success ! Redirect to home page", "1", function(e) {
                            location.href = "/";
                        });
                    }).fail(function(error) {
                        console.log(error);
                    });
                },
                function() {});
        });

        $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');


        function changeQuantity(newQty, btn) {
            $id = btn.getAttribute('prdid');
            $prd = $.shoppingcart('getById', $id);
            $coupon = $('#coupon_value').html();
            //console.log($prd);
            $canUpdate = false;
            if (newQty == null) {
                if (btn.value <= 99 && btn.value >= 0) {
                    btn.setAttribute("previousValue", btn.value);
                    $prd.count = btn.value;
                    $canUpdate = true;
                } else {
                    btn.value = btn.getAttribute("previousValue");
                }
            } else {
                if (newQty == 1 && $prd.count < 99) {
                    btn.setAttribute("previousValue", btn.value);
                    $prd.count += newQty;
                    $canUpdate = true;
                } else if (newQty == -1 && $prd.count > 0) {
                    btn.setAttribute("previousValue", btn.value);
                    $prd.count += newQty;
                    $canUpdate = true;
                } else {
                    btn.value = btn.getAttribute("previousValue");
                }
            }

            if ($canUpdate) {
                if ($.shoppingcart("edit", $prd)) {
                    $.ajax({
                        url: '/update-order',
                        type: 'POST',
                        data: {
                            order: {
                                totalQty: $.shoppingcart('getCount'),
                                totalPrice: $.shoppingcart('getPrice'),
                                items: $.shoppingcart('getAll')
                            },
                            _token: "{{ csrf_token() }}"
                        }
                    }).done(function(response) {
                        //console.log("Update Quantity success");
                        $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');
                        $('#item-total-price-'+$id).html("$" + ($prd.price * $prd.count).toFixed(2));
                        $('#order_total_value').html("$" + parseFloat($.shoppingcart("getPrice")).toFixed(2));
                        $('#order_grand_total_value').html("$" + (parseFloat($.shoppingcart("getPrice")) +
                            parseFloat($coupon)).toFixed(2));
                        if ($.shoppingcart('getCount') <= 0) {
                            $('#checkout_btn')[0].setAttribute("disabled", "disabled");
                        } else {
                            $('#checkout_btn')[0].removeAttribute("disabled");
                        }
                    }).fail(function(error) {
                        console.log(error);
                    });
                }
            }
        }

        function applyCoupon() {
            $code = $("#coupon-code").val();
            $ids = [];
            $.shoppingcart("getAll").forEach(function($item, $index) {
                $ids.push($item.brand_id);
            })
            if ($ids.length > 0 && $code.length > 0) {
                $.ajax({
                    url: '/apply-coupon',
                    type: 'POST',
                    data: {
                        code: $code,
                        ids: $ids,
                        _token: "{{ csrf_token() }}"
                    }
                }).done(function(response) {
                    // console.log("Apply coupon success!");


                    switch (parseInt(response.result.state)) {
                        case 0:
                            alertify.success("Apply coupon success!");
                            $('#coupon_value').html(response.result.coupon.discount);
                            $coupon = $('#coupon_value').html();
                            $('#order_total_value').html("$" + ($.shoppingcart("getPrice").toFixed(2)));
                            $('#order_grand_total_value').html("$" + (parseFloat($.shoppingcart("getPrice")) +
                                parseFloat($coupon)).toFixed(2));
                            break;
                        case 1:
                            alertify.error("The coupon has been expired!");
                            break;
                        case 2:
                            alertify.error("The coupon is not existed!");
                            break;
                    }

                }).fail(function(error) {
                    console.log(error);
                    alertify.error("Apply coupon fail!");
                });
            }
            //console.log($ids);
        }

        $("#reset-filter").click(function(e) {
            e.preventDefault();
            $form = e.target.form;
            $form.name.value = "";
            $form.brand.value = "";
            $form.category.value = "";
            $form.status.value = "";
            $form.from.value = "";
            $form.to.value = "";
        })

        $("input[name='paymentMethod']").change(function(e) {
            $form = e.target.form;
            if (e.target.value === "0") {
                $form.owner.setAttribute("required", "");
                $form.card_number.setAttribute("required", "");
                $form.security_code.setAttribute("required", "");
            } else {
                $form.owner.removeAttribute("required");
                $form.card_number.removeAttribute("required");
                $form.security_code.removeAttribute("required");
            }
        })

        function handleGoBill(target) {
            $form = target;
            $.ajax({
                url: '/go-bill',
                type: 'POST',
                data: {
                    paymentMethod: $form.paymentMethod.value,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function(response) {
                $.shoppingcart("clear");
                location.href = "/check-bill/" + response.orderId;
            }).fail(function(error) {
                console.log(error);
                alertify.error("Error submit order, redirected to home !", "1", function(e) {
                    location.href = "/";
                });
            });

        }

        function reviewSubmit(e) {
            e.preventDefault();
            $form = e.currentTarget.form;
            $id = e.currentTarget.getAttribute("productId");
            console.log($form);
            $.ajax({
                url: '/submitReview/' + $id,
                type: 'POST',
                data: {
                    content: $form.content.value,
                    mark: $form.mark.value,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function(response) {
                console.log(response);
                if (response === '') {
                    location.href = '/signin';
                } else {
                    $('#review_list').html(response);
                    e.currentTarget.form.reset();
                }
            }).fail(function(error) {
                console.log(error);
                alertify.error("Error submit reviews !", "1");
            });
        }

        $('#review_form_submit_btn').click(function(e) {
            reviewSubmit(e);
        });

        $('#check-email-form').on('submit', function(e){
            e.preventDefault();
            $form = e.currentTarget;
            $("#check-mail-submit")[0].setAttribute("disabled", "disabled");
            $.ajax({
                url: '/check-email',
                type: 'POST',
                data: {
                    email : $form.emailToCheck.value,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function(response) {
                $("#check-mail-submit")[0].removeAttribute("disabled");
                alertify.success(response.result, "4");
                $('#check-email-form').hide();
                $('#check-code-form')[0].removeAttribute("hidden");
                $('#check-code-form')[0].emailToCheck.value = $form.emailToCheck.value;
                console.log(response.code);
            }).fail(function(error) {
                $("#check-mail-submit")[0].removeAttribute("disabled");
                console.log(error);
                alertify.error("Error when sending email !", "4");
            });
        });

        $('#check-code-form').on('submit', function(e) {
            e.preventDefault();
            $form = e.currentTarget;
            $.ajax({
                url: '/check-code',
                type: 'POST',
                data: {
                    email : $form.emailToCheck.value,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function(response) {
                if(response.isSucceess){
                    alertify.success(response.message, "4");
                    $('#check-code-form').hide();
                    $('#reset-password-form')[0].removeAttribute("hidden");
                    $('#reset-password-form')[0].emailToCheck.value = $form.emailToCheck.value;
                }else{
                    alertify.error(response.message, "4");
                }
            }).fail(function(error) {
                console.log(error);
                alertify.error("Error when confirm code !", "4");
            });

        });

        $('#reset-password-form').on('submit', function(e) {
            e.preventDefault();
            $form = e.currentTarget;
            $.ajax({
                url: '/reset-password',
                type: 'POST',
                data: {
                    email : $form.emailToCheck.value,
                    password : $form.txtNewPassword.value,
                    confirmPassword : $form.txtNewPasswordConfirm.value,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function(response) {
                if(response.isSuccess){
                    $('#reset-password-form').hide();
                    $("#reset-password-input").html("<div class="+"'alert alert-success'><strong>"+response.message+"</strong></div>")
                }else{
                    $("#reset-password-input").html("<div class="+"'alert alert-danger'><strong>"+response.message+"</strong></div>")
                }
            }).fail(function(error) {
                console.log(error);
                alertify.error("Error when changing password !", "4");
            });;
        });


    </script>
</body>

</html>
