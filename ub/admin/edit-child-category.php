<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $classMaster = new classMaster();
   }
   else{
       header("location:login");
   }
    
    $db=new dbconfig();
    $id=intval($_GET['category']);
    $parentid=intval($_GET['ref']);
    $parentsubid=intval($_GET['refid']);
    $result = $db->dbperform("select * from tbl_childcategory where child_pk_id='$id' AND product_cat='$parentid' AND product_sub_cat='$parentsubid' ");
    $row=$result->fetch_assoc();
    // $resultext  = $db->dbperform("select * from tbl_post_extra Where post_extr_id='$id' AND post_tbl='subCat'" );
    // $rowext =$resultext->fetch_assoc();
    // print_r($resultext);
    
    
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['s_cat_ref']))
{


$post_tbl = 'subCat';

        $child_category = $_POST['child_category'];
        $p_post_title = $_POST['p_post_title'];
        $p_post_title2 = $_POST['p_post_title2'];
        

        $db->dbperformm("update tbl_childcategory set `product_cat`='$p_post_title',`product_sub_cat`='$p_post_title2',`child_category`='$child_category' where child_pk_id='$id'");

        
    
   
    
  
    ?>
   <script>
       alert('Child Category Update Successfully');
       window.location.href='edit-child-category?category=<?= $id ?>&ref=<?= $parentid ?>&refid=<?= $parentsubid ?>';
   </script>
   <?php 
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
               <div class="content-header-left col-md-6 col-12 mb-2">
                  <h3 class="content-header-title mb-0">Edit Child Category</h3>
                  <div class="row breadcrumbs-top">
                  </div>
               </div>
            </div>
            <div class="content-body">
               <!-- Basic form layout section start -->
               <section id="basic-form-layouts">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-content collpase show">
                               <div class="card-body">
              <form role="form" id="cat_form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row col-md-12">

                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="p_post_title" class="form-control" id="p_post_title"  multiple>
                       
                       <?php
                        // $query = $db->dbperform("select * from `tbl_category` WHERE cat_status='1'");
                        ?>
                        <!--<option value="">Select</option>-->
                    
                    <?php
                    $queryCat = $db->dbperform("select * from `tbl_category` ");
                            if ($queryCat->num_rows > 0){
                                 while ($rowcat = $queryCat->fetch_assoc()){
                            echo '<option value="' . $rowcat['cat_pk_id'] . '"'; echo  $rowcat['cat_pk_id']==$row['product_cat'] ? 'selected':''; echo ' >'.$rowcat['category'] . '</option>';
                            } }
                            ?>
 
                        </select>
                  </div>
              

                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Sub Category </label>
                    <select name="p_post_title2" class="form-control" id="p_post_title2" >
                        <?php
                        // $query = $db->dbperform("select * from `tbl_subCategory` WHERE cat_parent = 0 and cat_status='1'");
                        ?>
                        <!--<option value="">Select</option>-->
                    
                    <?php
                    $querysubCat = $db->dbperform("select * from `tbl_subCategory` ");
                            if ($querysubCat->num_rows > 0){
                                 while ($rowsubcat = $querysubCat->fetch_assoc()){
                            echo '<option value="' . $rowsubcat['id'] . '"'; echo  $rowsubcat['id']==$row['product_sub_cat'] ? 'selected':''; echo ' >'.$rowsubcat['category'] . '</option>';
                            } }
                            ?>
                    </select>
                  </div>
                  </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Child Category</label>
                    <input type="text" name="child_category" class="form-control" value="<?=$row['child_category'];?>" id="u_product_title" required>
                  </div>

                <div class="form-group ">
                      <input type="hidden" name="s_cat_ref" class="form-control" id="cat_ref" >
                      <input type="hidden" name="id" class="form-control" value="<?=$row['child_pk_id']?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary " style="margin-top:25px;margin-bottom:25px;float:right;"><i class="fa fa-check-square-o"></i> Save</button>
                </div>
              </form>
                                         </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- // Basic form layout section end -->
            </div>
         </div>
      </div>
   
<!-- END: Content-->
<?php   include("includes/footer.php"); ?>

<script>
     $("#p_post_title").on('change',(function(e){
    var p_post_title=$("#p_post_title").val();
    var include_ref='ref';
    $.ajax({
    url: "classes/control.php",
    data: { p_post_title:p_post_title,include_ref:include_ref },
    method:"POST",
    success: function(data){
    if(data!==''){
    $("#p_post_title2").html(data);
    }
    }
    });
    }));
    
    $(document).ready(function(){
             
         var p_post_title=$("#p_post_title").val();
         var sub_category="<?=$row['product_sub_cat']?>";
         
        //  alert(p_post_title);
         var include_ref='ref';
         $.ajax({
         url: "classes/control.php",
         data: { p_post_title:p_post_title,include_ref:include_ref ,sub_category:sub_category},
         method:"POST",
         success: function(data){
             console.log(data);
         if(data!==''){
         $("#p_post_title2").html(data);
         }
         }
         });
         
         });
</script>
