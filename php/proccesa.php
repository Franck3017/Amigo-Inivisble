<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'utils/Exception.php';
  require 'utils/PHPMailer.php';
  require 'utils/SMTP.php';
  require 'data/getdata.php';

  //Instaciem la classe i treballem les excepcions
  $mail = new PHPMailer(true);

  try 
    {
      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );
      
      $mail->SMTPDebug = 0;                     // Debug: 0 en producció
      $mail->isSMTP();                          // Enviar utilitzant SMPT
      $mail->Host = 'smtp.gmail.com';           // Indiquem el servei de SMTP que s'utilitzarà
      $mail->SMTPAuth = true;                   // Activem l'autenticació SMTP
      $mail->Username = 'webformulariscursos@gmail.com';   // SMTP username
      $mail->Password = 'qzyn jmqv jaio invm';   // Contrasenya SMTP
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port = 587;  // Port TCP port per connectar, port alternatiu (465)

      //Preparem l'enviament
      $mail->setFrom('webformulariscursos@gmail.com');           // Remitent 
      //$mail->setFrom('webformulariscursos@gmail.com', $nom);           // Remitent 
      $mail->addAddress('mpeliculasenhd@gmail.com');     // Destinatari
      
      // Content
      $mail->isHTML(true);                                  // Establim format HTML del missatge
      $mail->Subject = 'Resultat de la encuesta';
      $mail->Body    = $body;
      $mail->CharSet = 'UTF-8';
      $mail->send();
      } catch (Exception $e) {
        echo "El missatge no s'ha pogut enviar. Error: {$mail->ErrorInfo}";
    }