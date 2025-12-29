<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
        $db=new dbconfig();
   }
   else{
       header("location:login");
   }
   
  if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['oldpassword'])){
            $pass = md5($_POST['oldpassword']);
            $newpass = md5($_POST['password']);
        $user_result = $db->dbperform("select * from `tbl_user` where user_role='admin' and user_password='$pass' and user_status='1' and user_block_status='0'");
            if ($user_result->num_rows > 0)
            {
                $usser_update = $db->dbperform("update tbl_user set `user_password`='$newpass' where user_role='admin' ");
                  echo "<script>alert('Password Change re-login')</script>";
                   header('location:logout.php');
            }else{
                echo "<script>alert('OLd Password Not Match')</script>";
            }
            
  } 
   
   
   
   ?>

  <!-- BEGIN: Header-->
 <?php include('includes/header.php');?>
 <?php include('includes/aside.php');?>
  <!-- BEGIN: Content-->
            <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-12 mb-2">
                  <h3 class="content-header-title mb-0">EDIT SETTING</h3>
                  <div class="row breadcrumbs-top">
                  </div>
               </div>
            </div>
            <div class="content-body">
               <!-- Basic form layout section start -->
               <section id="basic-form-layouts">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-content collpase show">
                              <div class="card-body">
                                 <form class="form form-horizontal form-bordered" method="post" id="settingForm" >
                                    <div class="form-body">
                                          
                                       <h4 class="form-section">Setting</h4>
                                       
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Old Password </label>
                                          <div class="col-md-9">
                                             <input type="password" id="oldpassword" value="" class="form-control" placeholder="Enter old password " name="oldpassword" required>
                                          </div>
                                       </div>
                                       
                                      <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">New Password </label>
                                          <div class="col-md-9">
                                             <input type="password" id="password" value="" class="form-control" placeholder="Enter new password " name="password" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Confirm Password </label>
                                          <div class="col-md-9">
                                             <input type="password" id="password-check" value="" class="form-control" placeholder="Enter confirm password " name="password-check" required>
                                          </div>
                                       </div>
                                       <div class="form-group ">
                                            <input type="hidden" name="pass_ref" class="form-control" id="pass_ref" >
                                       </div>
                                       <button type="submit" class="btn btn-primary" style="margin-top:25px;margin-bottom:25px;float:right;">
                                       <i class="fa fa-check-square-o"></i> Save
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- // Basic form layout section end -->
            </div>
         </div>
      </div>
  
   
    
    <!-- END: Content-->
 <script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>

     <script>
$("#password-check").blur(function(){
$(".error").hide();

var hasError = false;
var passwordVal = $("#password").val();
var passwordOld = $("#oldpassword").val();
var checkVal = $("#password-check").val();
	if (passwordOld == '') {
	$("#oldpassword").after('<span class="error">Please enter a old password.</span>');
	hasError = true;
	$("#oldpassword").focus();
	} else if (passwordVal == '') {
	$("#password").after('<span class="error">Please enter a password.</span>');
	hasError = true;
	$("#password").focus();
	} else if (checkVal == '') {
	$("#password-check").after('<span class="error">Please re-enter your password.</span>');
	hasError = true;
	$("#password-check").focus();
	} else if (passwordVal != checkVal ) {
	$("#password-check").after('<span class="error">Passwords do not match.</span>');
	hasError = true;
	$("#password-check").val('');
// 	$("#password-check").focus();
	}
	if(hasError == true) {return false;}


});  

</script>
 <?php include('includes/footer.php');?>