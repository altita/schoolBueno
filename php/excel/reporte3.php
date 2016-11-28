<?php
ob_start();
include('conexionbd.php');
session_start();
$num_control = $_SESSION['num_control'];
$sql ="SELECT id_materias,p_uno,p_dos,p_tres,p_cuatro, promedio from boleta where id_ncontrol='".$num_control."'";


$rs = mysqli_query($conexion,$sql);
$header="id_materias\tP1\tP2\tP3\tp4\tPromedio\n";
while($row = mysqli_fetch_array($rs)){
	$header .= $row[0];
   	$header .= "\t".$row[1];
   	$header .= "\t".$row[2];
    $header .= "\t".$row[3];
    $header .= "\t".$row[4];
    $header .= "\t".$row[5];
   	$header .= "\n";
}
$data=$header;
$data = str_replace("\r", "", $data);
if ($data == "") {
	$data = "\nNo Hay Registros que Mostrar\n";
}
header('Content-Type: application/x-octet-stream');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Disposition: attachment; filename= datos.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo utf8_decode($data."\n");
ob_end_flush();
?>
