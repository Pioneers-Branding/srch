<?php
// Display the shopping cart
if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    echo '<h2>Shopping Cart</h2>';
    echo '<table>';
    echo '<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Sub Total</th><th>Action</th></tr>';

    $total = 0;

    foreach($_SESSION['cart'] as $item) {
        $subtotal = $item['product_price'] * $item['product_qty'];
        $total += $subtotal;

        echo '<tr>';
        echo '<td>' . $item['product_name'] . '</td>';
        echo '<td>' . $item['product_price'] . '</td>';
        echo '<td>' . $item['product_qty'] . '</td>';
        echo '<td>' . $subtotal . '</td>';
        echo '<td><i class="fa-solid fa-trash"></i></td>';
        echo '</tr>';
    }

    echo '<tr><td colspan="3">Total</td><td>' . $total . '</td></tr>';
    echo '</table>';
    echo json_encode($response);
} else {
    echo '<p>Your shopping cart is empty.</p>';
}

?>