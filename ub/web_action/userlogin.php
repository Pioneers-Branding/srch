<?php
session_start();

require_once"config.php";
//  $db= new dbconfig();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["user_email"];
    $user_password = md5($_POST["user_password"]);

    // Sanitize the user input
    $user_email = mysqli_real_escape_string($con, $user_email);
    
    // Query to retrieve the user's stored password hash
    $sql = "SELECT * FROM tbl_user WHERE user_email = '$user_email'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row["user_password"];
            
            // Verify the provided password against the stored hash
            if ($stored_password==$user_password) {
                // Password is correct, set session variables
                $_SESSION["user_email"] = $user_email;
                $_SESSION["user_id"] = $row["user_pk_id"];
                $user_id=$_SESSION["user_id"];
                // print_r($user_id); die();
                
                echo true;
                // echo "Login successful! Welcome, $user_id!";
                // You can redirect the user to another page here
            } else {
                echo false;
            }
        } else {
            echo 2;
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close the database connection when done
mysqli_close($con);


// if ($_SERVER["REQUEST_METHOD"]== "POST") {
//     //Get user input from the AJAX request 
//     $user_email = $_POST["user_email"];
//     $user_password = md5($_POST["user_password"]);
    
//     $sql ="select * from `tbl_user` WHERE user_email='$user_email' ";
//     $data = mysqli_query($con,$sql);
    
    
    

//     // Insert user data into the database
//     if(mysqli_num_rows($data)!= 0){
//         echo "user_already_exist";
//     }else{
//     $sql1 = "INSERT INTO tbl_user (`full_name`, `user_email`, `user_password`, `contact`,`user_role`) VALUES ('$full_name','$user_email','$user_password','$contact','user')";
//   $res = mysqli_query($con, $sql1);

//     if ($res) {
        
//         echo true;
//     } else {
//         echo "Error: ";
//     }

   
//     }
// }
?>