<?php include('header.php');
//$uri = $_SERVER['REQUEST_URI'];
//$arr = explode("/",$uri);
//$orderId = "ORDER ID-".$arr[2];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center" style="background-color: white">
                
                <img src="https://feminineafrica.com/images/checked.png" alt=" " style="width:75px;margin-bottom:20px" class="img-fluid">
               
                <h2><?= thank_you_page_head ?></h2>
                
             

                <p class="thankyou_message" style="margin-top: 40px"><?= thank_you_page_message_part_1 ?></p>
                <p class="thankyou_message" style="margin-top: -10px"><?= thank_you_page_message_part_2 ?><?=$orderId?></p>
                
                <p class="thankyou_message" style="margin-top: -10px"><?= thank_you_page_message_part_3 ?></p>
                <p class="thankyou_message" style="margin-top: -10px"><?= thank_you_page_message_part_4 ?>inquiry@feminineafrica.ci</p>
                
               
                
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>


