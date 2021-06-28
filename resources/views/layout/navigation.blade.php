<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="/" class="nav-item nav-link">Home</a>
                    <a href="/product-list" class="nav-item nav-link">Products</a>
                    <!-- <a href="/product-detail" class="nav-item nav-link">Product Detail</a> -->
                    <!-- <a href="cart.html" class="nav-item nav-link">Cart</a> -->
                    <!-- <a href="checkout.html" class="nav-item nav-link">Checkout</a> -->
                    <!-- <a href="my-account.html" class="nav-item nav-link">My Account</a> -->
                    <!-- <a href="/wishlist" class="nav-item nav-link">Wishlist</a> -->
                    <a href="/contact" class="nav-item nav-link">Contact Us</a>
                    <a href="/about" class="nav-item nav-link">About</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                        <div class="dropdown-menu">
                            <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                            <a href="login.html" class="dropdown-item">Login & Register</a>
                            <a href="/contact" class="dropdown-item">Contact Us</a>
                        </div>
                    </div> -->
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        @if (Session::get("user") !== null)
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Session::get("userFullname")}}</a>
                        <div class="dropdown-menu">
                            <a href="/my-account" class="dropdown-item">Setting</a>
                            <button class="dropdown-item sign-out">Sign out</button>
                        </div>
                        @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                        <div class="dropdown-menu">
                            <a href="/signin" class="dropdown-item">Sign up/ Sign in</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
