## Mercanet Paypage JSON PHP samples - Exemples PHP JSON de la page de paiement Mercanet
The code samples in this repository help you to connect to Mercanet paypage JSON (using PHP). This repository contains several use cases.

Les exemples de code de ce référentiel vous aident à vous connecter à la page de paiement Mercanet JSON (en utilisant PHP). Ce référentiel contient plusieurs cas d'utilisation.

### Contents - Contenu
 **1. Folder Common - Dossier commun**

This folder contains all the files that are common to all use cases.
- sealCalculationPaypageJson.php : This file contains functions to [calculate the seal](https://documentation.mercanet.bnpparibas.net/index.php?title=Connecteur_JSON#Calcul_de_la_donn.C3.A9e_Seal) with the 2 algorithms HMAC-SHA-256 and SHA-256
- redirectionForm.php : This is the form to redirect to Mercanet Paypage if the payment initialization was successful
- requestError.php : This file displays errors when an error occurred during the initialization of the payment
- paymentResponse.php : This file displays the manual response to the payment request and calculates the seal to compare it with the seal received in the Mercanet response
- paymentRequest.php : This file contains the different functions used during the payment process


Ce dossier contient tous les fichiers communs à tous les cas d'utilisation.
- sealCalculationPaypageJson.php : Ce fichier contient des fonctions pour [calculer le seal](https://documentation.mercanet.bnpparibas.net/index.php?title=Connecteur_JSON#Calcul_de_la_donn.C3.A9e_Seal) avec les 2 algorithmes HMAC-SHA-256 et SHA-256
- redirectionForm.php : Voici le formulaire à rediriger vers Mercanet Paypage si l'initialisation du paiement a réussi
- requestError.php : Ce fichier affiche des erreurs lorsqu'une erreur s'est produite lors de l'initialisation du paiement
- paymentResponse.php : Ce fichier affiche la réponse manuelle à la demande de paiement et calcule le sceau pour le comparer avec le sceau reçu dans la réponse Mercanet
- paymentRequest.php : Ce fichier contient les différentes fonctions utilisées lors du processus de paiement


 **2. Other files - Autres fichiers**

Each file corresponds to a payment type and contains the code that generates the payment request and sends it to Mercanet server.

Chaque fichier correspond à un type de paiement et contient le code qui génère la demande de paiement et l'envoie au serveur Mercanet.

### Running the test - Exécution du test
- Clone the repository and keep the folder structure as it is in GitHub
- Change the value of the normalReturnUrl field according to your architecture
- Check the uniqueness of the value in the transactionReference field when it is filled out
- In the case of payment by installments, change due dates and the transaction reference list if necessary
- Execute the payment request file on a local web server for the use case you want to test

- Clonez le repository et conservez la structure des dossiers telle qu'elle est dans GitHub
- Modifiez la valeur du champ normalReturnUrl en fonction de votre architecture
- Vérifier l'unicité de la valeur dans le champ transactionReference lorsqu'il est renseigné
- En cas de paiement échelonné, modifier les dates d'échéance et la liste de référence des transactions si nécessaire
- Exécutez le fichier de demande de paiement sur un serveur web local pour le cas d'utilisation que vous souhaitez tester

### Version
This example has been validated on a WAMP server with PHP version 7.3.12 .

Cet exemple a été validé sur un serveur WAMP avec PHP version 7.3.12 .

### Documentation
The code examples are based on our developer documentation, which provides comprehensive information on how Mercanet Paypage JSON works. For more information, refer to the [Mercanet Paypage JSON documentation](https://documentation.mercanet.bnpparibas.net/index.php?title=Connecteur_JSON).

Les exemples de code sont basés sur notre documentation développeur, qui fournit des informations complètes sur le fonctionnement de Mercanet Paypage JSON. Pour plus d'informations, reportez-vous au [Mercanet Paypage JSON documentation](https://documentation.mercanet.bnpparibas.net/index.php?title=Connecteur_JSON)

### License
This repository is open source and available under the MIT license. For more information, see the [LICENSE](LICENSE) file.

Ce référentiel est open source et disponible sous licence MIT. Pour plus d'informations, consultez le fichier [LICENSE](LICENSE).