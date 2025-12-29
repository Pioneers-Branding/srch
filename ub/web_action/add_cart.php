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
    echo '<h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">Shopping Cart <span class="text-blue">('.$cartCount.' items) </span>  </h3>';
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
        <div class="col-auto">
            <a data-id="'.$item['product_id'].'" data-action="sub" class="js-minus btn btn-icon btn-xs btn-outline-secondary border-1 text-center updatecart" href="javascript:;"><small class="fas fa-minus btn-icon__inner"></small></a></div>
            <div class="col-3 border align-self-center p-1">
            <input class="js-result form-control product_qty_val_'.$item['product_id'].' h-auto border-0 rounded p-0 shadow-none  text-center" type="text" value="'.$item['product_qty'].'" min="1" disabled=""></div>
            <div class="col-auto"><a data-id="'.$item['product_id'].'" data-action="add" class="js-plus btn btn-icon btn-xs btn-outline-secondary border-1 text-center updatecart" href="javascript:;">
            <small class="fas fa-plus btn-icon__inner"></small></a>
        </div></div></div></div></div></td>';
        echo '<td class="vertical-top group-3 second-g">
            <div class="prodcut-price">
            <div class="text-dark font-weight-bold">₹' . $subtotal . '</div>
            </div></td>';
        echo '<td class="group-3 third-g">
            <a  class="text-gray-90 delete_cart_btn" data-id="'.$item['product_id'].'" style="cursor:pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 463 463" height="17" class="m-0 vertical-top" xmlns:v="https://vecta.io/nano">
            <path d="M412.145 86.709h-6.951V72.532c0-12.104-9.848-21.952-21.952-21.952h-81.053l-9.902-34.66C289.608 6.547 280.928 0 271.18 0h-79.36a22.05 22.05 0 0 0-21.107 15.921l-9.902 34.66H79.758c-12.104 0-21.952 9.848-21.952 21.952V86.71h-6.951a7.5 7.5 0 1 0 0 15h14.753L91.832 429.5c1.503 18.785 17.442 33.5 36.287 33.5h206.762c18.845 0 34.784-14.715 36.287-33.5l26.223-327.79h14.753a7.501 7.501 0 0 0 .001-15.001zM185.136 20.042c.848-2.969 3.597-5.042 6.684-5.042h79.36c3.087 0 5.836 2.073 6.684 5.042l8.725 30.539H176.411l8.725-30.539zM79.758 65.581h216.746c.008 0 .016.002.024.002s.019-.002.028-.002h86.686c3.833 0 6.952 3.119 6.952 6.952V86.71H72.806V72.532a6.96 6.96 0 0 1 6.952-6.951zm276.458 362.722C355.332 439.348 345.961 448 334.881 448H128.119c-11.08 0-20.451-8.651-21.335-19.696L80.656 101.709h301.687l-26.127 326.594zM231.5 426.871a7.5 7.5 0 0 0 7.5-7.5V137.564a7.5 7.5 0 1 0-15 0V419.37a7.5 7.5 0 0 0 7.5 7.501zm-72.522-7.116c.206 4.006 3.518 7.116 7.484 7.116a7.34 7.34 0 0 0 .391-.01 7.5 7.5 0 0 0 7.106-7.875L159.506 137.18c-.212-4.137-3.727-7.319-7.875-7.106a7.5 7.5 0 0 0-7.106 7.875l14.453 281.806zm137.169 7.106l.391.01c3.966 0 7.278-3.11 7.484-7.116l14.452-281.806c.212-4.137-2.969-7.662-7.106-7.875-4.146-.212-7.662 2.97-7.875 7.106l-14.452 281.806c-.211 4.137 2.97 7.662 7.106 7.875z"></path></svg></a></td>'; 
        echo '</tr></tbody>';
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
                    <div class="col-4 col-md-4" data-price="'.$total.'" id="order_total">
                        <p class="font-weight-bold mb-2 text-right" >₹'.$total.'</p>
                    </div>
                </div>
                <div class="row discounted_price" style="display:none">
                    <div class="col-8 col-md-8">
                        <p class="mb-2">Discount</p>
                    </div>
                    <div class="col-4 col-md-4">
                        <p class="font-weight-bold mb-2 text-right">₹'.sprintf("%.2f", $user_coins['user_coins']).'</p>
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
            <div class="pt-5 pt-lg-14 border-bottom mb-2">
                <div class="form-check pl-4 pl-md-0 ml-md-4 pb-2 mb-md-0 border-bottom border-md-bottom-0">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2">
                    <label class="form-check-label mb-1 text-blue" for="inlineCheckbox4">
                            <span class="text-dark cursor-pointer-on"><i class="fa fa-gift"></i> You Have Coupon Want to apply?</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-md-4">
                    <p class="mb-2 font-weight-bold">TOTAL:</p>
                </div>
                <div class="col-8 col-md-8 text-right">
                    <div class="prodcut-price text-right">

                        <div class="text-dark font-weight-bold final_amt">₹'.$total.'</div>

                    </div>
                    <small class="text-gray-5">Price Are Inclusive of Taxes</small>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <a href="#" type="button" class="btn btn-primary-dark-w check_out_btn btn-block">Proceed to
                    checkout</a>
            </div>
        </div>';
    echo '</div>';
    // echo json_encode($response);
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




