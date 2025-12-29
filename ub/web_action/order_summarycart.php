<?php
session_start(); // Start the session if it hasn't been started already
include 'config.php';
// Check if the "add to cart" form has been submitted
if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    // print_r($product_name); die();
    $product_price = $_POST['product_price'];
    $quantity = $_POST['product_qty']; 

    // Check if the shopping cart exists in the session
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product is already in the cart, and if so, update the quantity
    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['product_qty'] += $quantity;
        
        $response['status'] ='SUCCESS';
        $response['msg'] ='Cart Updated Succesfully .';
        
    } else {
        // If the product is not in the cart, add it as a new item
        $_SESSION['cart'][$product_id] = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_qty' => $quantity,
            'product_image' => $product_image
        );
        
        
       $response['status'] ='SUCCESS';
       $response['msg'] ='Cart Added Succesfully .'; 
        
    }
    
    echo json_encode($response);
    
}

if(isset($_POST['update_cart'])){
    $product_id = $_POST['product_id'];
    $product_qty = $_POST['product_qty'];
    
    $_SESSION['cart'][$product_id]['product_qty'] = $product_qty;
        
        $response['status'] ='SUCCESS';
        $response['msg'] ='Cart Updated Succesfully .';
}


if(isset($_POST['getCartCount'])) {
    
    echo count($_SESSION['cart']);
    
}


// Display the shopping cart
if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 && $_POST['view_cart_sec']) {
    $cartCount=count($_SESSION['cart']);
    echo '<div class="row mb-md-5 md-3">';
    echo '<div class="col-lg-9 mb-3">';
    echo '<div class="border-bottom border-color-1 mb-0">';
    echo '<h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">Order Summary <span class="text-blue">('.$cartCount.' items) </span>  </h3>';
    echo '</div>';
    echo '<div class="cart-table border-bottom">';
    echo '<table class="table" cellspacing="0">';
    echo '<thead><tr><th>Product Details</th><th>Quantity</th><th colspan="2">Sub Total</th></tr></thead>';

    $total = 0;
    $user_id=$_SESSION['user_id'];
    $users_sql="SELECT user_coins FROM tbl_user WHERE user_pk_id =$user_id";
    $user_result=mysqli_query($con,$users_sql);
    $user_coins=mysqli_fetch_assoc($user_result);
    foreach($_SESSION['cart'] as $item) {
        $subtotal = $item['product_price'] * $item['product_qty'];
        $total += $subtotal;
        

        echo '<tbody><tr>';
        echo '<td>
        <div class="product-item__inner remove-prodcut-hover">
        <div class="row">
        <div class="product-item__header col-4 col-md-4">
        <div class="mb-2"><a href="" class="d-block text-center"><img class="height-122 product-cart-img lazy" src="'.$asset_url.'admin/assets/'.$item['product_image'].'" width="100" height="100" ></a></div></div>
        <div class="col-8 col-md-8 align-self-center">
        <div class="pr-lg-3">
        <h6 class="font-size-12 font-size-14-lg">
        <a href="" class="text-blue font-weight-bold">' . $item['product_name'] . '</a>
        </h6>
        <p class="cart-joy-label mb-1">Our Price</p>
        <div class="d-lg-flex cart-product-price"><div class="text-blue-2 font-size-18 font-weight-bold">₹' . $item['product_price'] . '</div>
        
        </div></div></div></div> </div>
        </td>';
        echo '<td class="vertical-top group-3">
        <div class="width-122 border-color-1">
        <div class="js-quantity row align-items-center">
        <div class="col-auto pr-1">
        <div class="row">
       
            <div class="col-3 border align-self-center p-1">
            <input class="js-result form-control product_qty_val_'.$item['product_id'].' h-auto border-0 rounded p-0 shadow-none  text-center" type="text" value="'.$item['product_qty'].'" min="1" disabled=""></div>
           </div></div></div></div></td>';
        echo '<td class="vertical-top group-3 second-g">
            <div class="prodcut-price">
            <div class="text-dark font-weight-bold">₹' . $subtotal . '</div>
            </div></td>';
    
        echo '</tr></tbody>';
    }
    
    if(!empty($_POST['coupon_value']))
    {
     $discounted_amt=$total-sprintf("%.2f", $user_coins['user_coins']);
     $discount = sprintf("%.2f", $user_coins['user_coins']);
    }else
    {
        $discounted_amt=$total;
        $discount =0;
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo'<div class="col-lg-3">
    <div class="border-bottom border-color-1 mb-3">
        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">Order Summary</h3>
            </div>
            <div class="min-height-155">
                <div class="row">
                    <div class="col-8 col-md-8">
                        <p class="mb-2">Sub Total('.$cartCount.' items)</p>
                    </div>
                    <div class="col-4 col-md-4">
                        <p class="font-weight-bold mb-2 text-right">₹' . $total . '</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 col-md-8">
                        <p class="mb-2">Discount</p>
                    </div>
                    <div class="col-4 col-md-4">
                        <p class="font-weight-bold mb-2 text-right">₹'.$discount.'</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 col-md-8">
                        <p class="mb-2">Delivery Charge</p>
                    </div>
                    <div class="col-4 col-md-4">
                        <p class="font-weight-bold mb-2 text-right">Free</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 col-md-8">
                        <p class="mb-2 gifting"></p>
                    </div>
                    <div class="col-4 col-md-4">
                        <p class="font-weight-bold mb-2 text-right gifting_charges"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 col-md-8">
                        <p class="mb-2 gifting"></p>
                    </div>
                    <div class="col-4 col-md-4">
                        <p class="font-weight-bold mb-2 text-right gifting_charges"></p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-4 col-md-4">
                    <p class="mb-2 font-weight-bold">TOTAL:</p>
                </div>
                <div class="col-8 col-md-8 text-right">
                    <div class="prodcut-price text-right">

                        <div class="text-dark font-weight-bold">₹'. $discounted_amt .'</div>

                    </div>
                    <small class="text-gray-5">Price Are Inclusive of Taxes</small>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <a href="#" type="button" data-amount="'.$discounted_amt.'" data-discount="'.$discount.'"class="btn btn-primary-dark-w order_btn btn-block">Pay Online
     </a>
            </div>
            
        </div>';
    echo '</div>';
    
}

if($_POST['delete_cart']){

$productId = $_POST['product_id'];

// Remove the product from the cart (assuming a simple array-based cart)
if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $select => $val) {
        if($val["product_id"] == $productId)
        {
            unset($_SESSION["cart"][$select]);
             echo "Item removed from the cart.";
        }
    }
}


}


// if($_POST['check_out']){
//     $total=0;
// foreach($_SESSION['cart'] as $item) {
//         $subtotal = $item['product_price'] * $item['product_qty'];
//         $total += $subtotal;

// }

// print_r($total); die();





// }

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




