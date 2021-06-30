<!-- Top bar Start -->
<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <i class="fa fa-envelope"></i>
                cangtvts2006017@fpt.edu.vn
            </div>
            <div class="col-sm-6">
                <i class="fa fa-phone-alt"></i>
                +84962382911
            </div>
        </div>
    </div>
</div>
<!-- Top bar End -->

<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="/">
                        <img src="../img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="/wishlist" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        @if (Session::get("user") !== null)
                            <span id="wishlist-amount">{{Session::get("wishlistAmount")}}</span>
                        @else
                            <span id="wishlist-amount">(0)</span>
                        @endif

                    </a>
                    <a href="/order" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span id="order-amount">(0)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->
