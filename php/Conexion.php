<?php
include 'Simpletest/autorun.php';
  class conexion extends UnitTestCase{

      private $conexion;

      private $servidor = "localhost";
      private $users = "root";
      private $pass = "alta";
      private $db = "schoolfae";

      private $user;
      private $password;
      //Constructor Es el que iniciliza valores de objetos
      public function __construct(){
        //por sintaxis de php esta funcion de mysqli hace la conexion
        //utilizando parametros usando el servidor que nuestro carousel-control
        //como es local se utiliza localhost el nombre de usuario, la contraseña,
        //y el nombre  de la base de datos
        $this->conexion = new mysqli($this->servidor,$this->users,$this->pass,$this->db);
        //si conexion tiene error
        if ($this->conexion->connect_errno) {
          # code...
          die('Error al conectar');
        }
      }

      public function cerrar(){
        $this->conexion->close();
      }

      public function login($usuario,$pass){
        //nuestro parametros que es usuario y contraseña
        $this->user = $usuario;
        $this->password = $pass;
        $query = "SELECT * from alumno where email = '".$this->user."' and contra = '".$this->password."'";
       //la ejecucion  de la seleccion lo guardamos en la variable consulta
        $consulta = $this->conexion->query($query);
        //pasar a un array
        $row = mysqli_fetch_array($consulta);

        //comparamos valor que tiene id_cargo que ahora en un array
        //si es 1 hara lo siguiente mostrara vista administrador
        if ($this->user == $this->users && $this->password == $this->pass ) {
          session_start();
         //variable de sesion llamada validacion igual a 1
         //el valor de la sesion equivale a 1
         $_SESSION['validacion'] = 1 ;

         echo "Vistas/administrador.php";
       //si es 2 hara lo siguiente mostrara vista alumno
     }else  if($row['id_cargo'] == 1){
         session_start();
        $_SESSION['validacion'] = 1 ;
        $_SESSION['usuario'] = $row['Nombre'];
        $_SESSION['apellido'] = $row['Apellidos'];
        $_SESSION['domicilio'] = $row['domicilio'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['num_control'] = $row['num_control'];
        $_SESSION['edad'] = $row['edad'];
        $_SESSION['carrera'] = $row['id_carrera'];


          # code...

        //  $_SESSION['apellido'] = $row2['Apellidos'] ;



         echo "Vistas/Alumno.php";
         /* echo "Usuario o contraseñas incorrectos";
          header("location:../index.html");*/
          //si es 3 hara lo siguiente mostrara vista profesor
        } else {
          $query2 = "SELECT * from profesor where email = '".$this->user."' and contra = '".$this->password."'";
          $consulta2 = $this->conexion->query($query2);
          //pasar a un array
          $row2 = mysqli_fetch_array($consulta2);
          if($row2['id_cargo'] == 2){
              session_start();

              $_SESSION['validacion'] = 1 ;

              echo "Vistas/Docente.php";

              $_SESSION['codigo'] = $row2['cod_profesor'];
              $_SESSION['usuario'] = $row2['nombre'];
              $_SESSION['apellido'] = $row2['apellidos'];
              $_SESSION['telefono'] = $row2['telefono'];
              $_SESSION['email'] = $row2['email'];


             } else{
          session_start();

          $_SESSION['validacion'] = 0 ;

          echo "1";
             }

       }

      }

      function registrarAlumno($numcontrol,$nombre,$apellido,$sexo,$domicilio,$edad, $email,$carrera,$pass1, $pass2){
      //comparacion si contraseña 1 es igual a la segunda
      //contraseña ingresad
      if($pass1 == $pass2){
        //si es igual crear una variable
        //booleana igual a true
          $validacion_pass = true;
      }else{
        //en caso contrario es false
          $validacion_pass= false;
      }
     //si validacion_pass es igual true
     //es decir las dos contraseñas son iguales
      if($validacion_pass){
         //hacer la seleccion del nombre del usuario
         // de la tabla  usuario y comparar si es igual
          $consult = $this->conexion->query("SELECT * from alumno where num_control = '".$numcontrol."'");
          //si en la base de  datos encuentra mas de dos datos
          //que coinciden con ese nombre
          if(mysqli_num_rows($consult)> 0){
              echo '1';
          }else{
   //en caso contrario puede insertar el nuevo usuario

    $query =  "INSERT into alumno(num_control,Nombre,Apellidos,sexo,domicilio,edad,email,contra,id_carrera,id_cargo )  values('".$numcontrol."', '".$nombre."', '".$apellido."','".$sexo."', '".$domicilio."','".$edad."','".$email."','".$pass1."','".$carrera."', 1)";
            $consulta = $this->conexion->query($query);
            if($consulta){
                	echo "2";
                  }else{
                    echo "4";
                  }

                    }
      }else{
          echo '3';
      }
    }
    function registrarDocente($clave,$nombre,$apellido,$telefono,$email,$pass1,$pass2){
    //comparacion si contraseña 1 es igual a la segunda
    //contraseña ingresad
    if($pass1 == $pass2){
      //si es igual crear una variable
      //booleana igual a true
        $validacion_pass = true;
    }else{
      //en caso contrario es false
        $validacion_pass= false;
    }
   //si validacion_pass es igual true
   //es decir las dos contraseñas son iguales
    if($validacion_pass){
       //hacer la seleccion del nombre del usuario
       // de la tabla  usuario y comparar si es igual
        $consult = $this->conexion->query("SELECT * from profesor where cod_profesor = '".$clave."'");
        //si en la base de  datos encuentra mas de dos datos
        //que coinciden con ese nombre
        if(mysqli_num_rows($consult)> 0){
            echo '1';
        }else{
 //en caso contrario puede insertar el nuevo usuario

          $query =  "INSERT into profesor(cod_profesor,nombre,apellidos,telefono,email ,contra ,id_cargo )  values('".$clave."', '".$nombre."', '".$apellido."','".$telefono."', '".$email."','".$pass1."', 2)";
          $consulta = $this->conexion->query($query);
          if($consulta){
                echo "2";
                }else{
                  echo "4";
                }

                  }
    }else{
        echo '3';
    }
  }
  function registrarCalificacion($grupo,$materia,$alumno,$p1,$p2,$p3,$p4){
        $promedio = ($p1+$p2+$p3+$p4)/4;
        $query =  "INSERT into boleta(grupo,id_materias,id_ncontrol,p_uno,p_dos,p_tres,p_cuatro,promedio)  values('".$grupo."', '".$materia."', '".$alumno."','".$p1."', '".$p2."', '".$p3."', '".$p4."','".$promedio."')";
        $consulta = $this->conexion->query($query);
        if($consulta){
              echo "1";
              }else{
                echo "2";
              }





}
function ActualizarAlumno($domicilio,$edad,$email,$contra){

	session_start();
  if($_SESSION['validacion'] == 1){

      $query =  "UPDATE alumno  set domicilio= '$domicilio', edad='$edad',email='$email',contra='$contra' where
      num_control='".$_SESSION['num_control']."'";
      $consulta = $this->conexion->query($query);
      if($consulta){
            echo "1";
            }else{
              echo "2";
            }

}

 }





  }

 ?>
