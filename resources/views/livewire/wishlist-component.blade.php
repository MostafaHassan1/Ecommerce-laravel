<div id="main" class="main-site left-sidebar">
    <style>
        .product-wish {
            position: absolute;
            top: 10%;
            left: 0;
            z-index: 99;
            right: 30px;
            text-align: right;
            padding-top: 0;
        }

        .product-wish .fa {
            color: gray;
            font-size: 32px;

        }

        .product-wish .fill-heart {
            color: red;
        }
    </style>
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Wishlist</span></li>
            </ul>
        </div>
        <div class="row">
            @if ($products->count() > 0)
            <ul class="product-list grid-products equal-container">
                @foreach ($products as $product)
                <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6" id="{{$product->id}}">
                    <div class="product product-style-3 equal-elem">
                        <div class="product-thumnail">
                            <a href="{{route('products.details',$product->slug)}}"
                                title="{{$product->short_description}}">
                                <figure><img class="lazy" data-src=" {{ asset('storage').'/'.$product->image }}"
                                        alt="{{$product->short_description}}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{route('products.details',$product->slug)}}"
                                class="product-name"><span>{{$product->name}}</span></a>
                            <div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span>
                            </div>
                            <a href="#" class="btn add-to-cart"
                                onclick="document.getElementById('{{$product->id}}').remove();"
                                wire:click.prevent="$emitTo('cart-header-component','moveToCart',{{$product->id}},'{{$product->name}}',1,{{$product->regular_price}},'cart')">Add
                                To Cart</a>
                            <div class="product-wish">
                                <a href="#" onclick="document.getElementById('{{$product->id}}').remove();"
                                    wire:click.prevent="$emitTo('cart-header-component','toggleWishlist',{{$product->id}},'{{$product->name}}',1,{{$product->regular_price}})">
                                    <i class="fa fa-heart fill-heart" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </li>

                @endforeach

            </ul>

            @else
            <p>No Items in wishlist</p>
            @endif

        </div>
    </div>
</div>