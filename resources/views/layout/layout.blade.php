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
    <script src="{{ asset('js/bootstrap-show-password.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(".add-to-wishlist").click(function(e) {
            $id = e.currentTarget.getAttribute("productid");
            console.log($id);            
            $.ajax({
                url: '/add-wishlist/' + $id,
                type: 'GET',
                data: {}
            }).done(function(response) {                
                $('#wishlist-amount').html(response.result)
            }).fail(function(error){
                console.log(error);
            });
        });

        $(".remove-from-wishlist").click(function(e) {
            $id = e.currentTarget.getAttribute("productid");            
            console.log($id);            
            
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
                count : parseInt($qty)
            }
            console.log($product);
            if($.shoppingcart('add',$product)){
                $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');
            }

        })

        $("#order-amount")[0].innerHTML = $.shoppingcart('getCount');

        
    </script>
</body>

</html>