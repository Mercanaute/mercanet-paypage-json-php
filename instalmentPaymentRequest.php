<?php
/*This file generates the payment request and sends it to the Mercanet server.
For more information on this use case, please refer to the following documentation:
Ce fichier génère la demande de paiement et l'envoie au serveur Mercanet
Pour plus d'informations sur ce cas d'utilisation, veuillez consulter la documentation suivante :
https://documentation.mercanet.bnpparibas.net/index.php?title=Paiement_en_2-3_fois */

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
   "transactionReference" => "N835",
   "amount" => "2500",             //Note that the amount entered in the "amount" field is in cents - Notez que le montant saisi dans le champ "montant" est en centimes
   "orderChannel" => "INTERNET",
   "currencyCode" => "978",
   "interfaceVersion" => "IR_WS_2.20",

   "paymentPattern" => "INSTALMENT",
   "instalmentData" => array(
      "number" => "3",
      "amountsList" => array('1000','1000','500'),   //The sum of these amounts must be equal to the content of the amount field - La somme de ces montants doit être égale au contenu du champ montant
      "datesList" => array('20200805','20200806','20200807'),  //Change the dates according to the time of the test of this use case - Modifiez les dates en fonction de l'heure du test de ce cas d'utilisation
      "transactionReferencesList" => array('N835','N935','N735'),   //The first reference must be equal to the one contained in the transactionReference field - La première référence doit être égale à celle contenue dans le champ transactionReference
   ),
);

$requestTable = generate_the_payment_request($requestData);

send_payment_request($requestTable, $_SESSION["urlForPaymentInitialisation"]);

?>
