<div class="jumbotron bg-white">
<h3 class="display-4">Departamento</h3>
</div>


<form action="<?php echo getUrl("Departamento","Departamento","postInsert");?>" method="post" class="mx-5">

<div class="row">
<div class="col-md-3 p-0">
 <label>Nombre Departamento</label>
 <input type="text" name="dep_nombre" class="form-control" placeholder="Ej: Valle del cauca">

</div>

<div class="col-md-3  mt-3 p-3" >

<input type="submit" value="Enviar" name="Enviar" class="btn btn-success">
</div>
</div>

</form>
