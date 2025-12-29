<?php

$final_amount=$_GET['final_amount'];
$contact=$_GET['user_Contact'];
$order_id=$_GET['order_id'];

// $address_id=$_GET['address_id'];
// $discount=$_GET['discount'];


// if (isset($_SESSION['address_id'])) {
//     $addressId = $_SESSION['address_id'];
//     echo "Address ID: " . $addressId;
//     echo "Address ID:" . $_SESSION['coupon_value'];
// }

$jayParsedAry = [
    "merchantId" => 'M10VH448QCVG', 
    "merchantTransactionId" => $order_id,
    "merchantUserId" => "MUID123",
    "amount" =>($final_amount * 100),
    // "amount"=>"100",
    "redirectUrl" =>  'https://ubekart.com/redirect-url.php',
    "redirectMode" => "POST", // GET, POST DEFINE REDIRECT RESPONSE METHOD,
    "callbackUrl" =>  'https://ubekart.com/callback-url.php',
    "mobileNumber" => "$contact",
    "paymentInstrument" => [
        "type" => "PAY_PAGE"
    ]
];

$encode = json_encode($jayParsedAry);
$encoded = base64_encode($encode);
$key = "f89cd9bc-3375-46d9-a436-e0fc4391d31a"; // KEY
$key_index = 1; // KEY_INDEX
$string = $encoded . "/pg/v1/pay".$key;
$sha256 = hash("sha256", $string);
$final_x_header = $sha256 . '###'.$key_index;

// $url = "https://api.phonepe.com/apis/hermes/pg/v1/pay"; <PRODUCTION URL>

$url = "https://api.phonepe.com/apis/hermes/pg/v1/pay"; // <TESTING URL>https://api.phonepe.com/apis/hermes

$headers = array(
    "Content-Type: application/json",
    "accept: application/json",
    "X-VERIFY: " . $final_x_header,
);

$data = json_encode(['request' => $encoded]);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);

curl_close($curl);

$response = json_decode($resp);
// echo '<pre>';
// print_r($response); die();
// echo '</pre>';
header('Location:' . $response->data->instrumentResponse->redirectInfo->url);