<?php 
ob_start();
session_start();
if( isset( $_SESSION['adminKey'] ) ){
    require_once"classes/classMaster.php";
    $db= new dbconfig();
}
else{
    header("location:login");
}
?>
<!-- BEGIN: Header-->
<?php include("includes/header.php"); ?>

<!-- BEGIN: Main Menu-->
<?php   include("includes/aside.php"); ?>

<!-- BEGIN: Content-->
  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
<div class="row">
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-danger bg-darken-2">
                        <i class="icon-user font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5>Total Users</h5>
                        <?php 
                        
                        $result = $db->dbperform("select * from tbl_user where user_role='user'");
                        
                        ?>
                        <h5 class="text-bold-400 mb-0"><?=$result->num_rows;?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-warning bg-darken-2">
                        <i class="fa fa-shopping-cart font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                        <h5>Total Products</h5>
                         <?php 
                        
                        $resultDriver = $db->dbperform("select * from tbl_product ");
                        
                        ?>
                        <h5 class="text-bold-400 mb-0"><?=$resultDriver->num_rows;?></h5>   
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-success bg-darken-2">
                        <i class="fa fa-money font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>Total Orders</h5>
                        <?php 
                        
                        $resultCourier = $db->dbperform("select * from tbl_transaction ");
                        
                        ?>
                        <h5 class="text-bold-400 mb-0"><?=$resultCourier->num_rows;?></h5>      
                        </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!--/ Stats -->
<!--Product sale & buyers -->
<!--/ Product sale & buyers -->
<!--Recent Orders & Monthly Salse -->
<div class="row match-height">
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recently Added Products</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <!--<div class="heading-elements">-->
                <!--    <ul class="list-inline mb-0">-->
                <!--        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>-->
                <!--        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
            <div class="card-content">
       
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Discounted Price</th>
                                <th>Price</th>

                            </tr>
                        </thead>
                        <tbody>
                       <?php 
                        
                        $resultDriver = $db->dbperform("select * from tbl_product  order by product_pk_id DESC limit 0,5");
                        while($rowDriver = $resultDriver->fetch_assoc()){
                        ?>
                            <tr>
                                <td class="text-truncate"><?=$rowDriver['product_title']?></td>
                                <td class="text-truncate"><a href="#"><?=$rowDriver['product_quantity']?></a></td>
                                <td class="text-truncate">  <?=$rowDriver['product_price']?></td>
                                <td class="text-truncate">  <?=$rowDriver['discount']?></td>

                            </tr>
                   <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Orders</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <!--<div class="heading-elements">-->
                <!--    <ul class="list-inline mb-0">-->
                <!--        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>-->
                <!--        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
            <div class="card-content">
       
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Mode</th>
                                <th>Date & TIme</th>
                                <th>Invoice</th>

                            </tr>
                        </thead>
                        <tbody>
                       <?php 
                        
                        $resultcourierDriver = $db->dbperform("select * from tbl_transaction WHERE payment_status IN (1, 2) order by transaction_pk_id DESC limit 0,5");
                        while($rowcourierDriver = $resultcourierDriver->fetch_assoc()){
                        ?>
                            <tr>
                                <td class="text-truncate"><?=$rowcourierDriver['order_id']?></td>
                                <td class="text-truncate"><a href="#"><?=$rowcourierDriver['transaction_mode']?></a></td>
                                <td class="text-truncate"><?=$rowcourierDriver['transaction_date']?></td>
                                <td class="text-truncate"><a href="invoice?order=<?=$rowcourierDriver['order_id']?>">View</a></td>
                            </tr>
                   <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




</div>
<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recently Registered Users</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <!--<div class="heading-elements">-->
                <!--    <ul class="list-inline mb-0">-->
                <!--        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>-->
                <!--        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
            <div class="card-content">
       
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Date & TIme</th>

                            </tr>
                        </thead>
                        <tbody>
                       <?php 
                        
                        $resultUser = $db->dbperform("select * from tbl_user where user_role='user' order by user_pk_id DESC limit 0,5");
                        while($rowresultUser = $resultUser->fetch_assoc()){
                        ?>
                            <tr>
                                <td class="text-truncate"><?=$rowresultUser['full_name']?></td>
                                <td class="text-truncate"><a href="#"><?=$rowresultUser['contact']?></a></td>
                                <td class="text-truncate"><?=$rowresultUser['user_email']?></td>
                                <td class="text-truncate"><?=$rowresultUser['user_reg_date']?></td>

                            </tr>
                   <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</div>


        </div>
      </div>
    </div>
  

<!-- END: Content-->
<?php   include("includes/footer.php"); ?>
