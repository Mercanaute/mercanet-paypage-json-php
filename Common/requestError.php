<?php
//This file displays the fields returned by Mercanet in case of errors during the initialization of the payment - Ce fichier affiche les champs retournés par Mercanet en cas d'erreur lors de l'initialisation du paiement.

session_start();

echo 
'<style>
   table, th, td{
      border: 1px solid black;
      border-collapse: collapse;
   }
   th, td{
      padding: 5px;
      text-align: left;
   }
</style>
<table >
   <tr>
      <th>Field Name</th>
      <th>Value</th>
   </tr>
   <tr>
      <td>redirectionStatusCode</td>
      <td>'.$_SESSION['redirectionStatusCode'].'</td>
   </tr>
   <tr>
      <td>redirectionStatusMessage</td>
      <td>'.$_SESSION['redirectionStatusMessage'].'</td>
   </tr>
   <tr>
      <td>redirectionVersion</td>
      <td>'.$_SESSION['redirectionVersion'].'</td>
   </tr>
   <tr>
      <td>seal</td>
      <td>'.$_SESSION['seal'].'</td>
   </tr>
</table>';

?>