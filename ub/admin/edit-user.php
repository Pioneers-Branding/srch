<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
   }
   else{
       header("location:login");
   }
      
    $db=new dbconfig();
    $id=intval($_GET['user']);
    $result = $db->dbperform("select * from tbl_user where user_pk_id='$id'");
    $row=$result->fetch_assoc();
    // $result1 = $db->dbperform("select * from tbl_user_details where user_fk_id='$id'");
    // $row1=$result1->fetch_assoc();
                              
  
if (isset($_POST['updateRef']))
{
            $id=intval($_GET['user']);
            
            $moreWhere = '';
            
            if( !empty($_POST['user_password'] ) ){
              $user_password  = md5($_POST['user_password']);
              $moreWhere .= ",`user_password`='$user_password'";
            }            
            
            $ref = $_REQUEST['ref'];

            $full_name = $_POST['full_name'] ;

            $user_email = $_POST['user_email'];

            $user_password = md5($_POST['user_password']);

            $contact = $_POST['contact'];

            $auth_token = md5($email);

            $user_reg_loc = $_POST['user_reg_loc'];

            $user_address = $_POST['user_address'];
           
            $db->dbperform("UPDATE `tbl_user` SET `full_name`='$full_name',`contact`='$contact',`user_email`='$user_email',`user_reg_loc`='$user_reg_loc',`address`='$user_address' $moreWhere where user_pk_id='$id'");
            $db->dbperform("UPDATE `tbl_user_details` SET `user_full_name`='$full_name',`user_contact`='$contact',`user_address`='$user_address' where user_fk_id='$id'");

        // header("location:edit-user?user=$id&ref=$ref");            
        
    ?>
   <script>
       alert('User Update Successfully');
       window.location.href='edit-user?user=<?= $id ?>&ref=<?= $ref ?>';
   </script>
   <?php 
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
                  <h3 class="content-header-title mb-0">Edit User</h3>
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
                                 
                                 <form class="form form-horizontal form-bordered" method="post" id="UserForm">
                                    <div class="form-body">
                                       <h4 class="form-section">User  Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Full Name</label>
                                          <div class="col-md-9">
                                             <input type="text" id="projectinput2" class="form-control" placeholder="Enter User" value="<?=$row['full_name'];?>" name="full_name" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Contact</label>
                                          <div class="col-md-9">
                                             <input type="text" id="projectinput2" class="form-control" value="<?=$row['contact'];?>" placeholder="Enter Contact" name="contact" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Email</label>
                                          <div class="col-md-9">
                                             <input type="text" id="projectinput2" value="<?=$row['user_email'];?>"   class="form-control" placeholder="Enter Email" name="user_email" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2"> Password ( To Use Old Password Leave It Blank ) </label>
                                          <div class="col-md-9">
                                             <input type="text" id="projectinput2" class="form-control" placeholder="Enter Password" name="user_password" >
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Location</label>
                                          <div class="col-md-9">
                                             <select id="projectinput2" class="form-control" placeholder="Enter Location" name="user_reg_loc" required>
                                                <option  value="" selected disabled>--select--</option>
                                                <option <?= $row['user_reg_loc']=='Andhra Pradesh' ? 'selected' : '' ; ?> value="Andhra Pradesh" >Andhra Pradesh</option>
                                                <option <?= $row['user_reg_loc']=='Andaman and Nicobar Islands' ? 'selected' : '' ; ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                <option <?= $row['user_reg_loc']=='Arunachal Pradesh' ? 'selected' : '' ; ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option <?= $row['user_reg_loc']=='Assam' ? 'selected' : '' ; ?> value="Assam">Assam</option>
                                                <option <?= $row['user_reg_loc']=='Bihar' ? 'selected' : '' ; ?> value="Bihar">Bihar</option>
                                                <option <?= $row['user_reg_loc']=='Chandigarh' ? 'selected' : '' ; ?> value="Chandigarh">Chandigarh</option>
                                                <option <?= $row['user_reg_loc']=='Chhattisgarh' ? 'selected' : '' ; ?> value="Chhattisgarh">Chhattisgarh</option>
                                                <option <?= $row['user_reg_loc']=='Dadar and Nagar Haveli' ? 'selected' : '' ; ?> value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                <option <?= $row['user_reg_loc']=='Daman and Diu' ? 'selected' : '' ; ?> value="Daman and Diu">Daman and Diu</option>
                                                <option <?= $row['user_reg_loc']=='Delhi' ? 'selected' : '' ; ?> value="Delhi">Delhi</option>
                                                <option <?= $row['user_reg_loc']=='Lakshadweep' ? 'selected' : '' ; ?> value="Lakshadweep">Lakshadweep</option>
                                                <option <?= $row['user_reg_loc']=='Puducherry' ? 'selected' : '' ; ?> value="Puducherry">Puducherry</option>
                                                <option <?= $row['user_reg_loc']=='Goa' ? 'selected' : '' ; ?> value="Goa">Goa</option>
                                                <option <?= $row['user_reg_loc']=='Gujarat' ? 'selected' : '' ; ?> value="Gujarat">Gujarat</option>
                                                <option <?= $row['user_reg_loc']=='Haryana' ? 'selected' : '' ; ?> value="Haryana">Haryana</option>
                                                <option <?= $row['user_reg_loc']=='Himachal Pradesh' ? 'selected' : '' ; ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option <?= $row['user_reg_loc']=='Jammu and Kashmir' ? 'selected' : '' ; ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option <?= $row['user_reg_loc']=='Jharkhand' ? 'selected' : '' ; ?> value="Jharkhand">Jharkhand</option>
                                                <option <?= $row['user_reg_loc']=='Karnataka' ? 'selected' : '' ; ?> value="Karnataka">Karnataka</option>
                                                <option <?= $row['user_reg_loc']=='Kerala' ? 'selected' : '' ; ?> value="Kerala">Kerala</option>
                                                <option <?= $row['user_reg_loc']=='Madhya Pradesh' ? 'selected' : '' ; ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option <?= $row['user_reg_loc']=='Maharashtra' ? 'selected' : '' ; ?> value="Maharashtra">Maharashtra</option>
                                                <option <?= $row['user_reg_loc']=='Manipur' ? 'selected' : '' ; ?> value="Manipur">Manipur</option>
                                                <option <?= $row['user_reg_loc']=='Meghalaya' ? 'selected' : '' ; ?> value="Meghalaya">Meghalaya</option>
                                                <option <?= $row['user_reg_loc']=='Mizoram' ? 'selected' : '' ; ?> value="Mizoram">Mizoram</option>
                                                <option <?= $row['user_reg_loc']=='Nagaland' ? 'selected' : '' ; ?> value="Nagaland">Nagaland</option>
                                                <option <?= $row['user_reg_loc']=='Odisha' ? 'selected' : '' ; ?> value="Odisha">Odisha</option>
                                                <option <?= $row['user_reg_loc']=='Punjab' ? 'selected' : '' ; ?> value="Punjab">Punjab</option>
                                                <option <?= $row['user_reg_loc']=='Rajasthan' ? 'selected' : '' ; ?> value="Rajasthan">Rajasthan</option>
                                                <option <?= $row['user_reg_loc']=='Sikkim' ? 'selected' : '' ; ?> value="Sikkim">Sikkim</option>
                                                <option <?= $row['user_reg_loc']=='Tamil Nadu' ? 'selected' : '' ; ?> value="Tamil Nadu">Tamil Nadu</option>
                                                <option <?= $row['user_reg_loc']=='Telangana' ? 'selected' : '' ; ?> value="Telangana">Telangana</option>
                                                <option <?= $row['user_reg_loc']=='Tripura' ? 'selected' : '' ; ?> value="Tripura">Tripura</option>
                                                <option <?= $row['user_reg_loc']=='Uttar Pradesh' ? 'selected' : '' ; ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option <?= $row['user_reg_loc']=='Uttarakhand' ? 'selected' : '' ; ?> value="Uttarakhand">Uttarakhand</option>
                                                <option <?= $row['user_reg_loc']=='West Bengal' ? 'selected' : '' ; ?> value="West Bengal">West Bengal</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control"  for="projectinput2">Address</label>
                                          <div class="col-md-9">
                                             <input type="text" id="projectinput2" value="<?=$row['address'];?>" class="form-control" placeholder="Enter Address" name="user_address" required>
                                          </div>
                                       </div>
                                       <div class="form-group ">
                                          <input type="hidden" name="updateRef" class="form-control" id="updateRef" >
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

 <?php include('includes/footer.php');?>