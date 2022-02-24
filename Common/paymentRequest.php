<?php

include('Common/sealCalculationPaypageJson.php');

//This function generates a payment request - Cette fonction génère une demande de paiement

function generate_the_payment_request($requestData)
{
   $requestTable = $requestData;
   $requestTable['seal'] = compute_payment_init_seal($_SESSION['sealAlgorithm'], $requestData, $_SESSION['secretKey']);
   $requestTable['keyVersion'] = "1";
   $requestTable['sealAlgorithm'] = $_SESSION['sealAlgorithm'];
   
   return $requestTable;
}

//This function initializes the payment and redirects the client to Mercanet server - Cette fonction initialise le paiement et redirige le client vers le serveur Mercanet

function send_payment_request($requestTable, $urlForPaymentInitialisation)
{
   $requestJson = json_encode($requestTable, JSON_UNESCAPED_UNICODE, '512');
   
   //SENDING OF THE PAYMENT REQUEST - ENVOI DE LA DEMANDE DE PAIEMENT
   
   $option = array(
      'http' => array(
         'method' => 'POST',
         'header' => "content-type: application/json",
         'content' => $requestJson
      ),
   );
   $context = stream_context_create($option);
   $responseJson = file_get_contents($urlForPaymentInitialisation, false, $context);
   $responseTable = json_decode($responseJson, true);
   
   //RECALCULATION OF SEAL - RECALCUL DU SEAL
   foreach($responseTable as $key => $value)
   {
      if(strcasecmp($key, "seal") != 0){
         $responseData[$key] = $value;
      }
      //store responseTable in session to access responseData from other pages - stocke responseTable en session pour accéder à responseData à partir d'autres pages
      $_SESSION[$key] = $value;
   }
   
   $computedResponseSeal = compute_payment_init_seal($_SESSION['sealAlgorithm'], $responseData, $_SESSION['secretKey']);
   
   //REDIRECTION TO MERCANET PAYPAGE JSON - REDIRECTION VERS MERCANET PAYPAGE JSON
   
   if(strcmp($computedResponseSeal, $responseTable['seal']) == 0){
      if($responseTable['redirectionStatusCode'] == 00){
         header('Location: Common/redirectionForm.php');
         exit();
      }else{
         header('Location: Common/requestError.php');
         exit();
      }
   }else{
      echo "Votre paiement n'a pas pu être traité";
      echo "<br>"."Veuillez contacter le support technique de Mercanet";
   }
}

?>
