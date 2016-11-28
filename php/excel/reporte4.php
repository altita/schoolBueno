<?php
ob_start();
include('conexionbd.php');
/*$sql="SELECT max(promedio),min(promedio),alumno.Nombre,alumno.Apellidos
                from boleta
                inner join alumno on alumno.num_control=boleta.id_ncontrol";*/
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
