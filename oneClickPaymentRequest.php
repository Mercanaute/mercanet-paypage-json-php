<?php
/*This file generates the payment request and sends it to the Mercanet server
For more information on this use case, please refer to the following documentation:
Ce fichier génère la demande de paiement et l'envoie au serveur Mercanet
Pour plus d'informations sur ce cas d'utilisation, veuillez consulter la documentation suivante :
https://documentation.mercanet.bnpparibas.net/index.php?title=Paiement_one_click */

session_start();

include('Common/paymentRequest.php');

//PAYMENT REQUEST - REQUETE DE PAIEMENT

//You can change the values in session according to your needs and architecture - Vous pouvez modifier les valeurs en session en fonction de vos besoins et de votre architecture
$_SESSION['secretKey'] = "002001000000002_KEY1";
$_SESSION['sealAlgorithm'] = "HMAC-SHA-256";
$_SESSION['normalReturnUrl'] = "http://localhost/mercanet-paypage-json-php/Common/paymentResponse.php";
$_SESSION["urlForPaymentInitialisation"] = "https://payment-webinit.simu.mercanet.bnpparibas.net/rs-services/v2/paymentInit/";

$requestData = array(
   "normalReturnUrl" => $_SESSION['normalReturnUrl'],
   "merchantId" => "002001000000002",
   "transactionReference" => "",
   "amount" => "2000",             //Note that the amount entered in the "amount" field is in cents - Notez que le montant saisi dans le champ "montant" est en centimes
   "orderChannel" => "INTERNET",
   "currencyCode" => "978",
   "interfaceVersion" => "IR_WS_2.20",

   "merchantWalletId" => "1205987",
);

$requestTable = generate_the_payment_request($requestData);

send_payment_request($requestTable, $_SESSION["urlForPaymentInitialisation"]);

?>
