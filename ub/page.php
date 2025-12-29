<?php include 'header.php';
    $cid = isset($row['post_id'])?$row['post_id']:'';
    $postData = towquery("SELECT * FROM `tbl_posts` WHERE `post_id`=$cid");
    $obj = towfetch($postData);

?>

 <div class="container-fluid">
  <div class="row">
      <?php if(!empty($obj['post_image'])){ $bannerImage= 'admin/assets/'.$obj['post_image'];}else{  $bannerImage=""; }?>
      <img src="<?= $bannerImage ?>" style="width: 100%;">
  </div>
 </div>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://akwabaformula.com/electro-store/"><?= Home ?></a></li>
    <!--<li class="breadcrumb-item"><a href="#">Library</a></li>-->
    <li class="breadcrumb-item active" aria-current="page"><a href="#"><?= $obj[$title_field] ?></a></li>
  </ol>
</nav>

<style>
    .breadcrumb>.breadcrumb-item>a{color: #777 !important; font-size: 13px;}
    span.item_price{color: #000; font-weight: bold;font-family: 'Ubuntu', sans-serif;}
</style>

<section id="about" class="clearfix">
 <div class="container">
  <div class="row">
   <div class="about_top clearfix">
       
	<div class="col-sm-12 about_top_right clearfix" style="margin-top: 50px;">
	 <div class="about_top_right_inner clearfix">
       <h2><?= $obj[$title_field] ?></h2>
	        <?= $obj[$content_field] ?>
         </div>
	</div>
   </div>
  </div>
 </div>
</section>



<?php include('footer.php'); ?>