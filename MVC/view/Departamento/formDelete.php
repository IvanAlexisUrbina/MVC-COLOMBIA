<div class="jumbotron bg-white">
<h3 class="display-4">Eliminar Departamento</h3>
</div>
<?php 
foreach($departamentos as $depto){

?>

<form action="<?php echo getUrl("Departamento","Departamento","postDelete");?>" method="post" class="mx-5">

<div class="row">
<div class="col-md-3 p-0">
 <label>Nombre Departamento</label>
 <input type="hidden" name="dep_id" value="<?php echo $depto['dep_id']; ?>">
 <input type="text" readonly name="dep_nombre" value="<?php echo $depto['dep_nombre']; ?>" class="form-control" placeholder="Ej: Valle del cauca">

</div>

<div class="col-md-3  mt-3 p-3" >

<input type="submit" value="Eliminar" name="Enviar" class="btn btn-danger">
<a href='<?php echo getUrl("Departamento","Departamento","consult");?>'><button  class="btn btn-secondary" type="button">Cancelar</button></a>
</div>
</div>

</form>
<?php 
  }
?>