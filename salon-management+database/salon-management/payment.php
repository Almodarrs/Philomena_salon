<?php
session_start();
print_r($_SESSION);


include "lib/error_reporter.dev.php";

include "vendor/vendor/autoload.php";

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey('test_sNAV89EncmbmzBBQwSGubeJd96eaAf');
 $totalPrice = 5;

    //  if(isset($_POST['price'])){
    //     $totalPrice = $_POST['price'];    
//     } else {
//         $totalPrice = ;
// }

$molliePrice = number_format((float)$totalPrice,2,'.','' );

//echo $molliePrice; exit;
$payment = $mollie->payments->create([
   "amount" => [
        "currency" => "EUR",
        "value" => "$molliePrice"
     
   ],
    "description" => "My first API payment",
    //"redirectUrl" => "https://webshop.example.org/order/12345",
   "redirectUrl" => 'https://localhost//Philomena_beautysalon/test/kashipara.com_salon-management-database-/salon-management+database/salon-management/examples/payments/return.php',
    "webhookUrl"  => "https://webshop.example.org/mollie-webhook/",
    "method"      => \Mollie\Api\Types\PaymentMethod::IDEAL,
    "issuer"      => "ideal_INGBNL2A" // e.g. "ideal_INGBNL2A"
]);
header("Location: " . $payment->getCheckoutUrl(), true, 303);
/////////////////////////////////////////////////////////////////////////////////////////////////////////
// $totalPrice = '';
// if(isset($_POST['price'])){
//     $totalPrice = $_POST['price'];
// } else {
//     $totalPrice = '15.00';
// }

// if(isset($_POST['package'])){
//     $package = $_POST['package'];
// } else {
//    $package = 'Roomsoes pakket';
// }

// $molliePaymentArray = array(
//     "amount" => array(
//         "value"=> "10.00",
//        "currency" => "EUR"
//     ),
//     "description" => 'lang leve de lol',
//     "redirectUrl" => 'https://react-ar.com/payment-complete.php',
//     "method"      => \Mollie\Api\Types\PaymentMethod::IDEAL,
//     "issuer"      => $selectedIssuerId, // e.g. "ideal_INGBNL2A"
// );

// $betaling = $mollie->payments->create($molliePaymentArray);
// echo 'end of payment';
// var_dump($betaling); exit;
// header("Location: " . $payment->getCheckoutUrl(), true, 303);
// in het bestand payment-complete.php
// header("Location:".'betaling-complete.php', true, 303);


