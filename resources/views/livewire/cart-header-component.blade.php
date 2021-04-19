    <div class="wrap-icon right-section">
        <div class="wrap-icon-section wishlist">
            <a href="#" class="link-direction">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <div class="left-info">
                    <span class="index">{{Cart::instance('wishlist')->count()}} item</span>
                    <span class="title">Wishlist</span>
                </div>
            </a>
        </div>
        <div class="wrap-icon-section minicart">
            <a href="#" class="link-direction">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                <div class="left-info">
                    <span class="index">{{Cart::instance('cart')->count()}} Items</span>
                    <span class="title">CART</span>
                </div>
            </a>
        </div>
