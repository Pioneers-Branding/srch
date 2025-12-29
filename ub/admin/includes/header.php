 <?php 
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
         
    
    $db= new dbconfig();
    $totalNoti=0;
    $cancelOrder = $db->dbperform("select * from tbl_cancelOreder Where order_flag='0' ORDER by id DESC ");
    $cancelOrderCount = $cancelOrder->num_rows;
    $subMail = $db->dbperform("select * from tbl_subscribeUser Where user_flag='0' ORDER by ID DESC ");
    $subMailCount = $subMail->num_rows;
    $order = $db->dbperform("SELECT DISTINCT(`order_id`) FROM `tbl_order` WHERE `read_flag`=0  ");
    $orderCount = $order->num_rows;
    
    $totalNoti = $cancelOrderCount + $subMailCount + $orderCount;
    }
   else{
       header("location:login");
   }
      ?>
    <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c"></meta>

    <title>UB ELECTRONICS - Admin</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/timeline.min.css">
    <!-- END: Page CSS-->
   <link rel="stylesheet" type="text/css" href="app-assets/datatable.css">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->


  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>	-->
<!---->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>-->
<script src="https://akwabaformula.com/electro-store/admin/includes/jquery.cookie.js"></script>
 
     <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" ></script>   

 <style>
 
 .navbar-header{background: #2D2554 !important;}
 
 .navigation{background: #049FE2 !important;}
 
 .navigation li a{color: #fff !important;}
 .main-menu.menu-dark{background: #049FE2 !important;}
 
    .goog-te-banner-frame.skiptranslate {
            display: none !important;
        } 
        body {
            top: 0px !important; 
        }
        .goog-logo-link {
            display:none !important;
        }
        .trans-section {
            margin: 100px;
        }
		.goog-te-gadget-icon{
			display:none;
		}
.ct-topbar {
  text-align: right;
  background: #eee;
}
.ct-topbar__list {
  margin-bottom: 0px;
}
.ct-language__dropdown{
	padding-top: 8px;
	max-height: 0;
	overflow: hidden;
	position: absolute;
	top: 110%;
	left: -3px;
	-webkit-transition: all 0.25s ease-in-out;
	transition: all 0.25s ease-in-out;
	width: 100px;
	text-align: center;
	padding-top: 0;
  z-index:200;
}
.ct-language__dropdown li{
	background: #222;
	padding: 5px;
}
.ct-language__dropdown li a{
	display: block;
}
.ct-language__dropdown li:first-child{
	padding-top: 10px;
	border-radius: 3px 3px 0 0;
}
.ct-language__dropdown li:last-child{
	padding-bottom: 10px;
	border-radius: 0 0 3px 3px;
}
.ct-language__dropdown li:hover{
	background: #444;
}
.ct-language__dropdown:before{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	margin: auto;
	width: 8px;
	height: 0;
	border: 0 solid transparent;
	border-right-width: 8px;
	border-left-width: 8px;
	border-bottom: 8px solid #222;
}
.ct-language{
	position: relative;
  background: #00aced;
  color: #fff;
  padding: 10px 0;
}
.ct-language:hover .ct-language__dropdown{
	max-height: 200px;
	padding-top: 8px;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
}

.navbar-brand>img {
  padding-top: 11px;
  width: 130px;
  margin-left: 15px;
}
.navbar-brand {
    height: auto;
    margin: 0;
    padding: 0;
    margin-right: 20px;
}
.navbar {
  background-color: #000000;
}
.navbar-default .navbar-nav > .active > a {
  padding: 8px 19px 9px !important;
}
.navbar-nav > li.active {
  padding: 8px 0px 9px 0;
}
.navbar-right {
  padding-top: 0;
}
.navbar-default .navbar-nav > li > a::after {
  background-color: transparent;
  border-bottom: 3px solid #d2282e;
}
.navbar-default .navbar-nav>li {
  display: inline-block;
  text-align: center;
  float: none;
}
.navbar-default .navbar-nav>li>a {
    color: #fff;
}
.navbar-default .navbar-nav>li>a:hover {
    color: #fff;
    background-color: #0392CC;
}
</style>
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  

   
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
   <div class="navbar-wrapper" style="background-color:#fff">
      <div class="navbar-header">
         <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto">
               <a class="navbar-brand" href="index">
                  <!--<img class="brand-logo" alt="stack admin logo" src="ecom.png" height="100px" width="100px">-->
                  <h6 class="" style=color:white;"">Welcome, ADMIN</h6>
               </a>
            </li>
            <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon fa fa-bars font-medium-3 white" data-ticon="feather.icon-toggle-right"></i></a></li>
            <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
         </ul>
      </div>
      <div class="navbar-container content">
         <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav float-right" style="float:right;">
               <li class="dropdown dropdown-user nav-item">
                  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                     <div class="avatar avatar-online"><img src="app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></div>
                     <span class="user-name">ADMIN</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                     <!--<a class="dropdown-item" href="change-password"><i class="fa fa-key"></i> Change Password</a>-->
                     <!--<div class="dropdown-divider"></div>-->
                     <a class="dropdown-item" href="logout"><i class="fa fa-sign-out"></i> Logout</a>
                  </div>
               </li>
              <!-- <li class="dropdown dropdown-user nav-item">
                  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                     <div class="avatar avatar-online"></div>
                     <span class="user-name"><i class="far fa-bell"></i>(<?= $totalNoti ?>)</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="view-subemail.php"><i class="fa fa-user"></i> Subscribe User(<?= $subMailCount ?>)</a>
                     <a class="dropdown-item" href="view-invoice.php"><i class="fa fa-money"></i> New Order(<?= $orderCount ?>)</a>
                     <a class="dropdown-item" href="view-cancelOrder.php"><i class="fa fa-sign-out"></i> Cancel Order(<?= $cancelOrderCount ?>)</a>
                  </div>
               </li>-->
            </ul>
         </div>
      </div>
   </div>
</nav>
      
      
      
      