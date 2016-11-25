<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
<?php
include("../php/conexionbd.php");
$num_control = $_SESSION['num_control'];
$consult ="SELECT * from boleta where id_ncontrol = '".$num_control."'";
$result = mysqli_query($conexion,$consult);

echo "<center>";
echo '<div class="table-responsive">';
 echo '<table class="table table-bordered table-striped table-highlight">';
 echo '<thead><th>Materia</th><th>parcial1</th><th>parcial2</th><th>parcial3</th> <th>parcial4</th><th>Promedio</th></thead>';
//  Navegamos cada fila que devuelve la consulta mysql y la imprimimos en pantalla
while($fila=mysqli_fetch_array($result)){

echo '<tbody>';
echo '<tr>
    <td>'.$fila["id_materias"].'</td>
    <td>'.$fila["p_uno"].'</td>
    <td>'.$fila["p_dos"].'</td>
    <td>'.$fila["p_tres"].'</td>
    <td>'.$fila["p_cuatro"].'</td>
    <td>'.$fila["promedio"].'</td>
    </tr>';
echo '</tbody>';
}
echo '</center>';
echo '</table>';
echo "</div>";

 ?>
