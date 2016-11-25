<?php
include("conexionbd.php");
//llamamos el el campo del nombre usuario y contraseña


if(isset($_GET['delete'])) {
	$result = mysqli_query('DELETE FROM profesor WHERE cod_profesor = '.(int)$_GET['delete'],$conexion);
}
 ?>
