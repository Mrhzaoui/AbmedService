<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer l'adresse e-mail soumise dans le formulaire
    $email = $_GET['EMAIL'];
    $to = "abmed.commerciale@gmail.com";
    $subject = "Nouvelle inscription à la newsletter";

    // Construire le corps de l'e-mail
    $email_message = "Adresse e-mail inscrite : $email";

    // Envoyer l'e-mail
    if (mail($to, $subject, $email_message)) {
        echo "Votre inscription à la newsletter a été effectuée avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'inscription à la newsletter. Veuillez réessayer.";
    }
}
?>
