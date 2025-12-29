<?php session_start(); /*$from_currency = $_REQUEST['from'];
$amount=100;
 $to_currency = $_REQUEST['to'];
 $from_currency = urlencode($from_currency);
 $to_currency = urlencode($to_currency);
 $url = "https://www.google.com/search?q=".$from_currency."+to+".$to_currency;
 $get = file_get_contents($url);
 $data = preg_split('/\D\s(.*?)\s=\s/',$get);
echo $exhangeRate = (float) substr($data[1],0,7);
echo "<br>";
 $converted_amount  = $amount*$exhangeRate;
echo $converted_amount;*/
 $to=$_REQUEST['to'];
$_REQUEST['from'];
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,"https://api.exchangerate-api.com/v4/latest/".XOF);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
$response=curl_exec($curl);
$error=curl_error($curl);
//echo "<pre>";
//print_r(json_decode($response));
//echo "</pre>";

$object=json_decode($response);


echo $exchange_rate=$object->rates->$to;
// echo "<br>";
$_SESSION['exchange_rate']=$exchange_rate;
$_SESSION['exchange_code']=$to;

if($to=='XOF')
{
    $_SESSION['exchange_sign']='CFA';
}
else if($to=='USD')
{
    $_SESSION['exchange_sign']='$';
}
else
if($to=='EUR')
{
    $_SESSION['exchange_sign']='€';
}
else
if($to=='CFA')
{
    $_SESSION['exchange_sign']='CFA';
}



//echo $pr= (40000) * ($exchange_rate);


