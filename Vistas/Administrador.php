<?php


	session_start();


	if($_SESSION['validacion'] == 1){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>administrador</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    	<link rel="stylesheet" href="email/style.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../bootstrap/validator/js/validator.js"></script>
    <link rel="stylesheet" href="../css/estiloUser.css" >
		<link rel="stylesheet" href="../css/menu-user.css" >

		<script type="text/javascript" src="../js/desplejable.js"></script>

			<script type="text/javascript" src="../js/validacion.js"></script>


    <script type="text/javascript"  >
     $(document).ready(function() {
    $("#abrir_box").click(function(){

        $("#cont_box").css("display", "block");
      });
        });
  $(document).ready(function() {
      $("#cerrar_box").click(function(){
        $("#cont_box").css("display", "none");
      });
    });
    //Menu Tabla
    $(document).ready(function() {
        $(".tabs-menu a").click(function(event) {

            event.preventDefault();

            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    });


  //Imprime pantallla

     </script>
  </head>
  <body  >


<div id="confignav">

</div>

    <header>
    <div class="logo"></div>




		 <ul class="menu">

      <li><a href=""><img id="img-icono" src="../img/user.svg" alt="" /></a>
         <ul>
              <li><a href="#">Configuracion</a></li>
              <li><a href="#">Ayuda</a></li>
              <li><a href="#">Perfil</a></li>
              <li><a href="../php/cerrarSesion.php">Cerrar Sesion</a></li>
          </ul>
     </li>






</header>

<section class="contenido">


        <div id="tabs-container">
    <ul class="tabs-menu">

        <li class="current"><a href="#tab-1"><i class="fa fa-tachometer"></i>Usuario Alumno</a></li>
        <li><a href="#tab-2"><i class="fa fa-wifi"></i>Registrar Docente</a></li>
        <li><a href="#tab-3"><i class="fa fa-info-circle"></i>Ver lista de Alumnos</a></li>
        <li><a href="#tab-4"><i class="fa fa-paper-plane-o"></i>Ver lista de Docente</a></li>
				<li><a href="#tab-5"><i class="fa fa-paper-plane-o"></i>Enviar Notificacion</a></li>

    </ul>
    <div class="tab">

        <div id="tab-1" class="tab-content">
           <center>
            <span style="font-size: 25px;"  class="boton_s">Formulario para el registro de Alumno</span></br></br>
					</center>
		<form data-toggle="validator" class="form-horizontal" method="POST" >
							<div class="form-group has-feedback">
												<label class="col-sm-2 control-label">Num.Control</label>
												<div class="col-sm-5" class="input-group" >
													<input type="text" pattern="^[1-9]\d{9}$" class="form-control" placeholder="Num.control"  id="numcontrol"  required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
												</div>
							 </div>
			<div class="form-group has-feedback">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-5" class="input-group" >
					<input type="text" class="form-control" placeholder="Nombre" pattern="[A-Za-z ]+" data-error="Ingrese solo letras" id="nombre" required>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

				</div><div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label class="col-sm-2 control-label">Apellido</label>
				<div class="col-sm-5" class="input-group">
					<input type="text" class="form-control" pattern="[A-Za-z ]+" placeholder="Apellido" data-error="Ingrese solo letras"   id="apellido" required>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				</div><div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
							 <label class="col-sm-2 control-label" for="sel1">Sexo</label>
							 <div class="col-sm-5">
							 <select class="form-control"  id="sexo">
										 <option value="M">Masculino</option>
										 <option value="F">Femenino</option>

       </select>
			 </div>
    </div>
		<div class="form-group  has-feedback">
			<label class="col-sm-2 control-label">Domicilio</label>
			<div class="col-sm-5" class="input-group">
				<input type="text" class="form-control" placeholder="Apellido" pattern="[A-Za-z ]+" id="domicilio"
				 data-error="Ingrese solo letras" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div><div class="help-block with-errors"></div>
		</div>
			<div class="form-group has-feedback" >
				<label class="col-sm-2 control-label">Edad:</label>
				<div class="col-sm-5" class="input-group">
					<input type="number" class="form-control" pattern="[0-9]+"  min="15" max="30"  placeholder="edad"  id="edad"  data-error="Ingrese solo numeros" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				</div><div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-5" class="input-group">
					<input type="email" class="form-control" placeholder="email"   id="email" data-error="ingrese @" required/><span class="glyphicon form-control-feedback" aria-hidden="true"></span></div><div class="help-block with-errors">
				</div>
			</div>
			<div class="form-group">
							 <label class="col-sm-2 control-label" for="sel1">carrera</label>
							 <div class="col-sm-5">
                   <select class=form-control id="carrera">;

								        <?php
													include('../php/conexionbd.php');
								          $peticion = "SELECT * FROM carrera";

                          $ejecucion = mysqli_query($conexion,$peticion);
								          while ($valores = mysqli_fetch_array($ejecucion)) {

								            echo '<option value="'.$valores['id_carrera'].'">'.$valores['carrera'].'</option>';
                            echo "";
								          }

								        ?>
                	</select>
			 </div>
    </div>
			<div class="form-group">
				 <label class="col-sm-2 control-label">Password</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" pattern="^[_A-z0-9]{1,}$" maxlength="15" placeholder="password"  id="contra1"> </div>
					</div>
					<div class="form-group">
						 <label class="col-sm-2 control-label">Verificar Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" placeholder="password"  id="contra2"> </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<label  class="col-sm-5 control-label" id="msg" style="text-align: center;font-size: 20px;padding: 2px;color: black;"></label>
							</div>


					 <div class="form-group">
							<div class="col-sm-10 col-sm-offset-2"> <button type="button" class="btn btn-primary" id="registrar">registrar</button>

							 </div> </div>
						 </form>

        </div>
    <div id="tab-2" class="tab-content">
			<center>
			 <span style="font-size: 25px;"  class="boton_s">Formulario para el registro de Docente</span><br/><br/><br/>
		 </center>
					<form data-toggle="validator" class="form-horizontal" method="POST" name="f" action="../php/registroDocente.php"  >
						<div class="form-group has-feedback">
											<label class="col-sm-2 control-label">Clave</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" pattern="^[1-9]\d{9}$" placeholder="clave"  id="clave" name="clave" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
											</div><div class="help-block with-errors"></div>
						 </div>
		<div class="form-group has-feedback">
			<label class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" pattern="[A-Za-z ]+" data-error="Ingrese solo letras" placeholder="Nombre"  id="nombre" name="nombre" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
		</div>
		<div class="form-group  has-feedback">
			<label class="col-sm-2 control-label">Apellido</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" pattern="[A-Za-z ]+" placeholder="Apellido"  id="apellido" name="apellido"
				 data-error="Ingrese solo letras"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
		</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Telefono</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" placeholder="Telefono"  id="telefono" name="telefono">
		</div>
	</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-5">
				<input type="email" class="form-control" placeholder="email"  id="email" name="email">
			</div>
		</div>

		<div class="form-group">
			 <label class="col-sm-2 control-label">Password</label>
				<div class="col-sm-5">
					<input type="password" class="form-control" placeholder="password"  id="contra1" name="contra1"> </div>
				</div>
				<div class="form-group">
					 <label class="col-sm-2 control-label">Verificar Password</label>
						<div class="col-sm-5">
							<input type="password" class="form-control" placeholder="password" id="contra2"  name="contra2" > </div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<label  class="col-sm-5 control-label" id="mensaje" style="text-align: center;font-size: 20px;padding: 2px;color: black;border-radius: 10px 10px 10px 10px;"></label>
						</div>


				 <div class="form-group">
						<div class="col-sm-10 col-sm-offset-2"> <button type="button" class="btn btn-primary" id="registrardocente">registrar</button>

						 </div> </div> </form>

        </div>
        <div id="tab-3" class="tab-content">
					<center>
					 <span style="font-size: 25px;"  class="boton_s">Lista de Alumno</span><br/><br/><br/>
					 <div style="position:right;" class="">
 						 <a href="../php/ReportesExcel/reporte1.php" target="_blank"><img id="reportes" src="../img/pdf.png" alt="" /></a><a href="../php/excel/reporte1.php"><img id="reportes" src="../img/excel.png" alt="" /></a><a href="../php/excel/word1.php"><img id="reportes" src="../img/word.png" alt="" /></a>
 					</div>
				 </center>
					<?php
					include("listas/ListaAlum.php");

					 ?>
        </div>
        <div id="tab-4" class="tab-content">
					<center>
					<span style="font-size: 25px;"  class="boton_s">Lista de Docentes</span><br/><br/><br/>
					<div style="position:right;" class="">
						 <a href="../php/ReportesExcel/reporte2.php" target="_blank"><img id="reportes" src="../img/pdf.png" alt="" /></a><a href="../php/excel/reporte2.php"><img id="reportes" src="../img/excel.png" alt="" /></a><a href="../php/excel/word2.php"><img id="reportes" src="../img/word.png" alt="" /></a>

					</div>

				</center>

				<?php
				include("listaDoc.php");

				 ?>

        </div>
				<div id="tab-5" class="tab-content">
					<center>
					<span style="font-size: 25px;"  class="boton_s">Enviar Notificaciones</span><br/><br/><br/>

				</center>

				<form id="ajax-contact" method="post" action="email/mailer.php">
					<div class="field">
						<label for="name">Name:</label>
						<input type="text" id="name" name="name" required>
					</div>

					<div class="field">
						<label for="email">Email:</label>
						<input type="email" id="email" name="email" required>
					</div>

					<div class="field">
						<label for="message">Message:</label>
						<textarea id="message" name="message" required></textarea>
					</div>

					<div class="field">
						<button type="submit">Enviar</button>
					</div>
					<div id="form-messages"></div>
				</form>
			</div>

			<script src="jquery-2.1.0.min.js"></script>
			<script src="email/app.js"></script>
		</body>

				</div>
    </div>
</div>





</section>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/npm.js"></script>
  </body>
</html>
<?php
}else{

	header("Location: ../index.php");
}


?>
