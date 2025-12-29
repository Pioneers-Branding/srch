<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    $core_control_oj = new classMaster();
    
   // print_r($_POST);
if(isset($_POST['currency']) && !empty($_POST['currency'])){
   //print_r($_POST);
      if($_POST['currency'] == 'USD'){
        $_SESSION['currency'] = $_POST['currency'];
        $_SESSION['currencyFlag']='<span class="flag-icon flag-icon-us"></span>';
        $_SESSION['currencyCode']='$';
        $_SESSION['price']=$_POST['price'];
  }else if($_POST['currency'] == 'EUR'){
        $_SESSION['currency'] = $_POST['currency'];
        $_SESSION['currencyFlag']='<span class="flag-icon flag-icon-fr"></span>';
        $_SESSION['currencyCode']='€';
        $_SESSION['price']=$_POST['price'];
  }else if($_POST['currency'] == 'XAF'){
        $_SESSION['currency'] = $_POST['currency'];
        $_SESSION['currencyFlag']="<img src='images/ivoire.png' width='22' height='17'>";
        $_SESSION['currencyCode']='CFA ';
        $_SESSION['price']=$_POST['price'];
  }else{
       $_SESSION['currency'] = $_POST['currency'];
        $_SESSION['currency_flag']="<img src='images/ivoire.png' width='22' height='17'>";
        $_SESSION['currencyCode']='CFA';
        $_SESSION['price']=$_POST['price'];
  }
   	    echo "ok";
  }
  
    
    ?>