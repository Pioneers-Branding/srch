<?php include 'header.php';
$user_id=$_SESSION['user_id'];

$sql_users = $db->dbperform("select * from `tbl_user` WHERE user_pk_id=$user_id");
                        $users = mysqli_fetch_assoc($sql_users); 
                        
                        $full_name=$users['full_name'];
                        $user_email=$users['user_email'];
                        $user_password=$users['user_password'];
                        $contact=$users['contact'];
    // print_r($users); die();
    
        // extract($userfetch);
        
        
if(isset($_POST['submit'])){
    // print_r($_POST); die();
    $ufull_name=$_POST['full_name'];
    $uemail=$_POST['user_email'];
    $ucontact=$_POST['contact'];
    // print_r($user_id); die();
    
    $sql =$db->dbperform("UPDATE `tbl_user` SET `full_name`='$ufull_name', `user_email`='$uemail', `contact`='$ucontact'  WHERE user_pk_id='$user_id' ") ;
    

 

if ($sql) {
    print_r("<script>alert('data updated successfully'); window.location.replace('acdeital.php');</script>");
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " ;
}

}

?>
	<div class="container">
	    <form method="post">
	            <div class="form-group">
	                <label>Name</label>
	                <input type="text" class="form-control" name="full_name" value="<?=$full_name?>" placeholder="Name">
	            </div>
	            <div class="form-group">
	                <label>Email</label>
	                <input type="text" class="form-control" name="user_email" value="<?=$user_email?>" placeholder="Email">
	            </div>
	            <div class="form-group">
	                <label>Contact No.</label>
	                <input type="text" class="form-control" name="contact" value="<?=$contact?>" placeholder="Contact Number">
	            </div>
	            <!--<div class="form-group">-->
	            <!--    <label>Address</label>-->
	            <!--    <textarea class="form-control" name="address" value="<?=$address?>" placeholder="Address"></textarea>-->
	            <!--</div>-->
	           
	            <div class="form-group">
	                <button class="form-control btn btn-success" type="submit" name="submit">Save</button>
	            </div>
	    </form>
	</div>
	<?php include 'footer.php';?>
    </body>
</html>