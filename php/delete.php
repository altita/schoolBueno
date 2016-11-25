<?php
include('conexionbd.php');
if($_POST['id'])
{
$id=$_POST['id'];

$delete = "DELETE FROM profesor WHERE cod_profesor='$id'";
$el=mysqli_query($conexion,$delete);

}

?>
