<?php
//Tenemos que incluir el archico conexion
//utlizando include
  include("Conexion.php");
  //llamamos el el campo del nombre usuario y contraseña
  $user = $_POST['usuario'];
  $pass = $_POST['password'];
//creamos una nueva conexion
  $conecta = new conexion;
  //llamamos el metodo login y pasamos
  //los parametros
  $conecta->login($user,$pass);
  //cerrar conexion
  $conecta->cerrar();
 ?>
