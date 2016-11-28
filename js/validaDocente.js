$(function(){
$('#subir').click(function(){

  var grupo = $('#grupo').val();
  var materia = $('#materia').val();
  var alumno = $('#alumno').val();
  var p1 = $('#p1').val();
  var p2 = $('#p2').val();
  var p3 = $('#p3').val();
  var p4 = $('#p4').val();


  if ((p1>=11 | p1<0)||(p2>=11 | p2<0)||(p3>=11 | p3<0)||(p4>=11 | p4<0)) {
    $('#msg').html('Calificacion debe estar entre 0-10').css("background-color", "#F2DEDE");
  }
    else if (grupo!=='' && materia!=='' && alumno!==''&& p1!=='' && p2 !=='' && p3!=='' && p4 !=='') {
  alert(grupo+" "+materia+" "+alumno+" "+p1+p2+p3+p4);
       $.ajax({
         url : '../php/registrarCalificacion.php',
         method : 'POST',
         data : {
           'grupo' : grupo,
          'materia' : materia,
          'alumno' :alumno,
          'p1' :p1,
          'p2' :p2,
          'p3' :p3,
          'p4' :p4
        },
         success: function(msg){
           if (msg == '1') {
            $('#msg').html('Datos registrados ').css("background-color", "#B3F0D8");
           }else if(msg == '2'){

            $('#msg').html('No registrado ha ocurrido un error!! ').css("background-color", "#F2DEDE");

        }
         }
       });
    }else{
      $('#msg').html('Ingrese datos').css("background-color", "#F2DEDE");
    }
});
});
