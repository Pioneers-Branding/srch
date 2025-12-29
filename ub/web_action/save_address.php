<?php

$servername = "localhost"; // Replace with your MySQL server hostname or IP address
$username = "designe2_ub_electronics"; // Replace with your MySQL username
$password = "=-Im{vW_DyKa"; // Replace with your MySQL password
$database = "designe2_ub_electronics"; // Replace with your MySQL database name

// Create a connection
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//add user address
if ($_POST["add_adress"]) {
    // Retrieve the data sent via AJAX
    $full_name = $_POST["full_name"];
    
    $contact = $_POST["contact"];
    // $user_email = $_POST["user_email"];
    $guest_state = $_POST["guest_state"];
    $guest_Address1 = $_POST["guest_Address1"];
    $gst_number = $_POST["gst_number"];
    $guest_Landmark = $_POST["guest_Landmark"];
    $guest_Pincode = $_POST["guest_Pincode"];
    $guest_city = $_POST["guest_city"];
    $guest_home = $_POST["guest_home"];
    $guest_ip = $_POST["guest_ip"];
    $user_id = $_POST["user_id"];

    // Perform the database insert
    $sql ="INSERT INTO `tbl_addresses` (`contactPerson`, `contactNumber`, `state`, `addressId`,  `landmark`, `pincode`,`gst_no`,`guest_ip`, `city`, `addressType`,`userId`) 
            VALUES ('$full_name', '$contact', '$guest_state', '$guest_Address1', '$guest_Landmark', '$guest_Pincode','$gst_number','$guest_ip', '$guest_city', '$guest_home','$user_id')";
            //  print_r($sql); die();
            // $result = $con->query($sql);
            $result=mysqli_query($con,$sql);
           
// print_r($result); die();
    if ($result) {
        // Insertion was successful
        $response = "Data inserted successfully";
        echo $response;
    } else {
        // Insertion failed
        
        $response = "Error: " . $con->error;
        echo $response;
    }
}

//update user address

if ($_POST["address_id"]) {
    // Retrieve the data sent via AJAX
    $id=$_POST["address_id"];
    $full_name = $_POST["full_name"];
    
    $contact = $_POST["contact"];
    // $user_email = $_POST["user_email"];
    $guest_state = $_POST["guest_state"];
    $guest_Address1 = $_POST["guest_Address1"];
    $gst_number = $_POST["gst_number"];
    $guest_Landmark = $_POST["guest_Landmark"];
    $guest_Pincode = $_POST["guest_Pincode"];
    $guest_city = $_POST["guest_city"];
    $guest_home = $_POST["guest_home"];
    
    // Perform the database update
    $sql ="UPDATE `tbl_addresses` 
        SET 
            `contactPerson` = '$full_name',
            `contactNumber` = '$contact',
            `state` = '$guest_state',
            `addressId` = '$guest_Address1',
            `landmark` = '$guest_Landmark',
            `pincode` = '$guest_Pincode',
            `city` = '$guest_city',
            `gst_no`='$gst_number',
            `addressType` = '$guest_home'
        WHERE 
            `id` = $id";
            //  print_r($sql); die();
            // $result = $con->query($sql);
            $result=mysqli_query($con,$sql);
           

    if ($result) {
        // Insertion was successful
        $response = "Data Updated successfully";
        echo $response;
    } else {
        // Insertion failed
        
        $response = "Error: " . $con->error;
        echo $response;
    }
}

if($_GET['edit_user_add']){
   $id=$_GET['id'];
   $sql_address = "select * from `tbl_addresses` WHERE id=$id";
                        $AddressResult = mysqli_query($con,$sql_address);
                        $users = mysqli_fetch_assoc($AddressResult);
                        
   echo json_encode($users);
}
?>