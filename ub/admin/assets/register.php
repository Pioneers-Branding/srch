<?php 

include("config.php");
session_start();
$error="";
$msg="";


	if(isset($_REQUEST['reg']))
	{
		$name=$_REQUEST['name'];
		$l_name=$_REQUEST['l_name'];
		$email=$_REQUEST['email'];
		$uphone=$_REQUEST['uphone'];
		$addres=$_REQUEST['addres'];
		$zip=$_REQUEST['zip'];
		$gender=$_REQUEST['gender'];
		$state=$_REQUEST['state'];
		$dob=$_REQUEST['dob'];
		$uaadhar_number=$_REQUEST['uaadhar_number'];
		$upan_no=$_REQUEST['upan_no'];
		$uaadhar_front=$_REQUEST['uaadhar_front'];
		$uaadhar_back=$_REQUEST['uaadhar_back'];
		$upan_file=$_REQUEST['upan_file'];
		$bank_name=$_REQUEST['bank_name'];
		$uacc_num=$_REQUEST['uacc_num'];
		$area_no=$_REQUEST['area_no'];
		$acc_ho_name=$_REQUEST['acc_ho_name'];
		$ifsc=$_REQUEST['ifsc'];
		$cheque=$_REQUEST['cheque'];
		$pass=$_REQUEST['password'];
			 	$associate_status ="0";
        $c_password=$_REQUEST['c_password'];
		$referralcode=$_REQUEST['referralcode'];
		$referral_code2=$_REQUEST['allreferralcode'];
	if($_REQUEST['allreferralcode']=="" || $_REQUEST['allreferralcode']==","){
			$referral_code2="";
		}
		$referralcode1=$_REQUEST['referralcode1'];
		if($_REQUEST['referralcode1']==""){
			$referralcode1="";
		}
		$allreferralcode = $referralcode1.",". $referral_code2;
		if($_REQUEST['allreferralcode']==""){
	
			$allreferralcode=$referralcode1;
		}
		$aa = mt_rand(1111,9999);
	    $FourDigitRandomNumber =("RB".$aa);
		
		$uaadhar_front=$_FILES['uaadhar_front']['name'];
		$uaadhar_back=$_FILES['uaadhar_back']['name'];
		$upan_file=$_FILES['upan_file']['name'];
		$cheque=$_FILES['cheque']['name'];
	
		$uaadhar_front1 = $_FILES['uaadhar_front']['tmp_name'];
		$uaadhar_back1 = $_FILES['uaadhar_back']['tmp_name'];
		$upan_file1 = $_FILES['upan_file']['tmp_name'];
		$cheque1 = $_FILES['cheque']['tmp_name'];
		
		$query = "SELECT * FROM user where uemail='$email'";
		$res=mysqli_query($con, $query);
		$num=mysqli_num_rows($res);
		
		if($num == 1)
		{
			$error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
		}
		else
		{
			
			if(!empty($name))
			{
				
				$sql="INSERT INTO user1 (uname,l_name,uemail,uphone,upass,uimage,code,allreferralcode,referralcode,addres,state,zip,gender,dob,uaadhar_number,upan_no,uaadhar_front,uaadhar_back,upan_file,bank_name,uacc_num,area_no,acc_ho_name,ifsc,cheque,c_password, 	associate_status)
			 VALUES ('$name','$l_name','$email','$uphone','$pass','$uimage','$FourDigitRandomNumber','$allreferralcode','$referralcode','$addres','$state','$zip','$gender','$dob','$uaadhar_number','$upan_no','$uaadhar_front','$uaadhar_back','$upan_file','$bank_name','$uacc_num','$area_no','$acc_ho_name','$ifsc','$cheque','$c_password','$associate_status ')";
				
				$result=mysqli_query($con, $sql);
			      	
				   if($result){
                         move_uploaded_file($uaadhar_front1,"admin/user/$uaadhar_front");
			           	 move_uploaded_file($uaadhar_back1,"admin/user/$uaadhar_back");
				         move_uploaded_file($upan_file1,"admin/user/$upan_file");
			             move_uploaded_file($cheque1,"admin/user/$cheque");
					$sql="  INSERT INTO tree_users (child_user, parent_user)
                  VALUES ('$FourDigitRandomNumber', '$referralcode')";
				
				  $result1=mysqli_query($con, $sql);
				  if($result1){
					   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
				  }
				   }
				   else{
					   $error = "<p class='alert alert-warning'>Register Not Successfully</p> ";
				   }
			}else{
				$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
			}
		}
		
	}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--	Fonts
	========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!--	Css Link
	========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <!--	Title
	=========================================================-->
    <title>Real Biz - Indore</title>
    <style>
    label {
        font-weight: 600;
        /* color: #666; */
        color: black;

    }

    body {
        background: #f1f1f1;
    }

    .box8 {
        box-shadow: 0px 0px 5px 1px #999;
    }

    .mx-t3 {
        margin-top: -3rem;
    }
    </style>
</head>

<body>

    <!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
-->
    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->

            <!--	Banner   --->
            <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Register</b></h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Register</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner   --->


            <div class="container mt-5">
			<?php echo $error; ?><?php echo $msg; ?>
			<form method="post" enctype="multipart/form-data">
                    <div class="row jumbotron box8">
                        <div class="col-sm-12 mx-t3 ">
                            <!-- <h2 class="text-center " style="color:black;"><b>Fill Submit This Form</b></h2> -->
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name-f">*First Name</label>
                            <input type="text" class="form-control" name="name" id="name-f"
                                placeholder="Enter your first name." required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="name-l">*Last name</label>
                            <input type="text" class="form-control" name="l_name" id="name-l"
                                placeholder="Enter your last name." required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="email">*Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter your email." required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="tel">*Phone</label>
                            <input type="tel" name="uphone" class="form-control" id="tel"
                                placeholder="Enter Your Contact Number." required>
                        </div>



                        <div class="col-sm-6 form-group">
                            <label for="address-2">*Address </label>
                            <input type="address" class="form-control" name="address" id="address-2"
                                placeholder="Enter write address." required>
                        </div>


                        <div class="col-sm-4 form-group">
                            <label for="State">*State</label>
                            <input type="address" class="form-control" name="state" id="State"
                                placeholder="Enter your state name." required>
                        </div>


                        <div class="col-sm-2 form-group">
                            <label for="zip"> *Zip-Code</label>
                            <input type="zip" class="form-control" name="zip" id="zip" placeholder="Zip-Code." required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="sex"> *Gender</label>
                            <select id="sex" class="form-control browser-default custom-select" name="gender">
                                <option value="male">Male</option>
                                <option value="female"> Female</option>
                                <option value="unspesified"> Unspecified</option>
                            </select>
                        </div>


                        <div class="col-sm-6 form-group">
                            <label for="Date">*Date Of Birth</label>
                            <input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>

                        </div>

                        <!-- Documention  -->

                        <div class="col-12 my-2">
                            <h5 class="fs-normal m-0">Documents <code>*</code></h5>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="form-label fs-sm" for="associate_aadhar_card_no">*Aadhar Number
                            </label>
                            <input class="form-control form-control-sm" type="text" id="associate_aadhar_card_no"
                                name="uaadhar_number" placeholder="Write Aadhar Number" value="" required="">
                            <div class="invalid-feedback">Aadhar Number is required.</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="form-label fs-sm" for="associate_pan_no">*Pan Number </label>
                            <input class="form-control form-control-sm" type="text" id="associate_pan_no" name="upan_no"
                                placeholder="Write Pan Number" value="" required="">
                            <div class="invalid-feedback">Please write Pan No.</div>
                        </div>

                        <!--  -->
                        <div class="col-lg-4 mb-2">
                            <label for="file-aadharcard-front" class="form-label fs-sm">*Aadhar Card Front Attachment
                            </label>
                            <input class="form-control form-control-sm" accept="image/*" name="uaadhar_front"
                                type="file" id="file-aadharcard-front" required="">
                            <div class="invalid-feedback">Please select Aadhar Card Front Side attachment</div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <label for="file-aadharcard-back" class="form-label fs-sm">*Aadhar Card Back Attachment
                            </label>
                            <input class="form-control form-control-sm" accept="image/*" name="uaadhar_back" type="file"
                                id="file-aadharcard-back" required="">
                            <div class="invalid-feedback">Please select Aadhar Card Back Side attachment</div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <label for="file-pan-card" class="form-label fs-sm">*Pan Card Attachment
                            </label>
                            <input class="form-control form-control-sm" accept="image/*" name="upan_file" type="file"
                                id="file-pan-card" required="">
                            <div class="invalid-feedback">Please select Pan Card attachment</div>
                        </div>


                        <!-- Banking Information *  -->
                        <div class="col-12 my-2">
                            <h5 class="fs-normal m-0">Banking Information <code>*</code></h5>
                        </div>



                        <div class="col-lg-4 mb-2">
                            <label class="form-label fs-sm" for="select-sm">*Bank Name </label>
                            <!-- <span> Bank Name <code>*</code> </span> -->

                            <!-- <h5 class="fs-normal m-0">Banking Information <code>*</code></h5> -->
                            <select class="form-control browser-default custom-select" name="bank_name"
                                aria-label=".form-select-sm example">
                                <option value="" select="">Select Bank</option>
                                <option value="ABHYUDAYA CO-OP BANK LTD">ABHYUDAYA CO-OP BANK LTD</option>
                                <option value="ABU DHABI COMMERCIAL BANK">ABU DHABI COMMERCIAL BANK</option>
                                <option value="AKOLA DISTRICT CENTRAL CO-OPERATIVE BANK">AKOLA DISTRICT CENTRAL
                                    CO-OPERATIVE
                                    BANK</option>
                                <option value="AKOLA JANATA COMMERCIAL COOPERATIVE BANK">AKOLA JANATA COMMERCIAL
                                    COOPERATIVE
                                    BANK</option>
                                <option value="ALLAHABAD BANK">ALLAHABAD BANK</option>
                                <option value="ALMORA URBAN CO-OPERATIVE BANK LTD.">ALMORA URBAN CO-OPERATIVE BANK LTD.
                                </option>
                                <option value="ANDHRA BANK">ANDHRA BANK</option>
                                <option value="ANDHRA PRAGATHI GRAMEENA BANK">ANDHRA PRAGATHI GRAMEENA BANK</option>
                                <option value="APNA SAHAKARI BANK LTD">APNA SAHAKARI BANK LTD</option>
                                <option value="AUSTRALIA AND NEW ZEALAND BANKING GROUP LIMITED.">AUSTRALIA AND NEW
                                    ZEALAND
                                    BANKING GROUP LIMITED.</option>
                                <option value="AXIS BANK">AXIS BANK</option>
                                <option value="BANK INTERNASIONAL INDONESIA">BANK INTERNASIONAL INDONESIA</option>
                                <option value="BANK OF AMERICA">BANK OF AMERICA</option>
                                <option value="BANK OF BAHRAIN AND KUWAIT">BANK OF BAHRAIN AND KUWAIT</option>
                                <option value="BANK OF BARODA">BANK OF BARODA</option>
                                <option value="BANK OF CEYLON">BANK OF CEYLON</option>
                                <option value="BANK OF INDIA">BANK OF INDIA</option>
                                <option value="BANK OF MAHARASHTRA">BANK OF MAHARASHTRA</option>
                                <option value="BANK OF TOKYO-MITSUBISHI UFJ LTD.">BANK OF TOKYO-MITSUBISHI UFJ LTD.
                                </option>
                                <option value="BARCLAYS BANK PLC">BARCLAYS BANK PLC</option>
                                <option value="BASSEIN CATHOLIC CO-OP BANK LTD">BASSEIN CATHOLIC CO-OP BANK LTD</option>
                                <option value="BHARATIYA MAHILA BANK LIMITED">BHARATIYA MAHILA BANK LIMITED</option>
                                <option value="BNP PARIBAS">BNP PARIBAS</option>
                                <option value="CALYON BANK">CALYON BANK</option>
                                <option value="CANARA BANK">CANARA BANK</option>
                                <option value="CAPITAL LOCAL AREA BANK LTD.">CAPITAL LOCAL AREA BANK LTD.</option>
                                <option value="CATHOLIC SYRIAN BANK LTD.">CATHOLIC SYRIAN BANK LTD.</option>
                                <option value="CENTRAL BANK OF INDIA">CENTRAL BANK OF INDIA</option>
                                <option value="CHINATRUST COMMERCIAL BANK">CHINATRUST COMMERCIAL BANK</option>
                                <option value="CITIBANK NA">CITIBANK NA</option>
                                <option value="CITIZENCREDIT CO-OPERATIVE BANK LTD">CITIZENCREDIT CO-OPERATIVE BANK LTD
                                </option>
                                <option value="CITY UNION BANK LTD">CITY UNION BANK LTD</option>
                                <option value="COMMONWEALTH BANK OF AUSTRALIA">COMMONWEALTH BANK OF AUSTRALIA</option>
                                <option value="CORPORATION BANK">CORPORATION BANK</option>
                                <option value="CREDIT SUISSE AG">CREDIT SUISSE AG</option>
                                <option value="DBS BANK LTD">DBS BANK LTD</option>
                                <option value="DENA BANK">DENA BANK</option>
                                <option value="DEUTSCHE BANK">DEUTSCHE BANK</option>
                                <option value="DEUTSCHE SECURITIES INDIA PRIVATE LIMITED">DEUTSCHE SECURITIES INDIA
                                    PRIVATE
                                    LIMITED</option>
                                <option value="DEVELOPMENT CREDIT BANK LIMITED">DEVELOPMENT CREDIT BANK LIMITED</option>
                                <option value="DHANLAXMI BANK LTD">DHANLAXMI BANK LTD</option>
                                <option value="DICGC">DICGC</option>
                                <option value="DOMBIVLI NAGARI SAHAKARI BANK LIMITED">DOMBIVLI NAGARI SAHAKARI BANK
                                    LIMITED
                                </option>
                                <option value="FIRSTRAND BANK LIMITED">FIRSTRAND BANK LIMITED</option>
                                <option value="GOPINATH PATIL PARSIK JANATA SAHAKARI BANK LTD">GOPINATH PATIL PARSIK
                                    JANATA
                                    SAHAKARI BANK LTD</option>
                                <option value="GURGAON GRAMIN BANK">GURGAON GRAMIN BANK</option>
                                <option value="HDFC BANK LTD">HDFC BANK LTD</option>
                                <option value="HSBC">HSBC</option>
                                <option value="ICICI BANK LTD">ICICI BANK LTD</option>
                                <option value="IDBI BANK LTD">IDBI BANK LTD</option>
                                <option value="IDRBT">IDRBT</option>
                                <option value="INDIAN BANK">INDIAN BANK</option>
                                <option value="INDIAN OVERSEAS BANK">INDIAN OVERSEAS BANK</option>
                                <option value="INDUSIND BANK LTD">INDUSIND BANK LTD</option>
                                <option value="INDUSTRIAL AND COMMERCIAL BANK OF CHINA LIMITED">INDUSTRIAL AND
                                    COMMERCIAL BANK
                                    OF CHINA LIMITED</option>
                                <option value="ING VYSYA BANK LTD">ING VYSYA BANK LTD</option>
                                <option value="JALGAON JANATA SAHKARI BANK LTD">JALGAON JANATA SAHKARI BANK LTD</option>
                                <option value="JANAKALYAN SAHAKARI BANK LTD">JANAKALYAN SAHAKARI BANK LTD</option>
                                <option value="JANASEVA SAHAKARI BANK (BORIVLI) LTD">JANASEVA SAHAKARI BANK (BORIVLI)
                                    LTD
                                </option>
                                <option value="JANASEVA SAHAKARI BANK LTD. PUNE">JANASEVA SAHAKARI BANK LTD. PUNE
                                </option>
                                <option value="JANATA SAHAKARI BANK LTD (PUNE)">JANATA SAHAKARI BANK LTD (PUNE)</option>
                                <option value="JPMORGAN CHASE BANK N.A">JPMORGAN CHASE BANK N.A</option>
                                <option value="KALLAPPANNA AWADE ICH JANATA S BANK">KALLAPPANNA AWADE ICH JANATA S BANK
                                </option>
                                <option value="KAPOL CO OP BANK">KAPOL CO OP BANK</option>
                                <option value="KARNATAKA BANK LTD">KARNATAKA BANK LTD</option>
                                <option value="KARNATAKA VIKAS GRAMEENA BANK">KARNATAKA VIKAS GRAMEENA BANK</option>
                                <option value="KARUR VYSYA BANK">KARUR VYSYA BANK</option>
                                <option value="KOTAK MAHINDRA BANK">KOTAK MAHINDRA BANK</option>
                                <option value="KURMANCHAL NAGAR SAHKARI BANK LTD">KURMANCHAL NAGAR SAHKARI BANK LTD
                                </option>
                                <option value="MAHANAGAR CO-OP BANK LTD">MAHANAGAR CO-OP BANK LTD</option>
                                <option value="MAHARASHTRA STATE CO OPERATIVE BANK">MAHARASHTRA STATE CO OPERATIVE BANK
                                </option>
                                <option value="MASHREQBANK PSC">MASHREQBANK PSC</option>
                                <option value="MIZUHO CORPORATE BANK LTD">MIZUHO CORPORATE BANK LTD</option>
                                <option value="MUMBAI DISTRICT CENTRAL CO-OP. BANK LTD.">MUMBAI DISTRICT CENTRAL CO-OP.
                                    BANK
                                    LTD.</option>
                                <option value="NAGPUR NAGRIK SAHAKARI BANK LTD">NAGPUR NAGRIK SAHAKARI BANK LTD</option>
                                <option value="NATIONAL AUSTRALIA BANK">NATIONAL AUSTRALIA BANK</option>
                                <option value="NEW INDIA CO-OPERATIVE BANK LTD.">NEW INDIA CO-OPERATIVE BANK LTD.
                                </option>
                                <option value="NKGSB CO-OP BANK LTD">NKGSB CO-OP BANK LTD</option>
                                <option value="NORTH MALABAR GRAMIN BANK">NORTH MALABAR GRAMIN BANK</option>
                                <option value="NUTAN NAGARIK SAHAKARI BANK LTD">NUTAN NAGARIK SAHAKARI BANK LTD</option>
                                <option value="OMAN INTERNATIONAL BANK SAOG">OMAN INTERNATIONAL BANK SAOG</option>
                                <option value="ORIENTAL BANK OF COMMERCE">ORIENTAL BANK OF COMMERCE</option>
                                <option value="PARSIK JANATA SAHAKARI BANK LTD">PARSIK JANATA SAHAKARI BANK LTD</option>
                                <option value="PRATHAMA BANK">PRATHAMA BANK</option>
                                <option value="PRIME CO OPERATIVE BANK LTD">PRIME CO OPERATIVE BANK LTD</option>
                                <option value="PUNJAB AND MAHARASHTRA CO-OP BANK LTD.">PUNJAB AND MAHARASHTRA CO-OP BANK
                                    LTD.
                                </option>
                                <option value="PUNJAB AND SIND BANK">PUNJAB AND SIND BANK</option>
                                <option value="PUNJAB NATIONAL BANK">PUNJAB NATIONAL BANK</option>
                                <option value="RABOBANK INTERNATIONAL (CCRB)">RABOBANK INTERNATIONAL (CCRB)</option>
                                <option value="RAJGURUNAGAR SAHAKARI BANK LTD.">RAJGURUNAGAR SAHAKARI BANK LTD.</option>
                                <option value="RAJKOT NAGARIK SAHAKARI BANK LTD">RAJKOT NAGARIK SAHAKARI BANK LTD
                                </option>
                                <option value="RESERVE BANK OF INDIA">RESERVE BANK OF INDIA</option>
                                <option value="SBERBANK">SBERBANK</option>
                                <option value="SHINHAN BANK">SHINHAN BANK</option>
                                <option value="SHRI CHHATRAPATI RAJARSHI SHAHU URBAN CO-OP BANK L">SHRI CHHATRAPATI
                                    RAJARSHI
                                    SHAHU URBAN CO-OP BANK L</option>
                                <option value="SOCIETE GENERALE">SOCIETE GENERALE</option>
                                <option value="SOLAPUR JANATA SAHKARI BANK LTD.SOLAPUR">SOLAPUR JANATA SAHKARI BANK
                                    LTD.SOLAPUR
                                </option>
                                <option value="SOUTH INDIAN BANK">SOUTH INDIAN BANK</option>
                                <option value="STANDARD CHARTERED BANK">STANDARD CHARTERED BANK</option>
                                <option value="STATE BANK OF BIKANER AND JAIPUR">STATE BANK OF BIKANER AND JAIPUR
                                </option>
                                <option value="STATE BANK OF HYDERABAD">STATE BANK OF HYDERABAD</option>
                                <option value="STATE BANK OF INDIA">STATE BANK OF INDIA</option>
                                <option value="STATE BANK OF MAURITIUS LTD">STATE BANK OF MAURITIUS LTD</option>
                                <option value="STATE BANK OF MYSORE">STATE BANK OF MYSORE</option>
                                <option value="STATE BANK OF PATIALA">STATE BANK OF PATIALA</option>
                                <option value="STATE BANK OF TRAVANCORE">STATE BANK OF TRAVANCORE</option>
                                <option value="SUMITOMO MITSUI BANKING CORPORATION">SUMITOMO MITSUI BANKING CORPORATION
                                </option>
                                <option value="SYNDICATE BANK">SYNDICATE BANK</option>
                                <option value="TAMILNAD MERCANTILE BANK LTD">TAMILNAD MERCANTILE BANK LTD</option>
                                <option value="THANE BHARAT SAHAKARI BANK LTD">THANE BHARAT SAHAKARI BANK LTD</option>
                                <option value="THE A.P. MAHESH CO-OP URBAN BANK LTD.">THE A.P. MAHESH CO-OP URBAN BANK
                                    LTD.
                                </option>
                                <option value="THE AHMEDABAD MERCANTILE CO-OPERATIVE BANK LTD.">THE AHMEDABAD MERCANTILE
                                    CO-OPERATIVE BANK LTD.</option>
                                <option value="THE ANDHRA PRADESH STATE COOP BANK LTD">THE ANDHRA PRADESH STATE COOP
                                    BANK LTD
                                </option>
                                <option value="THE BANK OF NOVA SCOTIA">THE BANK OF NOVA SCOTIA</option>
                                <option value="THE BANK OF RAJASTHAN LTD">THE BANK OF RAJASTHAN LTD</option>
                                <option value="THE BHARAT CO-OPERATIVE BANK (MUMBAI) LTD">THE BHARAT CO-OPERATIVE BANK
                                    (MUMBAI)
                                    LTD</option>
                                <option value="THE COSMOS CO-OPERATIVE BANK LTD.">THE COSMOS CO-OPERATIVE BANK LTD.
                                </option>
                                <option value="THE DELHI STATE COOPERATIVE BANK LTD.">THE DELHI STATE COOPERATIVE BANK
                                    LTD.
                                </option>
                                <option value="THE FEDERAL BANK LTD">THE FEDERAL BANK LTD</option>
                                <option value="THE GADCHIROLI DISTRICT CENTRAL COOPERATIVE BANK L">THE GADCHIROLI
                                    DISTRICT
                                    CENTRAL COOPERATIVE BANK L</option>
                                <option value="THE GREATER BOMBAY CO-OP. BANK LTD">THE GREATER BOMBAY CO-OP. BANK LTD
                                </option>
                                <option value="THE GUJARAT STATE CO-OPERATIVE BANK LTD">THE GUJARAT STATE CO-OPERATIVE
                                    BANK LTD
                                </option>
                                <option value="THE JALGAON PEOPLES CO-OP BANK">THE JALGAON PEOPLES CO-OP BANK</option>
                                <option value="THE JAMMU AND KASHMIR BANK LTD">THE JAMMU AND KASHMIR BANK LTD</option>
                                <option value="THE KALUPUR COMMERCIAL CO. OP. BANK LTD.">THE KALUPUR COMMERCIAL CO. OP.
                                    BANK
                                    LTD.</option>
                                <option value="THE KALYAN JANATA SAHAKARI BANK LTD.">THE KALYAN JANATA SAHAKARI BANK
                                    LTD.
                                </option>
                                <option value="THE KANGRA CENTRAL CO-OPERATIVE BANK LTD">THE KANGRA CENTRAL CO-OPERATIVE
                                    BANK
                                    LTD</option>
                                <option value="THE KANGRA COOPERATIVE BANK LTD">THE KANGRA COOPERATIVE BANK LTD</option>
                                <option value="THE KARAD URBAN CO-OP BANK LTD">THE KARAD URBAN CO-OP BANK LTD</option>
                                <option value="THE KARNATAKA STATE APEX COOP. BANK LTD.">THE KARNATAKA STATE APEX COOP.
                                    BANK
                                    LTD.</option>
                                <option value="THE LAKSHMI VILAS BANK LTD">THE LAKSHMI VILAS BANK LTD</option>
                                <option value="THE MEHSANA URBAN COOPERATIVE BANK LTD">THE MEHSANA URBAN COOPERATIVE
                                    BANK LTD
                                </option>
                                <option value="THE MUNICIPAL CO OPERATIVE BANK LTD MUMBAI">THE MUNICIPAL CO OPERATIVE
                                    BANK LTD
                                    MUMBAI</option>
                                <option value="THE NAINITAL BANK LIMITED">THE NAINITAL BANK LIMITED</option>
                                <option value="THE NASIK MERCHANTS CO-OP BANK LTD. NASHIK">THE NASIK MERCHANTS CO-OP
                                    BANK LTD.
                                    NASHIK</option>
                                <option value="THE RAJASTHAN STATE COOPERATIVE BANK LTD.">THE RAJASTHAN STATE
                                    COOPERATIVE BANK
                                    LTD.</option>
                                <option value="THE RATNAKAR BANK LTD">THE RATNAKAR BANK LTD</option>
                                <option value="THE ROYAL BANK OF SCOTLAND N.V">THE ROYAL BANK OF SCOTLAND N.V</option>
                                <option value="THE SAHEBRAO DESHMUKH CO-OP. BANK LTD.">THE SAHEBRAO DESHMUKH CO-OP. BANK
                                    LTD.
                                </option>
                                <option value="THE SARASWAT CO-OPERATIVE BANK LTD">THE SARASWAT CO-OPERATIVE BANK LTD
                                </option>
                                <option value="THE SEVA VIKAS CO-OPERATIVE BANK LTD (SVB)">THE SEVA VIKAS CO-OPERATIVE
                                    BANK LTD
                                    (SVB)</option>
                                <option value="THE SHAMRAO VITHAL CO-OPERATIVE BANK LTD">THE SHAMRAO VITHAL CO-OPERATIVE
                                    BANK
                                    LTD</option>
                                <option value="THE SURAT DISTRICT CO OPERATIVE BANK LTD.">THE SURAT DISTRICT CO
                                    OPERATIVE BANK
                                    LTD.</option>
                                <option value="THE SURAT PEOPLES CO-OP BANK LTD">THE SURAT PEOPLES CO-OP BANK LTD
                                </option>
                                <option value="THE SUTEX CO.OP. BANK LTD.">THE SUTEX CO.OP. BANK LTD.</option>
                                <option value="THE TAMILNADU STATE APEX COOPERATIVE BANK LIMITED">THE TAMILNADU STATE
                                    APEX
                                    COOPERATIVE BANK LIMITED</option>
                                <option value="THE THANE DISTRICT CENTRAL CO-OP BANK LTD">THE THANE DISTRICT CENTRAL
                                    CO-OP BANK
                                    LTD</option>
                                <option value="THE THANE JANATA SAHAKARI BANK LTD">THE THANE JANATA SAHAKARI BANK LTD
                                </option>
                                <option value="THE VARACHHA CO-OP. BANK LTD.">THE VARACHHA CO-OP. BANK LTD.</option>
                                <option value="THE VISHWESHWAR SAHAKARI BANK LTD. PUNE">THE VISHWESHWAR SAHAKARI BANK
                                    LTD. PUNE
                                </option>
                                <option value="THE WEST BENGAL STATE COOPERATIVE BANK LTD">THE WEST BENGAL STATE
                                    COOPERATIVE
                                    BANK LTD</option>
                                <option value="TJSB SAHAKARI BANK LTD.">TJSB SAHAKARI BANK LTD.</option>
                                <option value="TUMKUR GRAIN MERCHANTS COOPERATIVE BANK LTD.">TUMKUR GRAIN MERCHANTS
                                    COOPERATIVE
                                    BANK LTD.</option>
                                <option value="UBS AG">UBS AG</option>
                                <option value="UCO BANK">UCO BANK</option>
                                <option value="UNION BANK OF INDIA">UNION BANK OF INDIA</option>
                                <option value="UNITED BANK OF INDIA">UNITED BANK OF INDIA</option>
                                <option value="UNITED OVERSEAS BANK">UNITED OVERSEAS BANK</option>
                                <option value="VASAI VIKAS SAHAKARI BANK LTD.">VASAI VIKAS SAHAKARI BANK LTD.</option>
                                <option value="VIJAYA BANK">VIJAYA BANK</option>
                                <option value="WEST BENGAL STATE COOPERATIVE BANK">WEST BENGAL STATE COOPERATIVE BANK
                                </option>
                                <option value="WESTPAC BANKING CORPORATION">WESTPAC BANKING CORPORATION</option>
                                <option value="WOORI BANK">WOORI BANK</option>
                                <option value="YES BANK LTD">YES BANK LTD</option>
                                <option value="ZILA SAHKARI BANK LTD GHAZIABAD">ZILA SAHKARI BANK LTD GHAZIABAD</option>
                                <option value="FEDERAL BANK">FEDERAL BANK</option>
                                <option value="AU Small Finance Bank"> AU SMALL FINANCE BANK </option>
                                <option value="Narmada Jhabua Gramin Bank"> NARMADA JHABUA GRAMIN BANK</option>
                                <option value="Bandhan Bank"> BANDHAN BANK</option>
                                <option value="IIFL">IIFL</option>
                                <option value="Aditya Birla Group"> ADITYA BIRLA GROUP</option>
                                <option value="LIC Finance"> LIC FINACE </option>
                                <option value="Fino payments bank"> FINO PAYMENTS BANK </option>
                                <option value="Ujjivati  small finance bank"> UJJIVATI SMALL FINANCE BANK</option>
                            </select>
                            

                        </div>



                        <div class="col-lg-4 mb-2">
                            <label class="form-label fs-sm" for="select-sm">*Bank Account Number </label>
                            <input type="text" class="form-control form-control-sm" id="associate_acc_no" value=""
                                name="uacc_num" placeholder="Write Account Number" required="required">
                            <div class="invalid-feedback">
                                Wrire bank account number.
                            </div>
                        </div>


                        <div class="col-lg-4 mb-2">
                            <label class="form-label fs-sm" for="select-sm">*RERA Registration Number. <span
                                    class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control form-control-sm" id="associate_rera_reg_no" value=""
                                name="area_no" placeholder="Write RERA Registration No.">

                        </div>

                        <div class="col-lg-4 mb-2">
                            <label class="form-label fs-sm" for="select-sm">*Account Holder Name </label>
                            <input type="text" class="form-control form-control-sm" id="associate_bnk_acc_name" value=""
                                name="acc_ho_name" placeholder="Write Account Holder Name" required="required">
                            <div class="invalid-feedback">
                                Wrire Account Holder Name.
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <div class="mb-2">
                                <label class="form-label fs-sm" for="select-sm"> *IFSC Code </label>
                                <input type="text" class="form-control form-control-sm" id="associate_bnk_ifsc_no"
                                    value="" name="ifsc" placeholder="Write Bank IFSC Code" required="required">
                                <div class="invalid-feedback">
                                    Wrire bank IFSC Code.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <label for="associate_blank_cheque" class="form-label fs-sm">*Blank Cheque Attachment
                            </label>
                            <input class="form-control form-control-sm" accept="image/*" name="cheque" type="file"
                                id="associate_blank_cheque" required="">
                            <div class="invalid-feedback">Please select Bank Blank Cheque attachment</div>
                        </div>


                        <!-- Authentication * -->

                        <div class="col-12 my-2">
                            <h5 class="fs-normal m-0">Authentication <code>*</code></h5>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <label class="form-label fs-sm" for="associate_email">*Email Address</label>
                            <input class="form-control form-control-sm" type="email" id="associate_email"
                                name="associate_email" placeholder="you@example.com" value="" required="required">
                            <div class="invalid-feedback">
                                Please enter a valid email address for access the associate panel.
                            </div>
                            <span class="form-text fs-xs text-muted">With this email account you will be able to access
                                the associate panel.</span>
                        </div>


                        <div class="col-lg-4 mb-2">
                            <label class="form-label fs-sm" for="associate_pass">*Password</label>
                            <input class="form-control form-control-sm" type="password" id="associate_pass"
                                name="password" placeholder="Write associate password" value="" onkeyup="check();"
                                required="required">
                            <div class="invalid-feedback">
                                Please enter a valid password for access the associate panel.
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <label class="form-label fs-sm" for="associate_con_pass">*Confirm Password <span
                                    id="associate_con_pass_error"></span></label>
                            <input class="form-control form-control-sm" type="c_password" id="associate_con_pass"
                                name="c_password" placeholder="Write associate Confirm Password"
                                onkeyup="check();" required="required">
                            <div class="invalid-feedback">
                                Please enter a same Password.
                            </div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="form-label fs-sm" for="signup-code">*Referral code <span
                                    class="text-muted">(Optional)</span></label>
                            <!-- <input class="form-control form-control-sm" type="text" name="sponsor_id"
                                placeholder="Referral code" value="" id="signup-code"> -->
                            <input type="text" name="referralcode"
                                value="<?php  if($_SESSION['code']==""){} else{ print_r($_SESSION['code']); } ?>"
                                class="form-control" placeholder="Referral code*">
                        </div>
						<input type="hidden" name="referralcode1" value= "<?php if($_SESSION['referralcode']==""){} else{ print_r($_SESSION['referralcode']); } ?>"  class="form-control" >
						<input type="hidden" name="allreferralcode" value= "<?php if($_SESSION['allreferralcode']==""){} else{ print_r($_SESSION['allreferralcode']); } ?>"  class="form-control" >


                        <div class="col-sm-6 form-group">
                            <label class="form-label fs-sm" for="signup-name">*With Shamniestate
                                ?<code></code></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="form-radio-8" type="radio" value="0"
                                    name="working_type" checked="">
                                <label class="form-check-label fs-sm" for="form-radio-8">Full Time</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="form-radio-9" type="radio" value="1"
                                    name="working_type">
                                <label class="form-check-label fs-sm" for="form-radio-9">Part Time</label>
                            </div>
                        </div>


                        <br><br> <br>

                        <div class="col-sm-12">
                            <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb"
                                class="form-check-label">&nbsp;I accept all terms and conditions.
                            </label>
                        </div>



                        <div class="col-sm-12 form-group mb-0">
                            <button class="btn btn-primary float-right"name="reg" value="Register" type="submit">Submit</button>
							
                        </div>

                    </div>
                </form>
            </div>




            <!--	login  -->


            <!--	Footer   start-->
            <?php include("include/footer.php");?>
            <!--	Footer   start-->

            <!-- Scroll to top -->
            <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll">
                <i class="fas fa-angle-up"></i>
            </a>
            <!-- End Scroll To top -->
        </div>
    </div>
    <!-- Wrapper End -->

    <!--	Js Link
============================================================-->
    <script src="js/jquery.min.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>