$(function(){
$('#guarda1').click(function(){

  var alumno = $('#alumno').val();
  var parcial1 = $('#p1').val();
  var parcial2 = $('#p2').val();
  var parcial3 = $('#p3').val();
  var parcial4 = $('#p4').val();




    if (alumno!=='' && parcial1!=='' && parcial2 !==''&& parcial3 !=='' && parcial4 !=='') {
      alert(alumno);
       $.ajax({
         url : '../php/calificacion1.php',
         method : 'POST',
         data : {
          'alumno' : alumno,
          'p1' : parcial1,
          'p2' : parcial2,
          'p3' : parcial3,
          'p4':parcial4
        },
         success: function(msg){
           if (msg == '1') {
             console.log('Bien');
            $('#msg').html('Datos registrados ').css("background-color", "#008080");
           }else if(msg == '2'){
             console.log('Errror!!!');
            $('#msg').html('No registrado ha ocurrido un error!! ').css("background-color", "#ff6347)

        }
         }
       });
    }else{
       console.log('Esta Vacio');
      $('#msg').html('Ingrese datos').css("background-color", "#ff6347");
    }
});
});
