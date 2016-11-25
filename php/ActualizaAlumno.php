<?php
//Tenemos que incluir el archico conexion
//utlizando include
  include("Conexion.php");
  //llamamos el el campo del nombre usuario y contraseña
  $domicilio = $_POST['domicilio'];
  $edad = $_POST['edad'];
  $email = $_POST['email'];
  $contra = $_POST['contra1'];
//creamos una nueva conexion
  $actualiza = new conexion;
  //llamamos el metodo login y pasamos
  //los parametros
  $actualiza->ActualizarAlumno($domicilio,$edad,$email,$contra);
  //cerrar conexion
  $actualiza->cerrar();
 ?>
