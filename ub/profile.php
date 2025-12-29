<?php include 'header.php';
require_once"admin/classes/dbconfig.php";
 $db= new dbconfig(); 
$user_id=$_SESSION['user_id'];
$sql_users = $db->dbperform("select * from `tbl_user` WHERE user_pk_id=$user_id");
$users = mysqli_fetch_assoc($sql_users);

?>
        <style>
body{background: #fff;}
           .profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #000;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #000;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #000;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
.profile-userpic {
    text-align: center;
}
.profile_logout_button button {
    background: #1249a0;
    color: #fff;
    border: unset;
    padding: 6px 11px;
    width: 27%;
}
.profile_logout_button {
    text-align: center;
    margin-top: 20px;
}
.profile-usermenu ul {
    justify-content: center;
    align-items: center;
    border-bottom: 2px solid #f0f4f7;
    padding-bottom: 16px;
}
.profile-usermenu ul li {
    border-bottom: 0px;
}
        </style>    
        <div class="container" style="margin-bottom: 80px; padding: 0;">
    <div class="row profile justify-content-center">
        <div class="col-md-6 col-md-offset-3" style="padding: 0;">
            <div class="profile-sidebar" style="padding: 0;">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
                                    <img src="https://cdn4.iconfinder.com/data/icons/e-commerce-181/512/477_profile__avatar__man_-512.png" class="img-responsive" style=" width: 34%; height: auto;" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle" style="margin-top: 15px;">
					<div class="profile-usertitle-name">
						<?=$users['full_name']?>
					</div>
					<div class="profile-usertitle-job" style="font-wieght: bold; color: #000;">
					<?=$users['contact']?>
					</div>
				</div>
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="acdeital.php" style=""><i class="fa fa-user" aria-hidden="true"></i>My Profile <i class="fa fa-angle-double-right pull-right"></i> </a>
						</li>
                        <li>
							<a href="<?=$asset_url?>my_order.php" style="">
							
							<i class="fa fa-inr" aria-hidden="true" style="font-size: 20px; position: relative; top: 2px;"></i> <font style="pos">Orders</font> <i class="fa fa-angle-double-right pull-right"></i> </a>
						</li>
                                               
                                                <li>
							<a href="shippingaddress.php" style="">
							
							<i class="fa fa-map-marker" aria-hidden="true"></i>Shipping Address <i class="fa fa-angle-double-right pull-right"></i> </a>
						</li>
                                                <li>
							<a href="#" style="">
							
							<i class="fa fa-life-ring" aria-hidden="true" style=""></i>Help & Support <i class="fa fa-angle-double-right pull-right"></i> </a>
						</li>
                                               
					</ul>
					<div class="profile_logout_button">
					    <button class="logout_btn">Logout</button>
					</div>
				</div>
				<!-- END MENU -->
			</div>
		</div>
         
        </div>
		</div>
		<?php include 'footer.php';?>
    </body>
</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    $('.logout_btn').click(function() {
        
       
        $.ajax({
            type: 'POST',
            url: '<?php echo $asset_url?>web_action/logout.php', // Replace with the correct path to your server-side script
            data: { logout_btn: true },
            success: function(response) {
                // Optionally, handle the response from the server if needed
                // For example, you can redirect the user to a login page
                window.location.href = '<?php echo $asset_url?>index.php';
            }
        });
    });
    
    </script>
