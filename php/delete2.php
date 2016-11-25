<?php
include('conexionbd.php');
if($_POST['id'])
{
$id=$_POST['id'];

$delete = "DELETE FROM alumno WHERE num_control='$id'";
$el=mysqli_query($conexion,$delete);

}

?>
