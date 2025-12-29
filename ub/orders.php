<?php 
include 'header.php';
if (!isset($_SESSION['user'])) {
 echo "<script>window.location.href='".base_url."login';</script>";
}else{}


    
if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['status'])){
        $ext = towrealarray($_POST);
             extract($ext);
$cnaReq = towquery("SELECT * FROM `tbl_order` WHERE `order_id`='$orderId' AND `user_fk_id`='$userId' AND `product_fk_id`='$productId' ");    
if($cnaReq->num_rows > 0 ){
$canOrder = towquery("INSERT INTO `tbl_cancelOreder`( `order_id`, `user_id`, `product_id`, `product_name`,`order_staus`, `cancel_date`) VALUES ('$orderId','$userId','$productId','$productName','cancel','".date('Y-m-d h:i:s')."')");
$uporder = towquery("UPDATE `tbl_order` SET `order_status`='2',`cancel_date`='".date('Y-m-d h:i:s')."' WHERE `order_id`='$orderId' AND `user_fk_id`='$userId' AND `product_fk_id`='$productId'");
    
}else{
    echo "<script>alert('your order does not exist')</script>";
}
?>
<script>
    window.location.href='<?= base_url."orders" ?>';
</script>
<?php        
    }
?>


<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}


.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

<link rel="stylesheet" href="css/accordion.css">
<script src="js/accordion.js"></script>

<div class="container" style="margin-top:50px; margin-bottom: 50px;">
   <div class="accordion-started accordion-bral row" style="background: #f7f7f7; padding: 25px 20px;">
      
      <div class="col-sm-12 col-md-12 col-lg-12">
         <!-- accordion item start -->
         <input class="ac-input" id="ac-1"  name="accordion-1" type="radio" checked/>
         <label class="ac-label" for="ac-1"><?= od_history ?><i></i></label>
         <div class="article ac-content">
             <?php
        $user_user_pk_id= $_SESSION['userId'];
         $oraderstrDate =array();$oraderendDate=array();
           $dt = towquery("SELECT tbl_order.*,tbl_product.product_title,tbl_product.product_image,tbl_product.discount,tbl_product.product_w,tbl_product.product_price FROM `tbl_order`INNER JOIN tbl_product
             ON tbl_order.product_fk_id=tbl_product.product_pk_id WHERE `user_fk_id`='$user_user_pk_id' Order By order_pk_id DESC");
              while($date = towfetch($dt)){
             $strDate = (date('Y-m-d 00:00:01',strtotime ($date['order_date'])));
             $endDate = (date('Y-m-d 23:59:59',strtotime ($date['order_date'])));
               if (!in_array($strDate, $oraderstrDate)){
                     $oraderstrDate[]=$strDate;
               }
                if (!in_array($endDate, $oraderendDate)){
                    $oraderendDate[]=$endDate;
                }
              } 
             //print_r($oraderstrDate); print_r($oraderendDate);echo "<br>";
                 
        for($id=0;$id<count($oraderstrDate);$id++){
       ?>
       <button class="accordion" style="background: #fff; border: #000 solid 1px; margin-bottom: 5px;"><?php print_r(date('d/m/y ', strtotime($oraderstrDate[$id]))); ?> <img src="https://freepngimg.com/thumb/web_design/24691-9-right-arrow-hd.png" style="height: 20px; width: 20px;"></button>
       <div class="panel">
       <?php
     $a = towquery("SELECT tbl_order.*,tbl_product.product_pk_id,tbl_product.product_title,tbl_product.product_image,tbl_product.featurd_image,tbl_product.discount,tbl_product.product_w,tbl_product.product_price FROM `tbl_order`INNER JOIN tbl_product
      ON tbl_order.product_fk_id=tbl_product.product_pk_id  WHERE `user_fk_id`='$user_user_pk_id' AND order_date>='$oraderstrDate[$id]' and  order_date<='$oraderendDate[$id]'");
    
       ?>
             
             
             <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col"> Product Name</th>
      <th scope="col"> quantity</th>
      <!--<th scope="col"> unit_price </th>-->
      <th scope="col"> price </th>
      <th scope="col"> status </th>
      <th scope="col"> cancel </th>
    </tr>
  </thead>
  <tbody>
  <?php 
 
  while($b = towfetch($a)){ ?>
	    <tr>
      <th scope="row"><?= $b['order_id'] ?></th>      
      <td><img src="admin/assets/<?= $b['featurd_image'] ?>" style="width: 100px; height: 110px;"></td>
      <td><?=$b['product_title'];?></td>
      <td><?=$b['product_quantity'];?></td>
      <!--<td><?= currency_code()?><?=$b['discount'];?></td>-->
      <td><?= currency_code()?><?=$b['discount'] * $b['product_quantity'];?></td>
      <td><?php if($b['order_status'] == 0){?>Processing<?php }else if($b['order_status'] == 1){?>Completed<?php }else if($b['order_status'] == 2){?>Cancel<?php }else if($b['order_status'] == 3){?>Return<?php }?></td>
          <td>
        <?php $cancelStatus = towquery("SELECT * FROM `tbl_cancelOreder` WHERE `order_id`='".$b['order_id']."' AND `user_id`='".$user_user_pk_id."' AND `product_id`='".$b['product_pk_id']."'");
             if($cancelStatus->num_rows== 0){?>
        <form method="post">
        <input type="hidden" name="userId" value="<?= $user_user_pk_id ?>" class="form-control" readonly />
        <input type="hidden" name="orderId" value="<?= $b['order_id'] ?>" class="form-control" readonly />
        <input type="hidden" name="productId" value="<?= $b['product_pk_id']?>" class="form-control"  readonly />
        <input type="hidden" name="productName" value="<?= $b['product_title']?>" class="form-control"  readonly />
        <input type="hidden" name="status" value="status" class="form-control"  readonly />
        <button type="submit" class="btn btn-primary">Cancel</button>
    </form>
    <?php } else{?>
        CANCEL ORDER
    <?php } ?>    
    </td>
    </tr>
<?php   }  ?> 
  </tbody>
</table> 
             </div>
        <?php     }?>
         </div>
      </div>
      <!-- accordion item 1 end -->
      <div class="col-sm-12 col-md-12 col-lg-12">
         <!-- accordion item 2 start -->
         <input class="ac-input" id="ac-2" name="accordion-1" type="radio"/>
         <label class="ac-label" for="ac-2"><?= Wishlist ?><i></i></label>
         <div class="article ac-content">
           <?php  
//   $wt = towquery("select *  from `user_wishlist` Where `user_id`='$user_user_pk_id'");
  $wt = towquery("SELECT user_wishlist.*,tbl_product.product_title,tbl_product.product_title_fr,tbl_product.product_url,tbl_product.featurd_image FROM `user_wishlist`INNER JOIN tbl_product
             ON user_wishlist.product_id=tbl_product.product_pk_id WHERE `user_id`='$user_user_pk_id'");
  ?>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Img</th>
      <th scope="col"><?= pd_name ?></th>
      <th scope="col"><?= view ?></th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $coun=1;
   while($wishList = towfetch($wt)){ ?>
	    <tr>
      <th scope="row"><?= $coun ?></th>
      <td><img src="<?= base_url ?>admin/assets/<?= $wishList['featurd_image'] ?>" width="50" height="60"></td>
      <td><?= $wishList[$product_tilte] ?></td>
      <td><a href="<?= base_url ?><?= $wishList['product_url'] ?>" class="btn btn-info"><?= view ?></a></td>
    </tr>
<?php  $coun++; }  ?> 
  </tbody>
</table>
         </div>
      </div>
      
      
      
      <div class="col-sm-12 col-md-12 col-lg-12">
         <!-- accordion item 2 start -->
         <input class="ac-input" id="ac-2" name="accordion-1" type="radio"/>
         <label class="ac-label" for="ac-2"><?= Account ?><i></i></label>
         <div class="article ac-content">
            <?php  

  $cn = towquery("SELECT `first_name`,`last_name`,`contact`,`user_email`,`address`,`landmark` FROM `tbl_user` WHERE `user_pk_id`='$user_user_pk_id'");
  ?>
  <table class="table">
  <thead>
  <?php 
   while($contact = towfetch($cn)){ ?>
	   <tr><th scope="col"><?= ft ?></th>  
      <td><?= $contact['first_name'] ?></td></tr>
      <tr>
          <tr><th scope="col"><?= lt ?></th>  
      <td><?= $contact['last_name'] ?></td></tr>
      <tr>
      <th scope="col"><?= ct ?></th>
      <td><?= $contact['contact'] ?></td>
      </tr>
      <tr>
      <th scope="col">Email</th>
      <td><?= $contact['user_email'] ?></td>
      </tr>
         <tr>
      <th scope="col"><?= address ?></th>
      <td><?= $contact['address'] ?></td>
      </tr>
      
      
       <tr>
      <th scope="col"><?= landmark ?></th>
      <td><?= $contact['landmark'] ?></td>
      </tr>
<?php   }  ?> 
  </thead>
 
</table>
         </div>
      </div>
      <!-- accordion item 1 end -->
        <div class="col-sm-12 col-md-12 col-lg-12">
         <!-- accordion item 2 start -->
         <input class="ac-input" id="ac-2" name="accordion-1" type="radio"/>
         <label class="ac-label" for="ac-2"><?php echo "Update Profile"; ?><i></i></label>
         <div class="article ac-content">
            <?php  

  $cnn = towquery("SELECT `first_name`,`last_name`,`contact`,`user_email`,`address`,`landmark` FROM `tbl_user` WHERE `user_pk_id`='$user_user_pk_id'");
  ?>
  <table class="table">
  <thead>
 
  <?php 
   while($contactn = towfetch($cnn)){ 
   //var_dump($contactn);
   ?>
	   <tr><form method="POST" action="updatedetails.php"><th scope="col"><?= ft ?></th>  
      <td><input type="text" name="user_name" value="<?= $contactn['first_name'] ?>" /></td></tr>
      <tr>
          <tr><th scope="col"><?= lt ?></th>  
      <td><input type="text" name="user_lastname" value="<?= $contactn['last_name'] ?>" /></td></tr>
      <tr>
      <th scope="col"><?= ct ?></th>
      <td><input type="text" name="contact" value="<?= $contactn['contact'] ?>" /></td>
      </tr>
      <tr>
      <th scope="col">Email</th>
      <td><input type="text" name="email" value="<?= $contactn['user_email'] ?>"  disabled/></td>
      </tr>
      
       <tr>
      <th scope="col"><?= address ?></th>
      <td><input type="text" name="address" value="<?= $contactn['address'] ?>" /></td>
      </tr>
      
      
       <tr>
      <th scope="col"><?= landmark ?></th>
      <td><input type="text" name="landmark" value="<?= $contactn['landmark'] ?>" /></td>
      </tr>
      <tr>
          <th scope="col"></th>
      <td><button type="submit" name="Update_P" style="background: #000; padding: 5px 10px;  color: #fff;">Update</button></td></form>
      </tr>
<?php   }  ?> 
  </thead>
   <tbody>
      <?php  
      /*  $add = towquery("SELECT `user_fk_id`,`tName`,`tContact`,`tPincode`,`userShippingLandmark`,`addressType`,`userShippingAddress1` FROM `tbl_transaction` WHERE `user_fk_id`='$user_user_pk_id' Order By `transaction_pk_id` DESC Limit 1");
           if($add->num_rows > 0){ 
                while($addres = towfetch($add)){?>
                <tr><th><?= address ?></th><td><?= $addres['userShippingAddress1']?></td> </tr>
                <tr><th><?= landmark ?></th><td><?= $addres['userShippingLandmark']?></td> </tr>
               
                <tr><th><?= address_type ?></th><td><?= $addres['addressType']?></td> </tr>
       <?php    } }*/
        ?>
  </tbody>
</table>
         </div>
      </div>
       <div class="col-sm-12 col-md-12 col-lg-12">
      <center><a href="logout.php"><button style="background: #000; padding: 5px 10px;  color: #fff;"><?= logou ?></button></a></center></div>
      
   </div>
</div>


 <!--<h3 style="text-align: center;"><b>Order History</b></h3>-->

<?php include 'footer.php';?>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
    </body>


</html>
