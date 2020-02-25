<?php
$feedback = $error = "";

// RECUPERER LES INFOS
$email = $model->getInput("emailNL");

$error .= $model->checkEmailFormat($email);

if ($error == '') {
    
    $select =
<<<CODESQL
SELECT * FROM `newsletter` WHERE email = :email
CODESQL;

    $tabBindSelect = [":email" => $email];
    $result = $model->executeSQL($select,$tabBindSelect);
    
    if($result->rowCount() == 0) { // ON INSERE L'EMAIL EN BDD S'IL N'EXISTE PAS DEJA
        
        $insert =
<<<CODESQL
INSERT INTO `newsletter`(`email`, `ip`)
VALUES (:email, :ip)
CODESQL;

        $tabBindInsert = [
            ":email"    => $email,
            ":ip"       => $_SERVER['REMOTE_ADDR'],
        ];

        $model->executeSQL($insert,$tabBindInsert);
    }
    
    $feedback = '<p>Merci pour votre inscription à notre newsletter</p>';
    $feedback.= '<script>$("#form-NL").trigger("reset");</script>';
    
}else{
    
    $feedback = $error;
    
}
