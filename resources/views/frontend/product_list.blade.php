@extends('frontend.layouts.app')
@section('title', 'Chess Products & Gear – Chess Sets, Boards & Accessories')
@section('keywords', 'chess products, chess sets & accessories, chess training tools')
@section('description', 'Shop premium chess products including chess sets, boards, clocks & accessories. Perfect for beginners to advanced players.')

@section('content')
<style>
    .prod-img > a.thm-bg:hover{
        color:#fff !important;
    }
    .tox{ 
            padding: 10px 15px !important;
    margin-top: 10px !important;
    }
    

    
    
@media (max-width:576px) and (min-width:200px){
    .prod-img img{
        height:auto !important;
    }
}
    

</style>
<!-- Featured Products Section -->
<section>
    <div class="w-100 pt-40 pb-110 position-relative">
        <div class="container">
            <div id="productList" class="prod-wrap position-relative w-100">
                <div class="row justify-content-center mrg30 products">
                    <!-- Dynamic Products Will Be Injected Here by JS -->
                </div>
            </div><!-- Products Wrap -->
        </div>
    </div>
</section>




<!-- site-main start -->
           

                
          

<script>
    fetchFilteredProducts();
    // Bind event handler to checkbox changes
    $('input[name="category_id[]"]').change(function() {
        // alert('23');
        fetchFilteredProducts();
    });
</script>
<script>
    function convertAmount(price) {
        return parseFloat(price).toFixed(2);
    }

    function getProductList(product_id, quantity, user_id) {
        $.ajax({
            url: api_url + '/shop-product-list',
            method: 'GET',
            data: { featured: 1 },
            dataType: 'json',
            success: function(res) {
                console.log("API Response:", res);

                if (res.status && res.data.length > 0) {
                    let html = '';

                    $.each(res.data, function(index, value) {
                        const multistep_url = web_url + '/product_details/' + value.id;
                        const productImage = value.product_image;

                        html += `
                        <div class="col-md-4 col-sm-6 col-lg-3 mb-4">
                            <div class="prod-box position-relative w-100">
                                <div class="prod-img brd-rd5 position-relative overflow-hidden w-100">
                                    <img class="img-fluid w-100" src="${productImage}" alt="${value.name}">
                                    
                                   
                                </div>
                                <div class="prod-info position-relative w-100 p-2">
                                    
                                    <span class="thm-clr d-block">${value.category || 'Chess'}</span>
                                    <h3 class="mb-0 mt-2">
                                        <a href="${multistep_url}" title="${value.name}">${value.name}</a>
                                    </h3>
                                    <span class="price z1 scndry-bg rounded-pill position-absolute text-center px-1 py-1">
                                        <small>₹</small>${convertAmount(value.default_price)}
                                    </span>
                                     <div class="add-to-cart-btn mt-4" data-product_image="${productImage}" data-id="${value.id}" data-quantity="${value.quantity}">
                                            <a href="#" class="tox add-to-cart-link  thm-btn scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden">add to cart
                                            </a>
                                        </div>
                                </div>
                            </div>
                        </div>`;
                    });

                    $('#productList .products').html(html);

                } else {
                    $('#productList .products').html('<p>No featured products available.</p>');
                }
            },
            error: function(error) {
                console.error('Error fetching data:', error);
                $('#productList .products').html('<p>Error loading featured products. Please try again later.</p>');
            }
        });
    }

    // Call it once DOM is ready
    $(document).ready(function() {
        getProductList(); // Call with default params if needed
    });
</script>

@endsection



<!--scri-->
