<script type="text/javascript" src="../js/alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../js/alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../js/alertify/themes/alertify.default.css" />
<script type="text/javascript" >


function confirmar(){
				//un confirm
    var cont = $('#cont').val();
				alertify.confirm("<p>¿Realmente desea eliminar Alumno?<br>"+cont+"<br><b></b>",
         function (e) {
          event.preventDefault();
					if (e) {
						alertify.success("Has pulsado '" + alertify.labels.ok + "'");
					} else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
					}
				});
				return false
			}

</script>
<?php
include("../php/conexionbd.php");

$consult ="SELECT num_control,Nombre,Apellidos from alumno order by num_control";
$result = mysqli_query($conexion,$consult);


$cont= 0;
echo "<div class='table-responsive'>\n";
echo "<table class='table table-bordered'> \n";
echo "<thead><tr><th class='danger'>NumControl</th><th class='danger'>Nombre</th><th class='danger'>Apellidos</th><th>xxxxx</th></tr></thead> \n";
while ($row = mysqli_fetch_row($result)){
       echo "<tbody><tr id='cont'><th scope='row'>$row[0]</th><td >$row[1]</td><td>$row[2]</td><td><a  Onclick='confirmar()'><img style='width:20px;' src='../img/delete.png '/></a></td></tr></tbody> \n";
}

echo "</table> \n";
echo "</div>";
?>
