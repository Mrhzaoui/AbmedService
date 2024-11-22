<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'adresse e-mail soumise
    $email = $_POST['email'];

    // Adresse e-mail de réception
    $to = "abmed.commerciale@gmail.com";

    // Sujet de l'e-mail
    $email_subject = "Nouvelle inscription à la newsletter";

    // Corps de l'e-mail
    $email_body = "Une nouvelle inscription à la newsletter a été reçue.\n\n".
                  "Adresse e-mail : $email";

    // En-têtes de l'e-mail
    $headers = "De: $email\n";
    $headers .= "Répondre à: $email\n";

    // Envoyer l'e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Votre inscription à la newsletter a été soumise avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'inscription à la newsletter. Veuillez réessayer.";
    }
}
?>
