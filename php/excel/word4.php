<?php
ob_start();
include('conexionbd.php');
$sql="SELECT promedio,alumno.Nombre,alumno.Apellidos
       					from boleta inner join alumno on alumno.num_control=boleta.id_ncontrol
       					where promedio>=7";


$rs = mysqli_query($conexion,$sql);
$header="Promedio\tNombre\tApellidos\t\n";
while($row = mysqli_fetch_array($rs)){
	$header .= $row["promedio"];
   	$header .= "\t".$row["Nombre"];
   	$header .= "\t".$row["Apellidos"];

   	$header .= "\n";
}



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
header('Content-Type: application/vnd.ms-word');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Disposition: attachment; filename= datos.doc");
header("Pragma: no-cache");
header("Expires: 0");
echo utf8_decode($data."\n");
ob_end_flush();
?>
