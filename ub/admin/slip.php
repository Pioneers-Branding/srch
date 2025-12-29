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
        $display_cart_result = $dbconfigr->dbperform("select * from tbl_transaction where order_id='$order'");

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
                            <img src="https://feminineafrica.com/images/feminine-logo.jpeg" height="80px" width="150px" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="#">
                            Feminine Africa
                            </a>
                        </h2>
                        <div>Riviera 3, Abidjan, Cote d'Ivoire</div>
                        <div>+225 07 02 56 02 40</div>
                        <div>inquiry@feminineafrica.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light"></div>
                        <h2 class="to" style="font-size: 21px; margin-bottom:10px">Billing INVOICE TO:</h2>
                        <div class="address"><?=$row['t1Name'];?></div>
                        <div class="address"><?=$row['t1Email'];?></div>
                        <div class="address"><?=$row['t1Contact'];?></div>
                        <div class="address"><?=$row['userShippingAddress1'];?></div>
                        <div class="address"><?=$row['t1State'];?></div>
                        <div class="address"><?=$row['t1City'];?></div>
                         <h2 class="to" style="font-size: 21px; margin:10px 0">Shipping To :</h2>
                        <div class="address"><?=$row['tName'];?></div>
                        <div class="address"><?=$row['tEmail'];?></div>
                        <div class="address"><?=$row['tContact'];?></div>
                        <div class="address"><?=$row['del_addr'];?></div>
                        <div class="address"><?=$row['tState'];?></div>
                        <div class="address"><?=$row['tCity'];?></div>

                        <div class="address"><?=$row['tPincode'];?></div>

                    </div>
          
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE: <?=$_REQUEST['order']?></h1>
                                                <div class="date">Date : <?=$row['transaction_date'];?></div>

                        <div class="date">Payment Mode : <?=  !empty($row['transaction_mode']) ? $row['transaction_mode']:'RazorPay With COD';?></div>
                        <div class="date">Amount Paid: ₹ <?=$row['transc_amount'];?></div>
                        <div class="date">Amount Left: ₹ <?=$row['leftAmount'];?></div>

                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th class="text-left">Product</th>

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
                    $subtotal+=$row2['product_quantity']*$display_cart_resultRow3['discount'];
                    $subtotal1=$row2['product_quantity']*$display_cart_resultRow3['discount'];

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
                      <td><?=$display_cart_resultRow3['product_title'] .' x '.$row2['product_quantity']; ?></td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </tbody>
       
                </table>
      
            </main>
      
              
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
        
            
            
        </div>
    </div>
  
</div>

        </div>
      </div>
    </div>
   
        
<!-- END: Content-->

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
header("location:invoice?order=".$order);

}

?>
<?php   include("includes/footer.php"); ?>
