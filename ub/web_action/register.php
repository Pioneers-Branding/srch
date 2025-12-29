<?php


require_once"config.php";
//  $db= new dbconfig();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    //Get user input from the AJAX request 
    $full_name = $_POST["full_name"];
    $user_email = $_POST["user_email"];
    $user_password = md5($_POST["user_password"]);
    $contact= $_POST["contact"];
    // print_r($full_name); die();
   
    $sql ="select * from `tbl_user` WHERE user_email='$user_email' ";
    $data = mysqli_query($con,$sql);
    
    
    

    // Insert user data into the database
    if(mysqli_num_rows($data)!= 0){
        echo "2";
    }else{
    $sql1 = "INSERT INTO tbl_user (`full_name`, `user_email`, `user_password`, `contact`,`user_role`) VALUES ('$full_name','$user_email','$user_password','$contact','user')";
   $res = mysqli_query($con, $sql1);

    if ($res) {
        
        echo true;
    } else {
        echo "Error: ";
    }

   
    }
}
?>