<?php
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

if (isset($_POST['recibir'])) {
    if (comprobar_email($_POST['email'])) {
        require_once("../php/PHPMailer/class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->From = "frondeze@gmail.com";
        $mail->FromName = "Ezequiel Hernandez";
        $mail->Subject = "Bienvenido a SchoolFae";
        $mail->Body = "Hola, te damos la bienvenida";
        $mail->AddAddress($_POST['email'], "User Name");
        $archivo = 'prueba.pdf';
        $mail->AddAttachment($archivo,$archivo);
        $mail->Send();
        echo '<p>Se ha enviado correctamente el email a '.$_POST['email'].'!</p>';
    }
    else {
        echo '<p>El email introducido no es correcto!</p>';
    }
}
?>
