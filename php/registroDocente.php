<?php

 require('conexion.php');
$clave = $_POST['clave'];
 $nombre = $_POST['nombre'];
 $apellido = $_POST['apellido'];
 $telefono = $_POST['telefono'];
 $email = $_POST['email'];
 $pass1 = $_POST['contra1'];
 $pass2 = $_POST['contra2'];



$registrodoc = new conexion();
$registrodoc -> registrarDocente($clave,$nombre,$apellido,$telefono,$email,$pass1,$pass2 );
$registrodoc -> cerrar();

 ?>
