<?php

include 'config.php';

$asset_url =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]".'/';

 //Function to connect with the database



if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Perform a database query to get product name suggestions
    $sql = "SELECT product_title,product_pk_id FROM tbl_product WHERE product_title LIKE '%$query%'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<p> <a href="'.$asset_url.'product_details.php?product_id='.$row['product_pk_id'].'">' . $row['product_title'] . '</a></p>';
        }
    } else {
        echo '<p>No suggestions found</p>';
    }

    
}
?>