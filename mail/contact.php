<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "infos@repair-pc-mac.fr"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>

















<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['lastName']);
    $prenom = htmlspecialchars($_POST['firstName']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['phone']);
    $adresse = htmlspecialchars($_POST['address']);
    $detailsReparation = htmlspecialchars($_POST['repairDetails']);

    // Adresse email où vous voulez recevoir les messages
    $to = "infos@repair-pc-mac.fr"; 
    $subject = "Demande de réparation de : $nom $prenom";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $message = "Vous avez reçu une nouvelle demande de réparation.\n\n";
    $message .= "Nom : $nom\n";
    $message .= "Prénom : $prenom\n";
    $message .= "Email : $email\n";
    $message .= "Téléphone : $telephone\n";
    $message .= "Adresse : $adresse\n";
    $message .= "Détails de la réparation :\n$detailsReparation\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Votre message a été envoyé avec succès !";
    } else {
        echo "Erreur : votre message n'a pas pu être envoyé.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
