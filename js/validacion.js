
$(function(){
  $('#enviar').click(function(){
    var usuario = $('#user').val();
    var clave = $('#pass').val();
      if (usuario != '' && clave != '') {
         $.ajax({
           url : 'php/login.php',
           method : 'POST',
           data : {
             usuario : usuario,
             password : clave
           },
           success: function(msg){
             if (msg == '1') {
               $('#aviso').html('Datos incorrectos');
             }else{

          window.location = msg;
        }
           }
         });
      }else{
        $('#aviso').html('Ingrese datos');
      }
  });
});

$(function(){
$('#registrar').click(function(){
  var numcontrol = $('#numcontrol').val();
  var nombre = $('#nombre').val();
  var apellido = $('#apellido').val();
  var sexo = $('#sexo').val();
  var domicilio = $('#domicilio').val();
  var edad = $('#edad').val();
  var email = $('#email').val();
  var carrera = $('#carrera').val();
  var pass1 = $('#contra1').val();
  var pass2 = $('#contra2').val();

    if (numcontrol!=='' && nombre!=='' && apellido !==''&& sexo !=='' && domicilio !=='' && edad!=='' &&email !=='' && pass1 !==''&& pass2!=='') {
       $.ajax({
         url : '../php/registro.php',
         method : 'POST',
         data : {
           'numcontrol' : numcontrol,
          'nombre' : nombre,
          'apellido' : apellido,
          'sexo' : sexo,
          'domicilio' : domicilio,
          'edad' : edad,
          'email': email,
          'carrera': carrera,
          'contra1' : pass1,
          'contra2' : pass2
        },
         success: function(msg){
           if (msg == '1') {
             $('#msg').html('Ya existe usuario').css("background-color", "#ff6347");
           }else if(msg == '2'){

            $('#msg').html('Datos registrados ').css("background-color", "#1AB667");

        }else if(msg == '3'){
               $('#msg').html('No coincide Contraseña').css("background-color", "#ff6347");
        }else if(msg=='4'){
          $('#msg').html('error al registrar ').css("background-color", "#ff6347");
        }
         }
       });
    }else {
      $('#msg').html('Ingrese datos').css("background-color", "#ff6347");
    }
});
});

$(function(){
$('#registrardocente').click(function(){

/*
    var clav = $('#clave').val();
    var nombr = $('#nombre').val();
    var apellid = $('#apellido').val();

    var telefon = $('#telefono').val();

    var emai = $('#email').val();

    var pass1 = $('#contra1').val();
    var pass2 = $('#contra2').val();*/
    var clav = document.forms.f.clave.value;
    var nombr = document.forms.f.nombre.value;
    var apellid = document.forms.f.apellido.value;
    var telefon = document.forms.f.telefono.value;
    var emai = document.forms.f.email.value;
    var pass1 = document.forms.f.contra1.value;
    var pass2 = document.forms.f.contra2.value;



      if (clav!=='' && nombr!=='' && apellid !==''&& telefon !=='' && emai !=='' &&  pass1!=='' && pass2 !=='') {

         $.ajax({
           url : '../php/registroDocente.php',
           method : 'POST',
           data : {
             'clave' : clav,
            'nombre' : nombr,
            'apellido' : apellid,
            'telefono' : telefon,
            'email': emai,
            'contra1' : pass1,
            'contra2' : pass2
          },
         success: function(msg){
           if (msg == '1') {
             $('#mensaje').html('Ya existe usuario').css("background-color", "#ff6347");
           }else if(msg == '2'){

            $('#mensaje').html('Datos registrados ').css("background-color", "#1AB667");

        }else if(msg == '3'){
               $('#mensaje').html('No coincide Contraseña').css("background-color", "#ff6347");
        }else if(msg=='4'){
          $('#mensaje').html('error al registrar ').css("background-color", "#ff6347");
        }
         }
       });
    }else{
      $('#mensaje').html('Ingrese datos').css("background-color", "#ff6347");
    }
});
});
