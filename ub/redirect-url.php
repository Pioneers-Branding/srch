<?php


// print_r($addressId);

$key = "f89cd9bc-3375-46d9-a436-e0fc4391d31a";// KEY
$key_index = 1; // KEY_INDEX

$response = $_POST; // FETCH DATA FROM DEFINE METHOD, IN THIS EXAMPLE I AM DEFINING POST WHILE I AM SENDING REQUEST
// echo '<pre>';
// print_r($response); die();
// echo '</pre>';

$final_x_header = hash("sha256", "/pg/v1/status/" . $response['merchantId'] . "/" . $response['transactionId'] . $key_index) . "###" . $key;

$url = "https://api.phonepe.com/apis/hermes/pg/v1/status/".$response['merchantId']."/".$response['transactionId']; // <TESTING URL>

$headers = array(
    "Content-Type: application/json",
    "accept: application/json",
    "X-VERIFY: " . $final_x_header,
    "X-MERCHANT-ID:". $response['merchantId']
);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$resp = curl_exec($curl);

curl_close($curl);

$responsePayment = json_decode($resp, true);
// HANDLE YOUR PHONEPAY RESPONSE

$order_status=$response['code'];

    


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var order_status='<?=$order_status?>';
var transactionId='<?=$response['transactionId']?>';
if(order_status=='PAYMENT_SUCCESS'){
// $.ajax({
//                         type: "POST",
//                         url: '<?=$asset_url?>web_action/order.php',
//                         data: {
//                             order_insert:'order_insert',
//                             transactionId:transactionId,
//                         },
//                         dataType:'json',
//                         success: function (response) {
                            
// //                             Swal.fire({
// //   title: "Good job", text: "Your order Placed Successfully!", type: 
// // "success"
// // })

//   // Reload the Page
  

                            
//                         }
                       
//                     });
window.location.href = "web_action/order.php?transactionId="+transactionId+"&order_status="+order_status;

}else if(order_status=='PAYMENT_ERROR'){
    window.location.href = "web_action/order.php?transactionId="+transactionId+"&order_status="+order_status;
    // document.write('ERROR');
    
}        
                    
                    </script>