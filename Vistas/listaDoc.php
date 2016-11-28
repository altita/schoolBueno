
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
<div id="myPrintArea">
<div class="container" class="container">

</br>

<?php
include('../php/conexionbd.php');
$result = mysqli_query($conexion,"SELECT * FROM profesor");

while($row = mysqli_fetch_array($result))
{
$id1=$row['cod_profesor'];
$name=$row['nombre'];
$ape=$row['apellidos'];
?>
<div class="show" class="container">

<span class="name" id="dato"><?php echo $id1." "." ".$name." ".$ape;  ?></span>
<span class="action"><a href="#" id="<?php echo $id1; ?>" class="delete" title="Delete"><img style='width:20px;' src="../img/delete.png"/></a></span>

</div>
<?php
}
?>
</div></div><center><a href="javascript:void(0)" id="imprime"><img id="reportes" src="../img/imprime.svg" alt="" /></a></center>
<script src="jquery.js"></script>
<script src="jquery.printarea.js"></script>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Confimar Eliminacion de: "+info))
{
 $.ajax({
   type: "POST",
   url: "../php/delete.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".show").remove();
 }
return false;

});
});
$(function() {
$("#imprime").click(function (){
$("div#myPrintArea").printArea();
});
});
</script>
