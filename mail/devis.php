<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove MORALspace.
        $name = strip_tags(trim($_POST["nom"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["telephone"]);
        $sujet = trim($_POST["sujet"]);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
          if ( empty($name) OR empty($phone) OR empty($sujet) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Veuillez remplir le formulaire et réessayer.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "abmed.commerciale@gmail.com";

        // Set the email subject.
        $subject = "Demande de devis : $name";

        // Build the email content.
        $email_content = "Nom: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Telephone: $phone\n\n";
        $email_content .= "sujet: $sujet\n\n";
        $email_content .= "comments:\n$message\n";

        // Build the email headers.
        $email_headers = "c'est : $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            echo "
            <script>
            alert('Merci! Votre message a bien été envoyé.');
            document.location.href ='https://abmedsarl.com/services/contact.html';
            </script>
            ";
        } else {
            // Set a 500 (internal server error) response code.
            echo "
            <script>
            alert('Oups! Quelque chose a mal tourné et nous n’avons pas pu envoyer votre message.');
            document.location.href ='https://abmedsarl.com/services/contact.html';
            </script>
            ";
            
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        echo "
        <script>
        alert('Il y a eu un problème avec votre soumission, veuillez réessayer');
        document.location.href ='https://abmedsarl.com/services/contact.html';
        </script>
        ";
    }

?>
