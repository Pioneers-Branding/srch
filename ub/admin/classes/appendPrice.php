<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    $core_control_oj = new classMaster();
    $db= new dbconfig();
   
     //$data = '';
    if(isset($_POST) && !empty($_POST)){ 
        $ic = $_POST['pr'];
        ?>
       <tr class="new-data">
                                               <td><div class="form-group">
                                                   <select name="color_name[]" class="form-control qlt_box1" style="font-size:12px; max-width:120px; width:100%;">
                                                       
                                                           <?php $core_control_oj->displayColor(); ?>
                                                      
                                                   </select>
                                                   </div></td>
                                               <td><div class="form-group"><input class="form-control quanty" placeholder="Product Quantity" required="required" type="text" name="product_vquantity[]" ></div></td>
                                                <td><div class="form-group">
                                                    <select name="cmsize[]" class="form-control qlt_box1" style="font-size:12px; max-width:120px; width:100%;">
                                                       
                                                           <?php $core_control_oj->displaySizeDropdown(); ?>
                                                      
                                                   </select>
                                                </div></td>
                  <td>
                    <a href="" class="btn-sm btn-danger remove_row" style="padding: 6px 0px; width: 100%; text-align: center; display: block;">Remove </a></td>
                
            </tr>
      <?php
    }else{
        
        return "";
    }
    ?>