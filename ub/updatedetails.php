<?php 
include('config.php');
/* profile update code */
if(isset($_POST['Update_P'])){
    //echo "post sent";
   $name = $_POST['user_name'];
   $last_name= $_POST['user_lastname'];
   $contact = $_POST['contact'];
   $address = $_POST['address'];
   $landmark= $_POST['landmark'];
    $user_user_pk_id= $_SESSION['userId'];
         $update_profile = mysqli_query($db,"UPDATE tbl_user SET first_name='$name',last_name='$last_name',contact='$contact',`address`='$address', `landmark`='$landmark' WHERE  user_pk_id='$user_user_pk_id'");
         if($update_profile){
     ?>
     <script>window.location='orders';</script>
      <?php   }
       
   
}

?>