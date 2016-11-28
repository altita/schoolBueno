
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
<form class="form-inline" action="PHPMailer/enviar.php" method="POST">
  <div class="form-group">
    <label for="exampleInputName2">Ingrese El email de alumno</label>

  </div>
  <div class="form-group">


    <div class="col-sm-8">
      <select class=form-control name="email"value="<?=$_POST['email']?>">;

           <?php
             include('../php/conexionbd.php');
             $peticion = "SELECT * FROM alumno";

             $ejecucion = mysqli_query($conexion,$peticion);
             while ($valores = mysqli_fetch_array($ejecucion)) {

               echo '<option value="'.$valores['num_control'].'">'.$valores['email'].'</option>';
               echo "";
             }

           ?>
     </select>

  </div>
  <button type="submit" class="btn btn-primary" name="recibir">enviar</button>
</form>
