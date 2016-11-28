<?php

 require('conexion.php');
$numcontrol = $_POST['numcontrol'];
 $nombre = $_POST['nombre'];
 $apellido = $_POST['apellido'];
 $sexo = $_POST['sexo'];
 $domicilio = $_POST['domicilio'];
 $edad = $_POST['edad'];
 $email = $_POST['email'];
  $carrera = $_POST['carrera'];
 $pass1 = $_POST['contra1'];
 $pass2 = $_POST['contra2'];



$registro = new conexion;
$registro -> registrarAlumno($numcontrol,$nombre,$apellido,$sexo,$domicilio,$edad, $email,$carrera,$pass1, $pass2 );
$registro -> cerrar();

 ?>
