<?php

use PHPMailer\PHPMailer\PHPMailer;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once "vendor/autoload.php";

if (isset($_POST['message'])) {
  $recipiente = $_POST['email'];
  $nombre = $_POST['name'];
  $correo = $_POST['email'];
  $mail = new PHPMailer;
  //$mail->IsSMTP();
  $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "mail.apd2.es";
  $mail->Port = 465; // or 587
  $mail->Username = "soporte@apd2.es";
  $mail->Password = "aalleE12!!";
  $mail->From = "soporte@apd2.es";
  $mail->FromName = "apd2";

  $mail->addAddress("$correo", "$nombre");

  //Provide file path and name of the attachments
  //$mail->addAttachment("file.txt", "File.txt");
  //$mail->addAttachment("images/profile.png"); //Filename is optional

  $mail->isHTML(true);

  $mail->Subject = "Ha contactado con Nosotros, Sr/Sra $nombre.";
  $mail->Body = <<<html
<i>
    <table cellspacing="0" cellpadding="0" align="center">
        <tbody>
            <tr>
                <td style="background-color: #17212e;">
                    <h1 style="color: white; text-align: center;"><a style="text-decoration: none; color: white;" href="https://apd2.es/">APD2</a></h1>
                </td>
            </tr>
            <tr>
                <td bgcolor="#17212e">
                    <table border="0" width="470" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td>
                                    <p style="color: white; padding-left: 15%; padding-right: 15%;">Hola, $nombre</p>
                                    <p style="color: white; padding-left: 15%; padding-right: 15%;">Gracias por contactar con nosotros, en breve le responderemos.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
html;
  $mail->AltBody = <<<TAG
ShredStore
Hola, $nombre.
Gracias por contactar con nosotros, tendremos en cuenta su comentario.
TAG;

  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    //header('Location: index.php');
    echo '<meta http-equiv="refresh" content="0;url=https://www.apd2.es/contact.php?message=error/" />';
  } else {
    echo "Message has been sent successfully";
    //header('Location: index.php');
    echo '<meta http-equiv="refresh" content="0;url=https://www.apd2.es/contact.php?message=formSent" />';

  }
}
