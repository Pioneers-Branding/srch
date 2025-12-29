<?php include 'header.php';?>

    <!-- banner start -->



<script>

    $(document).ready(function(){

        $("#myModal").modal('show');

    });

    

    

    function copyToClipboard(element) {

  var $temp = $("<input>");

  $("body").append($temp);

  $temp.val($(element).text()).select();

  document.execCommand("copy");

  $temp.remove();

}

    

</script>





    <!-- Modal -->
 
   <!-- <div id="myModal" class="modal fade">

      <div class="modal-dialog modal-dialog-centered" role="document">

          

        <div class="modal-content rounded-0">

            <p class="cancel" data-dismiss="modal" ><img src="https://static.thenounproject.com/png/261420-200.png" style="width: 20px; height: 20px; position: absolute; right: 1%; top: 2%; z-index: 5;"></p>

          <div class="modal-body bg-4">



            

            <div class="d-flex main-content">

              <div class="bg-image promo-img mr-3" style="background-image: url('images/modal-image.jpeg');">

              </div>

              <div>

                <div class="text-center">

                  

                  <p style="font-family: 'Nunito Sans', sans-serif; margin-top: 10px; margin-bottom: 15px;">Feminine Africa fait une vente Black Friday ! Utilisez le code maintenant et profitez de -40% de réduction sur votre achat !</p>

                </div>

                <div class="coupon"  id="p1">

                 Blackfriday40

                </div>

                <p id="msg1" style="display: none;">Code ajouté avec succès</p>

                  <p id="show1"  onclick="copyToClipboard('#p1')" style="background: #000; padding-top: 5px; padding-bottom: 5px; font-size: 14px; text-align: center; color: #fff; width: 100%;font-family: 'Nunito Sans', sans-serif; padding-top: 4px; padding-bottom: 4px; border: none; ">Code à utiliser</p>

                <script>
$(document).ready(function(){
  
  $("#show1").click(function(){
    $("#msg1").show();
  });
});
</script>

               

              </div>

            </div>







            

          </div>

        </div>

      </div>

    </div> -->

    

    <style>

        

.content {

  height: 100vh; }



.modal {

  border-radius: 7px;

  overflow: hidden;

  background-color: transparent; }

  .modal .logo a img {

    width: 30px; }

  .modal .modal-content {

    background-color: transparent;

    border: none;

    border-radius: 7px; }

    .modal .modal-content .modal-body {

      border-radius: 7px;

      overflow: hidden;

      color: #fff;

      padding-left: 0px;

      padding-right: 0px;

      -webkit-box-shadow: 0 10px 50px -10px rgba(0, 0, 0, 0.9);

      box-shadow: 0 10px 50px -10px rgba(0, 0, 0, 0.9); }

      .modal .modal-content .modal-body h2 {

        font-size: 18px; }

      .modal .modal-content .modal-body p {

        color: #000;

        font-size: 14px; line-height: 20px; }

      .modal .modal-content .modal-body h3 {

        color: #000;

        font-size: 22px; }

      .modal .modal-content .modal-body .close-btn {

        color: #000; }

      .modal .modal-content .modal-body .promo-img {

        -webkit-box-flex: 0;

        -ms-flex: 0 0 150px;

        flex: 0 0 150px; }

  .modal .main-content {

    padding-left: 20px;

    padding-right: 20px; }

  .modal .coupon {

    padding: 10px;

    color: #000;

    text-align: center;

    background-color: #fff;

    border: 2px dashed #6c757d;

    margin-bottom: 20px; }

  .modal .cancel {

    color: gray;

    font-size: 14px; }



.form-control {

  border: transparent; }

  .form-control:active, .form-control:focus, .form-control:hover {

    -webkit-box-shadow: none !important;

    box-shadow: none !important; }





.bg-image {

  background-size: cover;

  background-position: center;

  background-repeat: no-repeat; }



.logo img {

  width: 70px; }



.bg-4 {

  background: #fff4e4; }

  

  @media screen and (max-width: 460px)

  {

      .modal .modal-content .modal-body .promo-img {

        -webkit-box-flex: 0;

        -ms-flex: 0 0 100px;

        flex: 0 0 100px; }

  }

  

    </style>













    <style>

    

    @media screen and (max-width: 460px){

         .klm{margin-top: -10px;}

         

    }

       

    </style>

    <!--<img src="images/FEMININE20.png" style="width: 100%;">-->

    

    

    
<style>

    .carousel-item img{width: 100% !important; }

    .vvi{height: 300px; padding: 10px; margin-top: 60px; width: 98.5%; margin: 0 auto;}

    .vvi1{height: 570px;  margin-top: 60px; width: 100%; margin: 0 auto;background: black;}

    @media screen and (max-width: 460px)

    {

         .carousel-item img{width: 100% !important; height: 270px !important;}

         .vvi1{height: 145px; padding: 0; margin-top:-5px; width: 100%; background:#f7f7f7;}

         .vvi{height: 100px; padding: 10px; margin-top: 60px; width: 98.5%; margin: 5px auto;}

    

    }

</style>







<div id="trailer" class="section vvi1 d-flex justify-content-center embed-responsive embed-responsive-21by9" style="">

  <video class="embed-responsive-item"  autoplay loop muted playsinline   style="pointer-events: none;">

        <source src="video/cc_1.mp4" type="video/mp4" >

        Your browser does not support the video tag.

      </video>

</div>



<!--<div class="container-fluid">

    <div class="row">

        <div class="col-md-12" style="padding: 0;">

            <img src="images/cc.jpg" style="width: 100%;">

        </div>

    </div>

</div>

      -->

<!--<div class="container-fluid" style="margin-top: 20px;">

    <div class="row">

        <div class="col-sm-12">

            <img src="images/womens-day.webp" style="width: 100%;">

        </div>

    </div>

</div>-->





<style>

*::-webkit-media-controls-panel {



  display: none!important;



  -webkit-appearance: none;



}



*::--webkit-media-controls-play-button {



  display: none!important;



  -webkit-appearance: none;



}



*::-webkit-media-controls-start-playback-button {



  display: none!important;



  -webkit-appearance: none;



}

</style>





<!-- jQuery and JS bundle w/ Popper.js -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>







        <div class="container-fluid big-screen weekf" style="">

            <div class="row">

                <div class="col-sm-12">

                <h3 class="weekh" style="font-weight: bold;" ><?= weekf ?></h3>

       </div>

       

       <div class="col-sm-4">

           <a href="https://feminineafrica.ci/evening-dress" style="color: #000;"><img src="images/EVENING-REVERIES.jpg" style="width: 100%;">

           <h4 class="weekh4">ROBES D’APRÈS-MIDI</h4>

           </a>

           <p class="weekp">Allez hop! On se laisse caresser par la douce brise de l’après-midi, et quoi de mieux qu’une maxi dress ou encore une robe fluide qui laissera le vent nous donner les allures d’une héroïne! </p>

       <a href="https://feminineafrica.ci/evening-dress" style="color: #000;"><h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 18px;"><?= shopn ?> <i class="fa fa-angle-right" style="position: relative; top: 2px;"></i></h4>

       </a></div>

       

       <div class="col-sm-4">

           <a href="https://feminineafrica.ci/working-outfit" style="color: #000;">

               <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 18px;">POUR ALLER

TRAVAILLER</h4></a>

           <p class="weekp">Ici on se doit d’avoir une bonne mise et d’être impeccable! Dis-moi ce que tu portes je te dirai qui tu es! </p>

       <a href="https://feminineafrica.ci/working-outfit" style="color: #000;"><h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 18px;"><?= shopn ?> <i class="fa fa-angle-right" style="position: relative; top: 2px;"></i></h4>

      

           <img src="images/POUR-ALLER-TRAVAILLER.jpg" style="width: 100%; margin-top: 15px;">

           </a> </div>

       

       <div class="col-sm-4">

           <a href="https://feminineafrica.ci/pyjama-nuisettte" style="color: #000;"><img src="images/POUR-LE-DODO.jpg" style="width: 100%;">

           <h4 class="weekh4">Pyjama & Nuisettte</h4>

           </a><p class="weekp">Faites de beaux rêves en couleurs dans nos pyjamas, déshabillés et etc… </p>

       <a href="https://feminineafrica.ci/pyjama-nuisettte" style="color: #000;"><h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 18px;"><?= shopn ?> <i class="fa fa-angle-right" style="position: relative; top: 2px;"></i></h4>

       </a></div>

       

       

       </div>

       </div>

      

      

      

        <div class="container small-screen" style="margin-top: 20px;background-color: #fff; padding-top: 30px; padding-bottom: 30px; margin-top: 0px;">

            <div class="row">

                <div class="col-sm-12">

                <h3 style="font-family: 'Varela Round', sans-serif; text-align: center;margin-bottom: 10px; font-weight: bold; font-size: 16px; "><?= weekf ?></h3>

       </div>

       

       <div class="col-sm-12">

           <a href="https://feminineafrica.ci/evening-dress" style="color: #000;">

               <img src="images/EVENING-REVERIES.jpg" style="width: 100%;">

           <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; margin-top: 15px; font-size: 18px;">ROBES D’APRÈS-MIDI</h4>

           </a><p style="text-align: center;font-family: 'Nunito Sans', sans-serif !important; line-height: 20px; font-size: 12px; color: #999; margin-top: 12px; margin-bottom: 12px;">Allez hop! On se laisse caresser par la douce brise de l’après-midi, et quoi de mieux qu’une maxi dress ou encore une robe fluide qui laissera le vent nous donner les allures d’une héroïne!</p>

       <a href="https://feminineafrica.ci/evening-reveries" style="color: #000;"><h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 18px;"><?= shopn ?> <i class="fa fa-angle-right" style="position: relative; top: 2px;"></i></h4>

       </a>

       </div>

       

       <div class="col-sm-12" style="margin-top: 40px;">

           <a href="https://feminineafrica.ci/working-outfit" style="color: #000;">

               <img src="images/POUR-ALLER-TRAVAILLER.jpg" style="width: 100%;">

          <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; margin-top: 15px; font-size: 18px;">POUR ALLER

TRAVAILLER</h4>

           </a>

           <p style="text-align: center;font-family: 'Nunito Sans', sans-serif !important; line-height: 20px; font-size: 12px; color: #999; margin-top: 12px; margin-bottom: 12px;">Ici on se doit d’avoir une bonne mise et d’être impeccable! Dis-moi ce que tu portes je te dirai qui tu es!</p>

      

       <a href="https://feminineafrica.ci/working-outfit" style="color: #000;">

           <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 18px;"><?= shopn ?> <i class="fa fa-angle-right" style="position: relative; top: 2px;"></i></h4>

      

            </a>

           

           

           

           </div>

       

       <div class="col-sm-12" style="margin-top: 40px;">

           <a href="https://feminineafrica.ci/sweet-dreams" style="color: #000;"><img src="images/POUR-LE-DODO.jpg" style="width: 100%;">

           <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; margin-top: 15px; font-size: 18px;">POUR LE DODO</h4>

           </a><p style="text-align: center;font-family: 'Nunito Sans', sans-serif !important; line-height: 20px; font-size: 12px; color: #999; margin-top: 12px; margin-bottom: 12px;">Faites de beaux rêves en couleurs dans nos pyjamas, déshabillés et etc…</p>

       <a href="https://feminineafrica.ci/sweet-dreams" style="color: #000;"><h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 18px;"><?= shopn ?> <i class="fa fa-angle-right" style="position: relative; top: 2px;"></i></h4>

       </a></div>

       

       

       </div>

       </div>

        

        

        <style>
  
          .invisible_brand {display: none;}


            .ss22 img{height: 500px;}

            

            @media screen and (max-width: 460px)

            {

                .ss22{margin-bottom: 22px;}

                .ss22 img{height: 250px; }

                 .big-screen{display: none;}

            }

             @media screen and (min-width: 460px){

                 .small-screen{display: none;}

             }

        </style>

        

       <!-- <div id="trailer" class="section vvi d-flex justify-content-center embed-responsive embed-responsive-21by9" style="">

  <video class="embed-responsive-item" autoplay loop muted playsinline>

        <source src="video/banniere_1.mp4" type="video/mp4" >

        Your browser does not support the video tag.

      </video>

</div>-->

      
       <div class="container-fluid " style="margin-top: 20px;background-color: rgb(249, 249, 249); padding-top: 30px; padding-bottom: 30px; ">

            <div class="row">

                <div class="col-sm-12">

                <h3 style="font-family: 'Varela Round', sans-serif; text-align: center;margin-bottom: 20px; font-weight: bold; font-size: 20px; "><?= trndin ?></h3>

       </div>

                <div class="col-6 col-sm-3 ss22">

                   <a href="https://feminineafrica.ci/dress"> <img src="images/ROBES.jpg" style="width: 100%;">

                    <p class="tranding-text">DRESS  <i class="fa fa-angle-right" style="position: relative; top: 0px;"></i></p>

               </a> </div>

                <div class="col-6 col-sm-3 ss22">

                    <a href="https://feminineafrica.ci/tops"><img src="https://feminineafrica.ci/admin/assets/tory-burch-blue-embroidered-paige-ombre-striped-button-front-shirt-button-down-top-size-4-s-0-1-650-650.jpg" style="width: 100%;">

                    <p class="tranding-text">TOP   <i class="fa fa-angle-right" style="position: relative; top: 0px;"></i></p>

               </a> </div>

                <div class="col-6 col-sm-3 ss22">

                    <a href="https://feminineafrica.ci/trouser-skirt"><img src="https://feminineafrica.ci/admin/assets/Session%20Sans%20Titre0998-min.jpg" style="width: 100%;">

                    <p class="tranding-text" >SKIRT  <i class="fa fa-angle-right" style="position: relative; top: 0px;"></i> </p>

               </a> </div>

                

                <div class="col-6 col-sm-3 ss22">

                    <a href="https://feminineafrica.ci/jumpsuit"><img src="https://feminineafrica.ci/admin/assets/Combinaison-Back-Into-It.jpg" style="width: 100%;">

                    <p class="tranding-text">JUMPSUIT <i class="fa fa-angle-right" style="position: relative; top: 0px;"></i></p>

                </a></div>

                </div>

                </div>

                <style>

                    .tranding-text{text-align: center; color: #000;font-family: 'Nunito Sans', sans-serif; text-transform: uppercase;}

                    @media screen and (max-width: 460px)

                    {

                        .tranding-text{text-align: center; color: #000;font-family: 'Nunito Sans', sans-serif; text-transform: capitalize; font-size: 12px;}

                    

                    }

                </style>

        

        

         <!--<div class="container-fluid" style="margin-top: 20px;background-color: #fff; padding-top: 30px; padding-bottom: 30px; margin-top: 0px;">

            <div class="row">

                <div class="col-sm-12">

                <h3 style="font-family: 'Varela Round', sans-serif; text-align: center;margin-bottom: 40px; font-size: 20px; ">SHOP THE LOOK</h3>

       </div>

       

       <div class="col-sm-4">

           <a href="https://feminineafrica.ci/evening-reveries" style="color: #000;"><img src="https://www.linfodrome.com/media/article/images/thumb/75115-miss-sery-dorcas_xl.webp" style="width: 100%;">

           <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; margin-top: 15px; font-size: 18px;">B As Basics</h4>

           </a>

          </div>

       

     <div class="col-sm-4">

           <a href="https://feminineafrica.ci/evening-reveries" style="color: #000;"><img src="https://www.linfodrome.com/media/article/images/jpeg/75253-petite-lecon-de-style-avec-sery-dorcas.jpg" style="width: 100%;">

           <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; margin-top: 15px; font-size: 18px;">Sweet Dreams (PJs)</h4>

           </a>

          </div>

       

      <div class="col-sm-4">

           <a href="https://feminineafrica.ci/evening-reveries" style="color: #000;"><img src="https://lifemag-ci.com/wp-content/uploads/2014/06/Life-Mag-1600x12004.jpg" style="width: 100%; height: 255px;">

           <h4 style="text-align: center;font-family: 'Nunito Sans', sans-serif; margin-top: 15px; font-size: 18px;">Church Day</h4>

           </a>

          </div>

       

       

       </div>

       </div>

      -->

        



            

        <div class="container-fluid" style="margin-top: 20px;background-color: rgb(249, 249, 249); padding-top: 30px; padding-bottom: 30px; margin-bottom: 10px;  ">

            

                <div class="row">

                    

                    <div class="col-sm-12">

                <h3 style="font-family: 'Varela Round', sans-serif; text-align: center;margin-bottom: 20px; font-size: 20px; text-transform: uppercase; "><?= shop_by_brand ?></h3>

       </div>

                    

                    

                 <?php while($br = towfetch($brand)){
                    if(($br['brand_id']<= 1) || ($br['brand_id'] <= 12)){
                    ?>


                     <div class="col-6 col-sm-2" style="">

                         

                     

                 <div class="col-sm-12" style="background: #fff; margin-top: 20px;">

                       <a href="<?= base_url ?><?=$br['brand_url']?>">

                <img src="http://feminineafrica.ci/admin/assets/<?=$br['brand_image'];?>" style="width: 100%; height: 100px;">

                 
                </a>

             </div></div>

                

                  <?php }else{
                    ?>

                      
                     <div class="col-6 col-sm-2 invisible_brand" style="">

                         

                     

                 <div class="col-sm-12" style="background: #fff; margin-top: 20px;">

                       <a href="<?= base_url ?><?=$br['brand_url']?>">

                <img src="http://feminineafrica.ci/admin/assets/<?=$br['brand_image'];?>" style="width: 100%; height: 100px;">

                
                </a>

             </div></div>

                  <?php } }?>
                 <button  class="moreless-button btn primary" style="margin: 10px auto; background: #000; color: #fff;">View More</a>

            </div>

                </div>

            

        

            </div>

        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

  $('.moreless-button').click(function() {
  $('.invisible_brand').slideToggle();
  if ($('.moreless-button').text() == "Read more") {
     $(this).text("Read more")
  } else {
    $(this).text("View Less")
  }
});
  

</script>
 <script>
    $('#subemailform').on('submit',function(e){
      var form=$(this).serialize();
       e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'admin/classes/control.php',
            data: form,
            success: function(data){
             console.log(data);
             $('#myModal').modal('hide');
             alert("Nous vous prions de vérifier votre boîte mail pour l’utilisation de votre code coupon");
            },
     
      error: function (jqXHR, textStatus, errorThrown) {
    alert("Some problem occurred, please try again.");
      } 
        });
      })
    </script>


<?php include 'footer.php';?>