<script type="text/javascript" src="../js/materia1.js"></script>
<table class="table table-bordered table-striped table-highlight">
    <thead>
        <th>Alumno</th>
        <th>Materia</th>
        <th>Parcial1</th>
        <th>Parcial2</th>
        <th>Parcial3</th>
        <th>parcial4</th>
        <th></th>
    </thead>
    <tbody>
        <tr>
          <form method="POST">
            <td id="alumno">

              <select class=form-control id="alumno">;

                   <?php
                     include('../php/conexionbd.php');
                     $peticion = "SELECT * FROM alumno";

                     $ejecucion = mysqli_query($conexion,$peticion);
                     while ($valores = mysqli_fetch_array($ejecucion)) {

                       echo '<option value="'.$valores['num_control'].'">'.$valores['Nombre'].'</option>';
                       echo "";
                     }

                   ?>
             </select>

            </td>

            <td>  <label class="col-sm-2 control-label">Calculo</label></td>
            <td><input type="number" class="form-control" id="p1" /></td>
            <td><input type="number" class="form-control" id="p2" /></td>

            <td><input type="number" class="form-control" id="p3"/></td>
            <td><input type="number" class="form-control" id="p4" /></td>
            <td><button type="button" class="btn btn-primary" id="guarda1">Guardar</button></td>
            <label class="col-sm-2 control-label" id="msg"></label>
          </form>
        </tr>
      
    </tbody>
</table>
