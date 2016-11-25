
<script type="text/javascript" src="../js/eliminar.js"></script>
<?php
include("../php/conexionbd.php");

$consult ="SELECT cod_profesor,nombre,apellidos,telefono from profesor order by cod_profesor";
$result = mysqli_query($conexion,$consult);


echo "<div class='table-responsive'>\n";
echo "<table class='table table-bordered'> \n";
echo "<thead><tr><th class='danger'>NumControl</th><th class='danger'>Nombre</th><th class='danger'>Apellidos</th><th>xxxxx</th></tr></thead> \n";
while ($row = mysqli_fetch_assoc($result)){
       echo "<tbody><tr><th scope='row'>".$row['cod_profesor']."</th><td>".$row['nombre']."</td><td>".$row['apellidos']."</td><td>
       <div class='record' id='record-",$row["cod_profesor"],"'>
    				<a href='?delete=",$row["cod_profesor"],"' class='delete'>Delete</a>
    				<strong>",$row["cod_profesor"],"</strong>
    			</div></td></tr></tbody> \n";
}

echo "</table> \n";
echo "</div>";
?>
