
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
<style type="text/css">
.container{ width:800px;
  margin:0 auto;

}
.show{ width:500px; margin:0 auto; margin-bottom:2px; padding:2px; border:1px #999 solid; }
.show:hover{border-bottom:1px #999 dotted; }
.action { float:right;}
.name { text-transform:capitalize; margin-bottom:25px; }
.name, .action { font-size:13px; font-family:Tahoma, Geneva, sans-serif; color:black; font-weight:bold; }
a { text-decoration:none; font-family:Tahoma, Geneva, sans-serif; color:black; font-size:13px;}


@media screen and (max-width: 1100px) and (min-width: 200px) {
  .show {
    width: 200px;
  }
  .container {
    width: 150px;
  }
}

</style>

<div class="container" class="container">
</br>

<?php
include('../php/conexionbd.php');
$result = mysqli_query($conexion,"SELECT * FROM alumno");

while($row = mysqli_fetch_array($result))
{
$id1=$row['num_control'];
$name=$row['Nombre'];
$ape=$row['Apellidos'];
?>
<div class="show" class="container">

<span class="name" id="dato"><?php echo $id1." "." ".$name." ".$ape;  ?></span>
<span class="action"><a href="#" id="<?php echo $id1; ?>" class="delet" title="Delete"><img style='width:20px;' src="../img/delete.png"/></a></span>

</div>
<?php
}
?>
</div>
<script src="jquery.js"></script>
<script type="text/javascript">
$(function() {
$(".delet").click(function(){
var element = $(this);
var del_id = element.attr("id");
var inf = 'id=' + del_id;
if(confirm("confirmar Eliminacion: "))
{

 $.ajax({
   type: "POST",
   url: "../php/delete2.php",
   data: inf,
   success: function(){

 }

});
  $(this).parents(".show").remove();

 }
return false;

});
});
</script>
