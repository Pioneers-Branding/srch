<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   <!-- BEGIN: Head-->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>UB ELECTRONICS - Admim Login</title>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
      <!-- BEGIN: Vendor CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
      <!-- END: Vendor CSS-->
      <!-- BEGIN: Theme CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
      <!-- END: Theme CSS-->
      <!-- BEGIN: Page CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.min.css">
      <!-- END: Page CSS-->
      <!-- BEGIN: Custom CSS-->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <!-- END: Custom CSS-->
   </head>
   <!-- END: Head-->
   <!-- BEGIN: Body-->
   <?php
//   echo  md5('admin@12345');
//   die();
//   print_r(towquery("SELECT * FROM `tbl_post_extra` Where `post_extr_id`='1' AND `post_tbl`='home' " )); die();
   ?>
   <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
      <!-- BEGIN: Content-->
      <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <section class="row flexbox-container">
                  <div class="col-12 d-flex align-items-center justify-content-center">
                     <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                           <div class="card-header border-0">
                              <div class="card-title text-center">
                                 <img src="ub-logo.jfif" height="65px" width="100px" alt="branding logo">
                              </div>
                              <h4 class="card-subtitle line-on-side text-muted text-center  pt-2"><span>UB Electronics - Admin Login</span></h4>
                           </div>
                           <div class="card-content">
                              <!--<p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Ride Sharing | Courier Services | Business Listing</span></p>-->
                              <div class="card-body">
                                 <form class="form-horizontal"  id="logged_form">
                                    <fieldset class="form-group position-relative has-icon-left">
                                       <input type="email" class="form-control" name="email" id="user-name" value="" placeholder="Your Username"
                                          required>
                                       <div class="form-control-position">
                                          <i class="fa fa-user"></i>
                                       </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                       <input type="password" class="form-control" id="user-password" value="" name="pass"
                                          placeholder="Enter Password" required>
                                       <div class="form-control-position">
                                          <i class="fa fa-key"></i>
                                       </div>
                                    </fieldset>
                                                <input type="hidden" id="logged_ref"  name="logged_ref"  class="form-control" placeholder="Password" required="">

                                    <button type="submit" class="btn btn-outline-primary btn-block"><i
                                       class="fa fa-sign-in"></i> Login</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
      <!-- END: Content-->
      <!-- BEGIN: Vendor JS-->
      <script src="app-assets/vendors/js/vendors.min.js"></script>
      <!-- BEGIN Vendor JS-->
      <!-- BEGIN: Page Vendor JS-->
      <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
      <script src="app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
      <!-- END: Page Vendor JS-->
      <!-- BEGIN: Theme JS-->
      <script src="app-assets/js/core/app-menu.min.js"></script>
      <script src="app-assets/js/core/app.min.js"></script>
      <!-- END: Theme JS-->
      <!-- BEGIN: Page JS-->
      <script src="app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

      <script>
    $(document).ready(function (e){
    $("#logged_form").on('submit',(function(e){
    $.LoadingOverlay("show");
    e.preventDefault();
    $.ajax({
    url: "classes/control.php",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
        console.log(data);
    if($.trim(data)=='admin'){
    $.LoadingOverlay("hide");
    window.location.href = "index.php";
    }else{
        $.LoadingOverlay("hide");
         alert("Failed to login");
        //  toastr.error('Failed to add Page','error');
         window.location.reload();
    }
    }
        
    });
    }));
    });    
    
      </script>
      <!-- END: Page JS-->
   </body>
   <!-- END: Body-->
</html>