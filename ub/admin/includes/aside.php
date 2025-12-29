 <?php 
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
        $classMasterObject = new classMaster();
        
        
   }
   else{
       header("location:login");
   }
      ?> 
      <!--language  -->
   <!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
 

<script type="text/javascript">
 $(document).ready(function(){ 
     
 jQuery('.lang-select').click(function() {
      var theLang = jQuery(this).attr('data-lang');
      jQuery('.goog-te-combo').val(theLang);
   
    if(theLang =='en'){ 
        //   $.cookie('eleLangA','/en/en');
         setCookie('eleLangA','/en/en');
        //   alert('set cokie');
        }else{
        //   $.cookie('eleLangA','/en/fr');
         setCookie('eleLangA','/en/fr');
        }
        
// alert(theLang);
// alert(jQuery(this).attr('href'));

      window.location = jQuery(this).attr('href');
      location.reload();
    });

     
     let hashValue = window.location.hash;
    //  alert(hashValue);
    //  let lang= $.cookie('eleLangA');
     let lang= getCookie('eleLangA');
     let googtrans= getCookie('googtrans');
    //  let googtrans= $.cookie('googtrans');
    //  alert(lang);
     if(lang=='/en/en' && googtrans =='/en/fr'){
        //  alert('checked english');
         var url = window.location.href;
        //  alert(url);
         if(hashValue!=''){
             window.location.href = url;
         }else{
          window.location.href = url+"#googtrans(en|en)";
        //     location.reload();
         }
     }
 });
 
 
 function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    }

    function triggerHtmlEvent(element, eventName) {
      var event;
      if (document.createEvent) {
        event = document.createEvent('HTMLEvents');
        event.initEvent(eventName, true, true);
        element.dispatchEvent(event);
      } else {
        event = document.createEventObject();
        event.eventType = eventName;
        element.fireEvent('on' + event.eventType, event);
      }
    }
    

</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      
      
     <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
       <!-- <li class=" nav-item"><a href="#"><i class="fa fa-sliders"></i><span class="menu-title"><?= $classMasterObject->language_flag(); ?>
             <?= $classMasterObject->language(); ?></span></a>
            <ul class="menu-content">
              <li><a href="#googtrans(en|en)" class="lang-en lang-select menu-item" data-lang="en">
	                <span class="flag-icon flag-icon-us"></span> English
	                    </a>
              </li>
              <li>
			   <a href="#googtrans(en|fr)" class="lang-es lang-select menu-item" data-lang="fr">
	         <span class="flag-icon flag-icon-fr"></span>French</a>
              </li>
              
            </ul>
          </li>-->
    
     <li class=" navigation-header"> <span> General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          
          <li class=" nav-item"><a href="index"><i class="fa fa-dashboard"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
          </li>
           <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Slider</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-slider" >View Slider</a>
              </li>
              <li><a class="menu-item" href="add-slider" >Add Slider</a>
              </li>
              
            </ul>
          </li>
          <!--<li class=" nav-item"><a href="#"><i class="fa fa-sliders"></i><span class="menu-title">Page</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-page" >View Page</a></li>
              <li><a class="menu-item" href="add-page" >Add Page</a></li>
            </ul>
          </li>-->
             <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Category</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-category" >View Category</a>
              </li>
              <li><a class="menu-item" href="add-category" >Add Category</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Sub Category</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-sub-category" >View Sub Category</a>
              </li>
              <li><a class="menu-item" href="add-sub-category" >Add Sub Category</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Child Category</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-child-category" >View Child Category</a>
              </li>
              <li><a class="menu-item" href="add-childcategory" >Add Child Category</a>
              </li>
            </ul>
          </li>
        <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Brand</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-brand" >View Brand</a>
              </li>
              <li><a class="menu-item" href="add-brand" >Add Brand</a>
              </li>
              
            </ul>
          </li>
         <!-- <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Size</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-size" >View Size</a>
              </li>
              <li><a class="menu-item" href="add-size" >Add Size</a>
              </li>
              
            </ul>
          </li>-->
         <!-- <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Color</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-color" >View Color</a>
              </li>
              <li><a class="menu-item" href="add-color" >Add Color</a>
              </li>
              
            </ul>
          </li>-->
          <!-- <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title">Product Type</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-productType" >View Type</a>
              </li>
              <li><a class="menu-item" href="add-productType" >Add Type</a>
              </li>
              
            </ul>
          </li>-->
               <li class=" nav-item"><a href="#"><i class="fa fa-shopping-bag"></i><span class="menu-title">Product</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-product" >View Product</a>
              </li>
              <li><a class="menu-item" href="add-product" >Add Product</a>
              </li>
              
            </ul>
          </li>
                <!--<li class=" nav-item"><a href="#"><i class="fa fa-tags"></i><span class="menu-title">Coupons</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-coupon" >View Coupons</a>
              </li>
              <li><a class="menu-item" href="add-coupon" >Add Coupons</a>
              </li>
           
            </ul>
          </li>-->
        <li class=" nav-item"><a href="#"><i class="fa fa-user"></i><span class="menu-title">Users</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-user" >View Users</a>
              </li>
              <li><a class="menu-item" href="add-user" >Add Users</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-money"></i><span class="menu-title">Orders</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="view-invoice.php" >View Orders</a></li>
            <li><a class="menu-item" href="view-cancelOrder.php" >Cancel Orders</a></li>
            </ul>
          </li>
           <!--<li class=" nav-item"><a href="#"><i class="fa fa-gear"></i><span class="menu-title">Setting</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="system-setting.php" >SEO</a></li>
              <li><a class="menu-item" href="view-subemail.php" >Subscribe</a></li>
            
            </ul>
          </li>-->
          <!--<li class=" nav-item"><a href="password-change"><i class="fa fa-cog"></i><span class="menu-title" data-i18n="settings">Change Password</span></a>
          </li>-->
        </ul>
      </div>
    </div>