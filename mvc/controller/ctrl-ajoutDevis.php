<?php
$emailDestinataire = 'dprovost67@gmail.com';
//$emailCopie = 'ebarreyre@e-partenaire.fr';

$feedback = $error = "";

// RECUPERER LES INFOS
$nom        = $model->getInput("nom");
$prenom     = $model->getInput("prenom");
$societe    = $model->getInput("societe");
$email      = $model->getInput("email");
$tel        = $model->getInput("tel");
$message    = $model->getInput("message");
$date       = date("Y-m-d H:i:s");

$error .= $model->checkMandoryField('nom', $nom);
$error .= $model->checkMandoryField('prénom', $prenom);
$error .= $model->checkEmailFormat($email);
$error .= $model->checkTelFormat($tel);

if ($error == '') {

    // GESTION BDD
    $insert =
<<<CODESQL
INSERT INTO `devis`(`nom`, `prenom`, `societe`, `email`, `tel`, `message`, `date`)
VALUES (:nom, :prenom, :societe, :email, :tel, :message, '$date')
CODESQL;

    $tabBindInsert = [
        ":nom"      => $nom,
        ":prenom"   => $prenom,
        ":societe"  => $societe,
        ":email"    => $email,
        ":tel"      => $tel,
        ":message"  => $message,
    ];

    $model->executeSQL($insert,$tabBindInsert);

    // GESTION EMAIL
    $header = "Content-type: text/html; charset=utf-8"."\r\n";
    $header.= "From: \"Hydratis\"<contact@hydratis.fr>"."\r\n";
    $header.= !empty($emailCopie) ? "Bcc: $emailCopie"."\r\n":'';
    $header.= "Content-Type: text/html;"."\r\n";
    $header.= "MIME-Version: 1.0"."\r\n";

    $html = "<br>Vous avez reçu une demande de devis via le site internet.<br><br>";
    $html.= "Nom: $nom<br>";
    $html.= "Prénom: $prenom<br>";
    $html.= "Société: $societe<br>";
    $html.= "Email: $email<br>";
    $html.= "Téléphone: $tel<br>";
    $html.= "Message: $message<br>";
    $html.= "Date: $date<br>";

    mail($emailDestinataire, 'Demande de devis', $html, $header);

    $feedback = '<p class="bg-success">Votre demande de contact a bien été envoyée !</p>';
    $feedback.= '<script>$("#form-devis").trigger("reset");</script>';

}else{

    $feedback = '<div class="bg-danger">'.$error.'</div>';

}
