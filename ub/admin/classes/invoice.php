<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    $core_control_oj = new classMaster();
   if(isset($_POST['id']) && !empty($_POST['id'])){
        $id = $_POST['id'];
        $Instatus = $_POST['status'];
        
         $db=new dbconfig();
         $result = $db->dbperform("select * from tbl_transaction where transaction_pk_id='$id'");
         $row=$result->fetch_assoc();
        // print_r($row['order_id']);
        $user_fk_id =$row['user_fk_id'];$transaction_status=$row['transaction_status'];$transaction_mode=$row['transaction_mode'];
        $transaction_date = $row['transaction_date']; $del_addr=$row['del_addr'];$transc_amount=$row['transc_amount'];$leftAmount=$row['leftAmount'];
        $tContact = $row['tContact'];$tPincode=$row['tPincode'];$tName=$row['tName']; $tEmail=$row['tEmail']; $tState=$row['tState'];
        $tCity = $row['tCity'];$t1Name=$row['t1Name'];$t1Email=$row['t1Email'];$t1Contact=$row['t1Contact']; $t1State=$row['t1State'];
        $t1City= $row['t1City']; $t1Pincode=$row['t1Pincode'];$userShippingAddress1=$row['userShippingAddress1'];
        $shiping_ch=$row['shiping_ch'];$shipingTime=$row['shipingTime'];
        
        if($Instatus=='Pending'){ $orderStatus=0; }else if($Instatus=='Complete'){ $orderStatus=1; }
        else if($Instatus=='Cancel'){ $orderStatus=2; }else if($Instatus=='Return'){ $orderStatus=3; }
        
        $update_form = $db->dbperform("UPDATE tbl_transaction INNER JOIN tbl_order ON tbl_order.order_id=tbl_transaction.order_id SET transaction_status='$transaction_status',transaction_mode='$transaction_mode',transaction_date='$transaction_date',del_addr = '$del_addr',transc_amount='$transc_amount',leftAmount='$leftAmount',tContact='$tContact',tPincode='$tPincode',tName = '$tName',tEmail='$tEmail',tState='$tState',tCity='$tCity',t1Name='$t1Name',t1Email = '$t1Email',t1Contact='$t1Contact',t1State='$t1State',t1City='$t1City',t1Pincode='$t1Pincode',userShippingAddress1 = '$userShippingAddress1', shiping_ch='$shiping_ch',shipingTime='$shipingTime',     
        trackingLink='$Instatus',order_status='$orderStatus' WHERE transaction_pk_id=$id");
     
     
        if($st){
            echo 1;
       }else{
           echo 0;
       }
   }else{
         header("location:http://veggieemart.com/admin");
   }
  
   ?>