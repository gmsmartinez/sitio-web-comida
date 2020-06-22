<?php
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];



$body = "Nombre: " . $nombre . "<br>email: " . $email . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'gms.martinez18@gmail.com';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('gms.martinez18@gmail.com', $nombre);
    $mail->addAddress('gms.martinez18@gmail.com', 'Gaby2');     // Add a recipient
    

    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'envío';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    
    echo '<script>
        alert("El mensaje se envio re bien");
        window.history.gol(-1);
        </script>';

} catch (Exception $e) {
    echo "hubo un error: {$mail->ErrorInfo}";
}

?>