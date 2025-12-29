

<div class="row margin-top-20">
    @if($products->isEmpty())
        <div class="col-12">
            <p class="text-center">No products found.</p>
        </div>
    @else
        @foreach($products as $product)
            @php
                $multistepUrl = url('/product_details/' . $product->id);
                $productImage = $product->product_image;
            @endphp 
            <div class="product col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="ttm-product-box ttm-bgcolor-white box-shadow2">
                    <div class="ttm-product-box-inner">
                        <div class="ttm-product-image-box">
                            <span class="onsale">Sale!</span>
                            <a href="{{ $multistepUrl }}">
                                <img class="img-fluid" src="{{ $productImage }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                    </div>
                    <div class="ttm-product-content">
                        <a class="ttm-product-title" href="{{ $multistepUrl }}">
                            <h2>{{ $product->name }}</h2>
                        </a>
                        <div class="star-ratings">
                            <ul class="rating sub-menu">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <span class="price">
                            <span class="product-Price-amount">
                                <span class="product-Price-currencySymbol"> M.R.P. - </span>
                                {{ $product->default_price }}
                            </span>
                        </span>
                        <div class="add-to-cart-btn" data-product_image="{{ $productImage }}" data-id="{{ $product->id }}" data-quantity="{{ $product->quantity }}">
                            <a href="#" class="add-to-cart-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>


