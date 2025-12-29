<?php 
ob_start();
session_start();
if( isset( $_SESSION['adminKey'] ) ){
    require_once"classes/classMaster.php";
}
else{
    header("location:login");
}
?>
<!-- BEGIN: Header-->
<?php include("includes/header.php"); ?>
<style>
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>

<!-- BEGIN: Main Menu-->
<?php   include("includes/aside.php"); ?>
<!-- BEGIN: Content-->
            <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->

<div id="invoice">
<?php 
        $dbconfigr = new dbconfig();    
        $order = $_GET['order']; 
        $display_cart_result = $dbconfigr->dbperform("select * from tbl_transaction INNER JOIN tbl_addresses ON tbl_transaction.address_id = tbl_addresses.id INNER JOIN tbl_user ON tbl_transaction.user_fk_id = tbl_user.user_pk_id where order_id='$order'");

        $row = $display_cart_result->fetch_assoc();
        $invoice=explode('-',$order);
        $resultForUserDetails = $dbconfigr->dbperform("select * from tbl_user where user_pk_id=".$row['user_fk_id']);
                $resultForUserDetailsRow = $resultForUserDetails->fetch_assoc();

?>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="#">
                            <img src="https://gaganfilmsproduction.in/public/feminineafrica.ci/d1kivxjtmxnd4.cloudfront.net/assets/img/f87d2d81-4156-4639-b3d6-71e5e630d720.jfif" height="80px" width="150px" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="#">
                            Ub Electronics
                            </a>
                        </h2>
                        <div>Shop No. A-90, Main Masoodpur Market, Near SBI Bank,Vasant Kunj,New Delhi-110070</div>
                        <div>+919899748175</div>
                        <div>unboxbrotherhoodcrp@outlook.com</div>
                        <div>Pan no - AXKPG1312J</div>
                        <div>GSTIN/UIN - 07AXKPG1312J1ZQ</div>
                        <!--<div>unboxbrotherhoodcrp@outlook.com</div>-->
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to" style="display:flex; margin-bottom: 20px">
                        <div class="col-md-6">
                            <div class="text-gray-light"></div>
                        <h2 class="to" style="font-size: 21px; margin-bottom:10px">Billing INVOICE TO:</h2>
                        <div class="address"><?=$row['full_name'];?></div>
                        <div class="address"><?=$row['user_email'];?></div>
                        <div class="address"><?=$row['contact'];?></div>
                        <!--<div class="address"><?=$row['address'];?></div>-->
                        <!--<div class="address"><?=$row['landmark'];?></div>-->
                        <!--<div class="address"><?=$row['state'];?></div>-->
                        <!--<div class="address"><?=$row['city'];?></div>-->
                         <h2 class="to" style="font-size: 21px; margin:10px 0">Shipping To :</h2>
                        <div class="address"><?=$row['contactPerson'];?></div>
                        <div class="address"><?=$row['t1Email'];?></div>
                        <div class="address"><?=$row['contactNumber'];?></div>
                        <div class="address"><?=$row['addressId'];?></div>
                        <div class="address"><?=$row['landmark'];?></div>
                        <div class="address"><?=$row['state'];?></div>
                        <div class="address"><?=$row['city'];?></div>

                        <div class="address"><?=$row['pincode'];?></div>
                    <!--        <h2 class="to" style="font-size: 21px; margin:10px 0">Shipping Date Time :</h2>-->
                    <!--        <div class="shipingTime">-->
                               <?php 
                           if(!empty($row['shipingDay']) && $row['shipingDay']!='0000-00-00' ){
                                echo date('d M Y', strtotime(($row['shipingDay'])));
                                   echo"<br>";
                               }
                             ?>
                           <?php if(!empty($row['shipingTime'])){
                                 $shpTime =explode("-",$row['shipingTime']);
                              echo $shpTime[0].":00&nbsp;".$shpTime[2]."&nbsp; to &nbsp;".$shpTime[1].":00 &nbsp;".$shpTime[2];
                          }
                              ?>
                                
                    <!--</div>-->
                        </div>
          
                   <div class="col-md-6">
                        <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE: <?=$_REQUEST['order']?></h1>
                                                <div class="date">Date : <?=$row['transaction_date'];?></div>

                        <div class="date">Payment Mode : <?= $row['transaction_mode'] ?></div>
                        <div class="date">Amount Paid: <?= $row['currency_code']; ?><?=$row['transc_amount'];?></div>
                        <div class="date">Amount Left: <?= $row['currency_code']; ?><?=$row['totalamt'];?></div>

                    </div>
                   </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th class="text-left">Product</th>
                            <th class="text-left">Price</th>
                            <th class="text-left">Size</th>
                            <th class="text-left">Color</th>

                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $subtotal=0;
                    $total=0;
                    $temp=0;
                    $subtotal1=0;
                    $shippingCharges=0;
                    $shippingChargesWeight=0;
                                                    $shippingChargesFinal=0;

                                            $i=0;

                    $display_cart_result2 = $dbconfigr->dbperform("select * from tbl_order where order_id='$order'");

                    while ($row2 = $display_cart_result2->fetch_assoc())

                    {
                    $display_cart_result3 = $dbconfigr->dbperform("select * from tbl_product where product_pk_id=".$row2['product_fk_id']);
                    $display_cart_resultRow3 = $display_cart_result3 ->fetch_assoc();
                    $subtotal+=$row2['product_quantity']*$display_cart_resultRow3['product_fk_price'];
                    $subtotal1=$row2['product_quantity']*$row2['product_fk_price'];

                    $tax = intval($display_cart_resultRow3['product_gst']) / 100;
                    $total = $subtotal1 + ($subtotal1 * $tax);
                    $temp = $temp +$total;
                    $tableViewTotal = $subtotal1 + ($subtotal1 * $tax);
                    $total =0;
                    $tempExplode = explode("-",$display_cart_resultRow3['product_varient']);
                    $hiiiiiiiiii= $tempExplode[1];
                    $tempExplodeToCalculate = explode(" ",$hiiiiiiiiii);
                    $shippingChargesWeight += ($tempExplodeToCalculate[1]*$row2['product_quantity']);
                    $shippingChargesFinal+= $display_cart_resultRow3['product_sc'];
                    $gstTotal =  ($subtotal1 * $tax);

                    
                     ?>
                    <tr>
                      <td><?=$row2['product_quantity'];?></td>
                      <td><?=$display_cart_resultRow3['product_title'].' ( '.$display_cart_resultRow3['product_varient'].' )'?></td>
                      <td><?=$row2['product_fk_price'] .' x '.$row2['product_quantity']; ?></td>
                      <td><span><?=$row2['size']?></span></td>
                     <td><span><?=$row2['color']?></span></td>
                      <!--<td ><?= $row['currency_code']; ?><?=$gstTotal?></td>-->
                      <td class="text-right"><?= $row['currency_code']; ?><?=$tableViewTotal?></td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <td colspan="1"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td><!--₹--><?= $row['currency_code']; ?><?=$temp?></td>
                        </tr>
                        <tr>
                        <td colspan="1"></td>
                            <td colspan="2">Shipping Charges</td>
                            <td>
                            <?php
                                if(!empty($row['shipingPrice'])){
                                    $shipPrice=$row['shipingPrice'];
                                }else{
                                    $shipPrice= 0;
                                }
                            print_r($shipPrice);
                            ?>    
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="2">Coupon Name(<?= $row['couponName']; ?>)</td>
                            <td><?= $row['currency_code']; ?> <?= $row['couponPrice']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><?= $row['currency_code']; ?> <?=$total=$shippingChargesFinal+$temp+$shipPrice-$row['couponPrice'];?></td>
                        </tr>
                    </tfoot>
                </table>
         
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
              
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info" onclick="generatePDF()"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
   
        </div>
        
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div>
        
            
            
        </div><br><br><br><br>
                   <div class="col-md-6 company-details" style="display:none">
                        <h2 class="name" style="float:left;">
                            <a target="_blank" href="#">
                            Order  Tracking Details
                            </a>
                        </h2>
                        <form method="post">
                            <input type="text" name="trackingId" value="<?=$row['trackingId']?>" class="form-control" placeholder="Enter Tracking Id"><br>
                            
                            <input type="text" name="trackingLink" value="<?=$row['trackingLink']?>" class="form-control" placeholder="Enter Tracking Link"><br>
                            <button type="submit" name="confirmbtn" class="btn btn-primary">Update Tracking Details</button>
                        </form>
                 
                    </div> 
    </div>
  
</div>

        </div>
      </div>
    </div>
   
<!-- END: Content-->
  <!-- END: Page JS-->
<script src="pdf.js"></script>

<script>

   function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("invoice");
        // Choose the element and save the PDF for our user.
        html2pdf()
          .from(element)
          .save();
      }
       $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }

        });
</script>

<?php
if( isset( $_POST['confirmbtn'] ) ){
$trackingId=$_POST['trackingId'];
$trackingLink=$_POST['trackingLink'];

$dbconfigr->dbperform("update  tbl_transaction set trackingId='$trackingId',trackingLink='$trackingLink' where order_id='$order'");
print_r("<script>alert('Updated');window.location.replace('invoice?order=".$order."');</script>");
// header("location:invoice?order=".$order);

}

?>
<?php   include("includes/footer.php"); ?>
