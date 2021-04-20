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

        .product-wish .fa:hover {
            color: red;
        }

        .product-wish .fill-heart {
            color: red;
        }
    </style>
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                @if ($category)
                <li class="item-link"><span>{{$category->name}}</span></li>
                @else
                <li class="item-link"><span>All Products</span></li>
                @endif
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src=" {{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">
                    @if ($category)
                    <h1 class="shop-title">{{$category->name}}</h1>
                    @else
                    <h1 class="shop-title">All Products</h1>
                    @endif

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model='sort_by'>
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by most recent</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model='page_size'>
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div>
                <!--end wrap shop control-->
                <div class="row">
                    <ul class="product-list grid-products equal-container">
                        @foreach ($products as $product)
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
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
                                    <div class="wrap-price"><span
                                            class="product-price">{{$product->regular_price}}</span></div>
                                    <a href="#" class="btn add-to-cart"
                                        wire:click.prevent="$emitTo('cart-header-component','store',{{$product->id}},'{{$product->name}}',1,{{$product->regular_price}},'cart')">Add
                                        To Cart</a>
                                    <div class="product-wish">
                                        @if (Cart::instance('wishlist')->content()->pluck('id')->contains($product->id))
                                        <a href="#"
                                            onclick="document.getElementById('heart-{{$product->id}}').classList.toggle('fill-heart');"
                                            wire:click.prevent="$emitTo('cart-header-component','toggleWishlist',{{$product->id}},'{{$product->name}}',1,{{$product->regular_price}})">
                                            <i class="fa fa-heart fill-heart" id="heart-{{$product->id}}"
                                                aria-hidden="true"></i></a>
                                        @else
                                        <a href="#"
                                            onclick="document.getElementById('heart-{{$product->id}}').classList.toggle('fill-heart');"
                                            wire:click.prevent="$emitTo('cart-header-component','toggleWishlist',{{$product->id}},'{{$product->name}}',1,{{$product->regular_price}})">
                                            <i class="fa fa-heart" id="heart-{{$product->id}}"
                                                aria-hidden="true"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endforeach

                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{$products->links('custom-views.custom-pagination')}}
                </div>
            </div>
            <!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                            <li class="category-item">
                                <a href="{{route('shop.category',$category->slug)}}"
                                    class="cate-link">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Brand</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs &
                                    Prosecsors</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone &
                                    Tablets</a></li>
                            <li class="list-item"><a
                                    data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>'
                                    class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div><!-- brand widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price</h2>
                    <div class="widget-content" wire:ignore>
                        <div id="slider-range2"></div>
                        <p>
                            <label for="range">Price: $</label>
                            <input type="text" id="range_1" readonly style="padding: 0; margin: 0" size="2">
                            To
                            <input type="text" id="range_2" readonly size="2">
                            <button class="filter-submit"
                                wire:click="$emit('price_filter')"><strong>Filter</strong></button>
                        </p>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Color</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list has-count-index">
                            <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a>
                            </li>
                            <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                        </ul>
                    </div>
                </div><!-- Color -->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Size</h2>
                    <div class="widget-content">
                        <ul class="list-style inline-round ">
                            <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                            <li class="list-item"><a class="filter-link " href="#">M</a></li>
                            <li class="list-item"><a class="filter-link " href="#">l</a></li>
                            <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                        </ul>
                        <div class="widget-banner">
                            <figure><img class="lazy" data-src=" {{ asset('assets/images/size-banner-widget.jpg') }}"
                                    width="270" height="331" alt=""></figure>
                        </div>
                    </div>
                </div><!-- Size -->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img class="lazy"
                                                    data-src=" {{ asset('assets/images/products/digital_01.jpg') }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img class="lazy"
                                                    data-src=" {{ asset('assets/images/products/digital_17.jpg') }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img class="lazy"
                                                    data-src=" {{ asset('assets/images/products/digital_18.jpg') }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img class="lazy"
                                                    data-src=" {{ asset('assets/images/products/digital_20.jpg') }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div>
            <!--end sitebar-->

        </div>
        <!--end row-->

    </div>
    <!--end container-->
    @push('scripts')

    <script>
        var fun = function () {
            if ($("#slider-range2").length > 0) {
                $("#slider-range2").slider({
                    range: true,
                    min: 0,
                    max: 1000,
                    values: [1, 1000],
                    slide: function (event, ui) {
                        $("#range_1").val(
                            ui.values[0]
                            );
                        $("#range_2").val(
                            ui.values[1]
                            );
                    },
                });
                $("#range_1").val(
                        $("#slider-range2").slider("values", 0) 
                );
                $("#range_2").val(
                        $("#slider-range2").slider("values", 1) 
                );
            }
        }
        fun();
        Livewire.on('price_filter',() => {
            @this.set('range_1' ,$("#range_1").val());
            @this.set('range_2' ,$("#range_2").val());
        });

    </script>
    @endpush
</div>