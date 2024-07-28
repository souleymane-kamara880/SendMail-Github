<?php

session_start();

if (isset($_POST['send'])) {
    //# Extraction des variables
    extract($_POST);
    //#vérification si les variables existent et ne sont pas vides
    if (isset($username) && $username != "" &&
        isset($email) && $email != "" &&
        isset($number) && $number != "" &&
        isset($message) && $message != ""){

    //destinataire du mail
    $to = "etudsouleymane90@gmail.com";
    //objet du mail
    $subject = "Vous avez reçu un message de : ".$email;

    $message = "
    <p>Vous avez reçu un message de <strong>".$email."</strong></p>
    <p><strong>Nom :</strong>".$username."</p>
    <p><strong>number :</strong>".$number."</p>
    <p><strong>message :</strong>".$message."</p>
    ";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

// envoie du mail
$send = mail($to,$subject,$message,$headers);

// vérification de l'envoie
    if ($send) {
        $_SESSION['success_message'] = "message envoyé";

    }else {
        $info = "message non envoyer";
    }

    
    }else{
        // si elles sont vides 
        $info = "veuillez remplir tous les champs";
    }

}

?>

   
   <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>


  <div class="container">

    <form id="contact" action="" method="post">
    <?php
    //afficher le message d'erreur
    if (isset($info)) { ?>
        <p class="request_message" style="color:red>">
            <?=$info?>
        </p>
   
    <?php
     }
    ?>

<?php
    //afficher le message de succes
    if (isset($_SESSION['success_message'])) { ?>
        <p class="request_message" style="color:green>">
            <?=$_SESSION['success_message']?>
        </p>
   
    <?php
     }
    ?>
      <h1>Contact Form</h1>

      <fieldset>
        <input placeholder="Your name" name="username" type="text" tabindex="1" autofocus>
      </fieldset>
      <fieldset>
        <input placeholder="Your Email Address" name="email" type="email" tabindex="2">
      </fieldset>
      <fieldset>
        <input placeholder="phone" type="numper" name="number" tabindex="4">
      </fieldset>
      <fieldset>
        <textarea name="message" placeholder="Type your Message Details Here..." tabindex="5"></textarea>
      </fieldset>

      <fieldset>
        <button name="send">Submit Now</button>
      </fieldset>
    </form>
  </div>
</body>

</html>