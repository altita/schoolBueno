<?php
ob_start();
include('conexionbd.php');
$sql = "SELECT num_control,Nombre,Apellidos from alumno ";


$rs = mysqli_query($conexion,$sql);
$header="numControl\tNonmbre\tApellidos\n";
while($row = mysqli_fetch_array($rs)){
	$header .= $row[0];
   	$header .= "\t".$row[1];
   	$header .= "\t".$row[2];

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
