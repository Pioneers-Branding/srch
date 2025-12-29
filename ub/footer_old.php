<?php

 if(isset($_SERVER['REQUEST_METHOD']) && !empty($_POST['subEmail'])){
   $ext = towrealarray($_POST);
     extract($ext);
     
$to = 'inquiry@feminineafrica.ci';
$from = $subEmail;
$subject = "NEWSLETTER Submited";
$message = "";
$message .= '<table class="table"">
  <thead>    
    <tr>
      <th scope="col">Email</th><th scope="row">'.$from.'</th>
    </tr>
  </thead>
</table>';

$checksubEmail = towquery("SELECT * FROM `tbl_subscribeUser` WHERE `email`='$from'");
if($checksubEmail->num_rows== 0){

$header = "From: $from \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
if(mail($to, $subject, $message, $header)){
    $subEmail = towquery("INSERT INTO `tbl_subscribeUser`(`email`, `sub_date`) VALUES ('$from','".date('Y-m-d h:i:s')."')");

    $_POST = array();
    echo "<script>alert('Email Send.');</script>";
}else{
    echo "<script>alert('Email Not Send);</script>";
}
}else{
     echo "<script>alert('All ready Subscribe');</script>";
}
//  header("Location:".base_url.$_SERVER['REDIRECT_URL']); 
?>
<script>
    // window.location.href='<?= base_url.$_SERVER['REDIRECT_URL'] ?>';
    window.location.href='<?= $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".$_SERVER['REDIRECT_URL'] ?>';
</script>
<?php
 }
//  print_r($_SERVER);
?> 

 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Ubuntu:wght@500&display=swap" rel="stylesheet">

<style>
    .paymode{width: 30%; margin: 20px auto;}
    @media screen and (max-width: 460px)
    {
        .paymode{width: 100%; margin: 20px auto;}
    }
</style>






	<!-- footer -->
	<footer>
		
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer information -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="font-weight-bold mb-3" style="color: #6E6E6E; text-transform: uppercase; font-family: 'Ubuntu', sans-serif; font-size: 15px;"><?= information ?></h3>
    					<ul>
    					     <?php if($footerMenu->num_rows > 0){
                                while($ftmenu= towfetch($footerMenu)){ ?>
                                    <li class="mb-3"><a href="<?= base_url ?><?= $ftmenu['post_url']?>"><?= $ftmenu[$title_field]?></a></li>
                               <?php  }
                               }
                            ?> 
    					</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="font-weight-bold mb-3" style="color: #6E6E6E; text-transform: uppercase; font-family: 'Ubuntu', sans-serif; font-size: 15px;"><?= quick_links ?></h3>
						<ul>
						    <li class="mb-3"><a href="<?= base_url ?>contact"><?= contact_us ?></a></li>
						    <li class="mb-3"><a href="<?= base_url ?>sitemap.xml" target="_blank">Site Map</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="font-weight-bold mb-3" style="color: #6E6E6E; text-transform: uppercase; font-family: 'Ubuntu', sans-serif; font-size: 15px;"><?= get_in_touch ?></h3>
						<ul>
							<li class="mb-3" style="color: #66667B;" >
								<img src="images/map.png" style="width: 18px; height: 16px;"> Riviera 3, Abidjan, Cote d'Ivoire</li>
						
							<li class="mb-3" style="color: #66667B;">
									<img src="images/mobile.png" style="width: 24px; height: 18px;">+225 07 02 56 02 40 </li>
							<li class="mb-3" style="color: #66667B;">
								<img src="images/envelop.png" style="width: 18px; height: 16px;">
								<a href="inquiry@feminineafrica.com">&nbsp;inquiry@feminineafrica.com</a>
							</li>
							
							<li class="mb-3" style="color: #66667B;">
							<a href="https://www.instagram.com/feminineafrica/" target="_blank"><span><img src="images/instagram.png" style="width: 20px; height: 18px;"> @feminineafrica</span>
							</a></li>
								<li class="mb-3" style="color: #66667B;">
							<a href="https://www.youtube.com/channel/UCepcCf9SScPmSq0KGWxL8RQ" target="_blank"><span><img src="images/youtube.png" style="width: 20px; height: 18px;"> Feminine Africa</span>
							</a></li>
							
							
						</ul>
					</div>
						</div>
				<!-- //quick links -->
				<div class="row footer-info w3-agileits-info">
				    <div class="col-md-6 col-sm-6 footer-grids">
				        	<h3 class="font-weight-bold mb-3" style="color: #6E6E6E; text-transform: uppercase; font-family: 'Ubuntu', sans-serif; font-size: 15px;"><?= newsletter ?></h3>
    				            <p style="font-size: 12px; line-height: 18px; margin-top: 5px;font-family: 'Sora', sans-serif !important;">
                                  <?= newsletter_text ?>
                                 </p>
                                 <form method="post">
                                 <div class="input-group">
                                  <input type="email" name="subEmail" id="subEmail"  class="form-control" placeholder="Enter Your Email" style="border-color: #1A2A46; border-radius: 0;">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" style="background: #000; border-radius: 0; color: #fff; border-color: #1A2A46;"><?= join_now ?></button>
                                  </span>
                                </div>
                                </form>
				        	</div>
				        	 <div class="col-md-6 col-sm-6 footer-grids" style="padding-top: 17px;">
				        	     	<h3 class="font-weight-bold mb-3" style="color: #6E6E6E; text-transform: uppercase; font-family: 'Ubuntu', sans-serif; font-size: 15px;"><?= we_accept ?></h3>
    <img src="images/pay-mode.png" style="width: 100%; margin-top: -10px;">
				        	 </div>
				    	</div>
			</div>
		</div>
		<!-- //footer third section -->

		<!-- footer fourth section -->
		
		<!-- //footer fourth section (text) -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center" style="color: #2D2D2D;">© <?= date('Y')?> <?= footer_msg ?> Feminine Africa.
			</p>
		</div>
	</div>
	<!-- //copyright -->
	<style>
	    @media screen and (min-width: 460px)
	    {
	        .didn{display: none;}
	    }
	</style>
       <div class="container-fluid didn" style="background: #fff; padding:0; height: 42px; border-top: 1px solid #000; position: fixed; z-index: 5;  width: 100%; bottom: 0;">
             <div class="row" style="text-align: center; padding: 0;">
                    <div class="col">
                        <a href="<?= base_url ?>"><img src="<?= base_url?>images/home-icon.png" alt="home icon" style="text-align: center;margin-bottom: 17px;color:#fff;width:30px; margin-top: 2px;"></a>
                    </div>
                    <div class="col">
                        <a href="javascript:;"><img id="serachDataft" src="<?= base_url?>images/search-icon.png" alt="search icon" style="text-align: center;margin-bottom: 17px;color:#fff;width:35px;"></a>
                    </div>
                    <div class="col">
                        <a href="<?= base_url ?>orders"><img src="<?= base_url?>images/profile.png" alt="profile icon" style="text-align: center;margin-bottom: 17px;color:#fff;width:35px;"></a>
                    </div>
                    <div class="col"> 
                        <a href="<?= base_url ?>orders"><img src="<?= base_url?>images/icon.png" alt="heart icon" style="text-align: center;margin-bottom: 17px;color:#fff;width:28px; margin-top: 3.5px;"></a>
                   </div> 
                    <div class="col">
                        <a href="<?= base_url ?>checkout_m"><img src="<?= base_url?>images/cart-icon.png" alt="cart icon" style="text-align: center;margin-bottom: 17px;color:#fff;width:36px; margin-top: -2px;">
                        <span class="badge" style="top:-10px; position: relative; margin-left: -8px; background: #000 !important; color:#fff;" id="cartValueft">
                <?= townum($cart) ?></span></a>
                    </div>
            </div>
        </div>






	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="<?= base_url ?>js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="<?= base_url ?>js/minicart.js"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
// 		window.onload = function () {
// 			document.getElementById("password1").onchange = validatePassword;
// 			document.getElementById("password2").onchange = validatePassword;
// 		}

// 		function validatePassword() {
// 			var pass2 = document.getElementById("password2").value;
// 			var pass1 = document.getElementById("password1").value;
// 			if (pass1 != pass2)
// 				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
// 			else
// 				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
// 		}
	</script>
	<!-- //password-script -->
	
	<!-- scroll seller -->
	<script src="<?= base_url ?>js/scroll.js"></script>
	<!-- //scroll seller -->
	<!-- imagezoom -->
	<script src="<?= base_url ?>js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="<?= base_url ?>css/flexslider.css" type="text/css" media="screen" />

	<script src="<?= base_url ?>js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
	<!-- smoothscroll -->
	<script src="<?= base_url ?>js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="<?= base_url ?>js/move-top.js"></script>
	<script src="<?= base_url ?>js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="<?= base_url ?>js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	
	
<script>
    function add_to_cart(id){
        let brand_name=$('#brand_name').val();
        let color_name=$('#selected_color').val();
        let size_name=$('#size_name').val();
        
      if(color_name!=""){
          if(size_name!=""){
            $.post("<?= base_url ?>add_to_cart.php",
                {
                  id: id ,brand:brand_name,color:color_name,size:size_name
                },
                 function(data,status) {
                     var obj = jQuery.parseJSON(data);
                     $('#cartValue').html(obj.cartValue);
                     $('#cartValueft').html(obj.cartValue);
                     $.LoadingOverlay("show");
                     setTimeout(function () {
                         $.LoadingOverlay("hide");
                         Swal.fire({'showConfirmButton':false, 'title': '<?=cart_alert ?>', 'icon': 'success', 'timer': 2000,
                         })
                     }, 2500);
                 });
                
          }else{
              alert('Select Size first');
          }
      }else{
        alert('Select Color first');   
      }
    }
</script>
<script>
$('#serachData').click(function(){
    $('#searchBar').show();
    
});
$('#serachDataft').click(function(){
    $('#searchBar').show();
    
});
$('#closedBar').click(function(){
    $('#myInput').val('');
    $('#searchBar').hide();
    
});
function myFunction() {
        $(".auto-sresult").show();
        $("#resultAutoSugg").css("padding","20px");
        $("#resultAutoSugg").html("<p class='load'>Loading...</p>");
        let search= $('#myInput').val();
        // console.log(search);
            // alert(search);
        $.ajax({
           url: "<?= base_url ?>admin/classes/search.php",
           type: "POST",
           data: {search},
           success: function(res) {
               console.log(res)
               if($.trim(res)==''){
                   $("#resultAutoSugg").css("padding","20px");
                   $("#resultAutoSugg").html("<p class='load'>No matches found!</p>");
               }else{
                   $("#resultAutoSugg").css("padding","0px");
                   $("#resultAutoSugg").html(res);
               }
           }
                
            });
}
</script>

<script>
    $("#currencyy").change(()=>{
           $.ajax({
                headers: { "Accept": "application/json"},
                url: 'https://free.currconv.com/api/v7/convert?apiKey=a5c417459a6b2b90afca&q=XAF_'+$("#currency").val()+'&compact=ultra',   
                crossDomain: true,
                success: function(responce) {
                console.log(responce['XAF_'+$("#currency").val()]);
                const price = responce['XAF_'+$("#currency").val()];
               
      $.ajax({
          url: "<?= base_url ?>admin/classes/setCurrency.php",
          method: "Post",
          data: {currency:$("#currency").val(),price : price},
          success: function(res){
              if($.trim(res)=='ok'){
                     location.reload();
                 }else{
                  alert("something went wrong");  
                  }
          }
      });

                            }
                        });
    });
</script>
<script>
$("#password-check").blur(function(){
$(".error").hide();

var hasError = false;
var passwordVal = $("#password").val();
var checkVal = $("#password-check").val();
	if (passwordVal == '') {
	$("#password").after('<span class="error">Please enter a password.</span>');
	hasError = true;
	$("#password").focus();
	} else if (checkVal == '') {
	$("#password-check").after('<span class="error">Please re-enter your password.</span>');
	hasError = true;
	$("#password-check").focus();
	} else if (passwordVal != checkVal ) {
	$("#password-check").after('<span class="error">Passwords do not match.</span>');
	hasError = true;
	$("#password-check").val('');
// 	$("#password-check").focus();
	}
	if(hasError == true) {return false;}


});  

</script>
<script>
function addtoWishlists(pid){
if(pid!=""){
// alert(pid);
$.ajax({
   url: "<?= base_url ?>admin/classes/addtoWishlist.php",
   type: "POST",
   data: {pid:pid},
   success: function(res){
       res = $.trim(res);
       if(res=='success'){
        //   $(".fa-heart").css("color","red");
           $("#fa-heart"+pid).css("color","red");
       }else if(res=='login'){
           window.location.href = '<?= base_url ?>login.php';
       }else if(res=='removed'){
           alert('Product Remove From wishlist');
        //   $(".fa-heart").css("color","#000");
           $("#fa-heart"+pid).css("color","#000");
       }else{
           alert("Opps, something went wrong.");
       }
   }
});
}else{
alert("opps, something went wrong.");
}
}

</script>

<!--Add Code -->
<!--<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6154382125797d7a89016208/1fgofmhfd';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>-->


<style>

#myBtn {
  display: none;
  position: fixed;
  bottom: 80px;
  right: 10px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  
 
  cursor: pointer;
  
  border-radius: 4px;
}

</style>

<span class="klopi" style="z-index:4;"><a href="https://api.whatsapp.com/send?phone=2250702560240"><img src="<?= base_url?>/images/whatsapp-icon.png" style="width: 30px; height: 30px;" alt="whatsapp icon" ></a></span>
<p id="myBtn" title="" style="z-index: 5;"><a href="#"><img src="images/top.png" style="height:30px; width:30px; z-index:5;" alt="top icon" title=""></a></p>

   
   <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 160 || document.documentElement.scrollTop > 160) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>



<style>
     .klopi{position: fixed;
    bottom: 6% !important;
    left: 3px;
      z-index:1004; padding:1px; z-index: 5;}
    .klopi img{height:30px; width:30px; z-index: 4;}
    .klopi a{color:#fff;}
     .klopi1{position: fixed;
    bottom: 10%;
    right: 0px; background:none; z-index:1001; padding:3px;}
    .klopi1 img{height:50px; width:50px;}
    .klopi1 a{color:#fff;}
    
    @media screen and (max-width: 480px)
    {
        
    

 .klopi{position: fixed;
    bottom: 8%;
    right: 0px; 
    
    background:none; z-index:1001; padding:3px;}
        .klopi img{height:45px; width:45px; z-index: 5;}
    
    
</style>
<!--add code end-->
<!--filrter-->
<script>
     $('.common_selector').change(function(){
        // filter_data(1);
        this.form.submit();
    });

</script>

 
 <script>
     

$(".dropdown-toggle-pr").on('click', function () {
        $('.pr-menu').toggle();
      });

$(".dropdown-toggle-fltr").on('click', function () {
        $('.fltr-menu').toggle();
      });
$(".dropdown-toggle-sort").on('click', function () {
        $('.sort-menu').toggle();
      });
      
$(".dropdown-toggle-color").on('click', function () {
        $('.color-menu').toggle();
      }); 
      
$(".dropdown-toggle-size").on('click', function () {
        $('.size-menu').toggle();
      });    

$(".dropdown-toggle-pdtype").on('click', function () {
        $('.pdtype-menu').toggle();
      });        
 </script>
 
<script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        var change = false;
        if($( window ).width() < 600) {
            change = true;
            $('#navbarSupportedContent').attr('id', 'mySidenav');
            $("#mySidenav").removeClass("collapse");
            $("#mySidenav").addClass("sidenav");
        } else {
            if(change) {
                $('#mySidenav').attr('id', 'navbarSupportedContent');
                $("#navbarSupportedContent").removeClass("sidenav");
                $("#navbarSupportedContent").addClass("collapse");
            }
        }
    });
    function openNav() {
      console.log('working');
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    
    function proceedToCheckout() {
     
        var width = $( window ).width();
        console.log(typeof(width));
        if(width < 600) {
            console.log('inside');
            console.log(width);
            window.location = '<?= base_url ?>checkout_m';
        } else {
            console.log('outside');
            console.log(width);
            window.location = '<?= base_url ?>checkout';
        }

    }
</script>
 
</body>

</html>
        