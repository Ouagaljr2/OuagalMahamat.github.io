<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier que tous les champs sont remplis
    if (empty($_POST['name']) || empty($_POST['your_email']) || empty($_POST['message'])) {
        echo "Veuillez remplir tous les champs du formulaire.";
        exit;
    }
    
    // Vérifier que l'e-mail est valide
    $email = $_POST['your_email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse e-mail n'est pas valide.";
        exit;
    }
    
    // Récupérer les valeurs du formulaire
    $name = $_POST['name'];
    $message = $_POST['message'];
    $name="toto";
    $message="bonjour";
    
    // Adresse e-mail où vous voulez recevoir les notifications
    $to = "votre_email@example.com";
    
    // Sujet de l'e-mail
    $subject = "Nouveau message de $name";
    
    // Contenu de l'e-mail
    $body = "Vous avez reçu un nouveau message de $name ($email):\n\n$message";
    
    // Entêtes de l'e-mail
    $headers = "From: $email";
    
    // Envoi de l'e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>
