
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy;  <?=date('Y');?> <a class="text-bold-800 grey darken-2" href="#" >UB ELECTRONICS</a></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <!-- END: Page JS-->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
            <script src="app-assets/datatable.js"></script>

      <!-- END: Page JS-->
      <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable();
            var tableLength = $("#example tfoot th").length;
            $("#example tfoot th").each( function ( i ) {
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(this).empty() )
                    .on( 'change', function () {
                        table.column( i )
                            .search( $(this).val() )
                            .draw();
                    } );
         
                table.column( i ).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
           
                } );
        
              if(i==tableLength - 1){
                
                $(this).html('Action');
                
             }      
                
            } );
        } );
      </script> 
  </body>
  <!-- END: Body-->

</html>