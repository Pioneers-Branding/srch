<?php include 'header.php'; 
$sessId = isset($_SESSION['session_id'])?$_SESSION['session_id']:'';
if(isset($_POST['submit'])){
    $ext = towrealarray($_POST);
    extract($ext);
    $pass=  md5($password);
    $query = towquery("SELECT * FROM tbl_user WHERE user_email='$userName' AND user_password='$pass'");
    if(townum($query) > 0){
            while($b = towfetch($query)){
                $user_pk_id = $b['user_pk_id'];
                $mob= $b['contact'];
            }
        $mob = md5($mob);
        $_SESSION['user'] = $mob;
        $_SESSION['userId'] = $user_pk_id;
    setcookie('userId',$user_pk_id, time() + (86400 * 30), "/");
   
    $query2 = towquery("SELECT * FROM tbl_cart WHERE user_sess_id='$sessId'");
     if(townum($query2) > 0){
             echo "<script>window.location.href='checkout';</script>";
        }else{
             echo "<script>window.location.href='orders';</script>";
        }
    }
    echo "<script>window.location.href='login?error=';</script>";
}

?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://feminineafrica.ci/"><?= Home ?></a></li>
    <li class="breadcrumb-item"><a href="#"><?= Login ?></a></li>
    <!--<li class="breadcrumb-item active" aria-current="page">Data</li>-->
  </ol>
</nav>

<style>
    .breadcrumb>.breadcrumb-item>a{color: #777 !important; font-size: 13px;}
    
</style>
<h3 style="text-align: center; font-weight: bold; margin-top: 20px; margin-bottom: 20px;font-family: 'Ubuntu', sans-serif;"><?= Login ?></h3>
       <?php if(isset($_GET['error'])){?><label style="color:red; text-align: center; font-weight: bold; font-family: 'Ubuntu', sans-serif;"><?= $_GET['error'] ?><?= error ?></label> <?php } ?>
       <?php if(isset($_GET['msg'])){?><label style="color:green; text-align: center !important; font-weight: bold; font-family: 'Ubuntu', sans-serif;"><?= $_GET['msg'] ?><?= success ?></label> <?php } ?>
      <div class="container">
            <div class="row">
               <div class="col-md-4"></div>
                <div class="col-md-4" style="background: #f8f8f8; padding: 15px;">
                    <form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label"><?= username ?></label>
							<input type="text" class="form-control" placeholder=" " name="userName" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label"><?= password ?></label>
							<input type="password" class="form-control" placeholder=" " name="password" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" name="submit" class="form-control" value="<?= Login ?>">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing"><?= remember_me?>?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3"><?= reg_mg ?>?
                                                    <a href="register.html" data-toggle="modal" data-target="#exampleModal2" style="color: #000;">
								<?= register ?></a>
						</p>
					</form>
                </div>
                 <div class="col-md-4"></div>
            </div>
        </div>
        
<?php include 'footer.php'; ?>