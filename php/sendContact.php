<?php
require('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['message'])) {
  $nombre = $_POST['name'];
  $mensaje = "Gracias por enviarnos un mensaje, $nombre, en breve le responderemos";
  $correo = $_POST['email'];
  $from = "soporte@apd2.es";
  $subject = "APD2 Contact";
  $headers = "From:" . $from;
  mail($correo, $subject, $mensaje, $headers);
  header('Location: https://www.apd2.es/contact.php?message=formSent');
} else {
  header('Location: https://www.apd2.es/contact.php?message=error');
}
