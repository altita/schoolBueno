$(function(){
$('#subir').click(function(){



  var clav = $('#domicilio').val();
  var nombr = $('#edad').val();
  var apellid = $('#email').val();

  var telefon = $('#contra1').val();

    if (clav!=='' && nombr!=='' && apellid !==''&& telefon !=='') {

       $.ajax({
         url : '../php/ActualizaAlumno.php',
         method : 'POST',
         data : {
           'domicilio' : clav,
          'edad' : nombr,
          'email' : apellid,
          'contra1' : telefon

        },
         success: function(msg){
           if (msg == '1') {
            $('#frase').html('Datos Actualizados ').css("background-color", "#008080");
           }else if(msg == '2'){

            $('#frase').html('No Actualizo ha ocurrido un error!! ').css("background-color", "#ff6347");

        }
         }
       });
    }else{
      $('#frase').html('Ingrese en todos los campos').css("background-color", "#ff6347");
    }
});
});
