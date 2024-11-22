<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $demande = $_POST['demande'];
    $fonction = $_POST['fonction'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $to = "abmed.commerciale@gmail.com";
    $subject = "Nouvelle demande depuis le formulaire de contact";

    // Compose the email message
    $email_message = "Nom: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Téléphone: $telephone\n";
    $email_message .= "Demande: $demande\n";
    $email_message .= "Fonction: $fonction\n";
    $email_message .= "Date: $date\n";
    $email_message .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_message)) {
        // Afficher un message d'alerte JavaScript si l'e-mail est envoyé avec succès
        echo "<script>alert('Votre message a été envoyé avec succès.');</script>";
        // Redirection vers la page index.html après l'envoi réussi du formulaire
        echo "<script>window.location = 'https://abmedsarl.com/services/';</script>";
        exit; // Assure que le script PHP se termine après la redirection
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>
