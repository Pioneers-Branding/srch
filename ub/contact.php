<?php include('header.php');

 if(isset($_SERVER['REQUEST_METHOD']) && !empty($_POST['email'])){
   $ext = towrealarray($_POST);
     extract($ext);
     
$to = 'inquiry@feminineafrica.ci';
$from = $email;
$subject = "Inquiry From Feminine Africa";
$message = "";
$message .= "<center><img src='".base_url."img/header-logo.png' style='width: 40%; height: 95px;'></center>" ;
$message .= '<table class="table"">
  <thead>
    <tr>
      <th scope="col">Name</th><th scope="row">'.$name.'</th>
    </tr>
    <tr>
      <th scope="col">Email</th><th scope="row">'.$from.'</th>
    </tr>
    <tr>
      <th scope="col">Contact</th><th scope="row">'.$contact.'</th>
    </tr>
    <tr>
      <th scope="col">Schedule Date</th><th scope="row">'.$schedule_date.'</th>
    </tr>
    <tr>
      <th scope="col">Schedule Time</th><th scope="row">'.$schedule_time.'</th>
    </tr>
    <tr>
      <th scope="col">Message</th><th scope="row">'.strip_tags($messages).'</th>
    </tr>
  </thead>
</table>';

$revert_from = 'inquiry@feminineafrica.ci';
$user_header = "From: $revert_from \r\n";
$user_to = $email;
$user_subject = "Enquiry on feminineafrica";

$user_message = "";
$user_message .= 'Thanks for connect with us, we will connect you shortly!';

$header = "From: $from \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
$retval = mail($user_to, $user_subject, $user_message, $user_header);
if(mail($to, $subject, $message, $header)){
    $_POST = array();
    echo "<script>alert('Email Send.');</script>";
}else{
    echo "<script>alert('Email Not Send);</script>";
}
    header('Location:contact.php');
 }
?>


	<style>
	    @media screen and (max-width: 460px)
	    {
	         .llo{margin-top: -20px;}
	        .nnm{margin-top: 30px;}
	        .nnb{margin-top: 10px;}
	    }
	</style>
	 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
	    <div class="row">
	        <div class="col-md-8 llo">
	           <h5 style="font-family: 'Nunito Sans', sans-serif; font-size: 18px; font-weight: bold; margin-bottom: 15px;">
	                     <?= contactd ?>
	                 </h5>
	                 <div style="height: 0.5px; background: #333; width: 100%; margin-bottom: 20px;"></div>
	            <div class="row">
	                
	                <div class="col-12 col-sm-6">
	                    <img src="images/contact-img.jpg" style="width: 100%;">
	                </div>
	                <div class="col-12 col-sm-6 nnb">
	                    <p style="font-family: 'Nunito Sans', sans-serif; color: #000; font-size: 15px; font-weight: bold; margin-bottom: -5px;"><strong><?= storet ?></strong></p>
	                    <p style="   font-family: 'Poppins', sans-serif; color: #666; font-size: 12px; font-weight: bold; margin-top: -5px;"><?= storetime ?></p>
	                 
	                  <p style="font-family: 'Nunito Sans', sans-serif; color: #000; font-size: 15px; font-weight: bold; margin-top:10px;"><strong><?= storeadd ?></strong></p>
	                    <p style=" font-family: 'Poppins', sans-serif; color: #666; font-size: 12px; font-weight: bold; margin-top: -5px;"> Riviera 3, Abidjan, Cote d'Ivoire</p>
	                   
	                    <p style="font-family: 'Nunito Sans', sans-serif; color: #000; font-size: 15px; font-weight: bold; margin-top:10px;"><strong><?= contactwht ?></strong></p>
	                    <p style=" font-family: 'Poppins', sans-serif;color: #666; font-size: 12px; font-weight: bold; margin-top: -5px;">+225 07 00 77 89 82</p>
	                </div>
	           </div>
	        </div>
	        <div class="col-md-4">
	            <div class="row">
	             <div class="col-12 nnm">
	                 
	                 <h5 style="font-family: 'Nunito Sans', sans-serif; font-size: 18px; font-weight: bold; margin-bottom: 15px;">
	                     <?= bookap ?>
	                 </h5>
	                 <div style="height: 0.5px; background: #333; width: 100%; margin-bottom: 20px;"></div>
	                 	<form id="contact" method="post" class="form" role="form">
<div class="row">
<div class="col-md-12 form-group">
<input class="form-control" id="name" name="name" placeholder="<?= name ?>" type="text" required >
</div>
<div class="col-md-12 form-group">
<input class="form-control" id="email" name="email" placeholder="<?= email ?>" type="email" required>
</div>
<div class="col-md-12 form-group">
<input class="form-control" id="name" name="contact" placeholder="<?= contact ?>" type="tel" >
</div>
<div class="col-md-12 form-group">
<input class="form-control" id="datepicker" name="schedule_date" placeholder="<?= scdate ?>"  type="text" required>
</div>
<div class="col-md-12 form-group">
<!--<input class="form-control timepicker" id="timepicker" name="schedule_time" placeholder="<?= sctime ?>" type="text" required>-->
<select name="schedule_time" class="form-control">
    <option  value=""><?= sctime ?></option>
    <option  value="10:00H">10:00H</option>
    <option  value="10:30H">10:30H</option>
    <option  value="11:00H">11:00H</option>
    <option  value="11:30H">11:30H</option>
    <option  value="12:00H">12:00H</option>
    <option  value="12:30H">12:30H</option>
    <option  value="13:00H">13:00H</option>
    <option  value="13:30H">13:30H</option>
    <option  value="14:00H">14:00H</option>
    <option  value="14:30H">14:30H</option>
    <option  value="15:00H">15:00H</option>
    <option  value="15:30H">15:30H</option>
    <option  value="16:00H">16:00H</option>
    <option  value="16:30H">16:30H</option>
    <option  value="17:00H">17:00H</option>
    <option  value="17:30H">17:30H</option>
    <option  value="18:00H">18:00H</option>
</select>


</div>
<div class="col-md-12 form-group">
<textarea class="form-control" id="messages" name="messages" placeholder="<?= message ?>" rows="5" required></textarea>
</div>
</div>
<div class="col-md-12 form-group" style="padding: 0;">
<button class="btn btn-primary" style="background: #000;font-family: 'Nunito Sans', sans-serif; color: #fff; text-align: center; border-radius: 0; border: none; width: 100%;" type="submit"><?= submit ?></button>


</div>
</form>
	             </div>
	        </div>
	    </div></div>
	</div>
	
		<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  var dateToday = new Date(); 

  $( function() {
    $( "#datepicker" ).datepicker(
        {
        numberOfMonths: 1,
        showButtonPanel: true,
        minDate: dateToday
    }
        );
  } );
  
    
  </script>
	
	<script>
	    $('.timepicker').timepicker  
(  
    {  
   timeFormat: 'HH:mm', 
    dynamic: false,  
    dropdown: true, 
    startTime: '10:00',
     maxTime: '18:00',
      minTime: '10',
    scrollbar: true,
    use24hours: true
    }  
);  
	</script>

<?php include('footer.php');?>