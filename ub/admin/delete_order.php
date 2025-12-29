 <?php  require_once"classes/classMaster.php";
       $db= new dbconfig();
       $delete =   $db->dbperform("DELETE FROM `tbl_order` WHERE `order_id` ='".$_REQUEST['order']."'");
        $delete1 =   $db->dbperform("DELETE FROM `tbl_transaction` WHERE `order_id` ='".$_REQUEST['order']."'");
       
       if($delete)
       {
          // echo "deleted";
          echo "<script>alert('Deleted Successfully'); 
          location='view-invoice';</script>";
       }
       else
       {
           //echo "something wrong";
            echo "<script>alert('Something Went Wrong'); 
          location='view-invoice';</script>";
       }