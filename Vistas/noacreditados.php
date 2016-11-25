<script type="text/javascript" src="../js/materia1.js"></script>


  <?php
  				 include('../php/conexionbd.php');
  				 $consulta_mysql="SELECT promedio,alumno.Nombre,alumno.Apellidos
  					from boleta inner join alumno on alumno.num_control=boleta.id_ncontrol
  					where promedio<7";
  			$resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
        echo "<center>";
        echo '<div class="table-responsive">';
         echo '<table class="table table-bordered table-striped table-highlight">';
         echo '<thead><th>Promedio</th><th>Nombre</th><th>Apellidos</th> </thead>';
       //  Navegamos cada fila que devuelve la consulta mysql y la imprimimos en pantalla
  		 while($fila=mysqli_fetch_array($resultado_consulta_mysql)){

        echo '<tbody>';
        echo '<tr>
            <td>'.$fila["promedio"].'</td>
            <td>'.$fila["Nombre"].'</td>
            <td>'.$fila["Apellidos"].'</td>
            </tr>';
       echo '</tbody>';
  		 }
 echo '</center>';
  echo '</table>';
  echo "</div>";
?>
