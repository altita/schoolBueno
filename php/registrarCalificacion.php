<?php

 include('Conexion.php');
$grupo = $_POST['grupo'];
 $materia = $_POST['materia'];
 $alumno = $_POST['alumno'];
 $p1 = $_POST['p1'];
 $p2 = $_POST['p2'];
 $p3 = $_POST['p3'];
 $p4 = $_POST['p4'];



$registrocal = new conexion();
$registrocal -> registrarCalificacion($grupo,$materia,$alumno,$p1,$p2,$p3,$p4);
$registrocal -> cerrar();

 ?>
