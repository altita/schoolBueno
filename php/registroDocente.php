<?php

 include('conexion.php');
$clave = $_POST['clave'];
 $nombre = $_POST['nombre'];
 $apellido = $_POST['apellido'];
 $telefono = $_POST['telefono'];
 $email = $_POST['email'];
 $pass1 = $_POST['contra1'];
 $pass2 = $_POST['contra2'];

 /*EN EL ARCHIVO DONDE RECIBES DATOS AGREGAS EL DE EMAIL
  SUS PARAMETROS SON EL EMAIL DONDE VAS A ENVIAR EL SEGUNDO UN MSGO. YA EL TERCERO PUEDES PERSONALIZAR CON LA INFO QUE OBTIENES CON POST
 */

 $contenido = "Hola Bienvenido a SchoolFae ".$nombre.'\nTu Password es: '.$pass1.'\nInicia Sesion Aqui: '."http://scittlaxiaco.com.mx/anahi/index.php";

 mail($email,"Contacto: ",$contenido);

$registrodoc = new conexion;
$registrodoc -> registrarDocente($clave,$nombre,$apellido,$telefono,$email,$pass1,$pass2 );
$registrodoc -> cerrar();

 ?>
