<div class="jumbotron bg-white">
<h3 class="display-4">Ciudad</h3>
</div>


<form action="<?php echo getUrl("Ciudad","Ciudad","postInsert");?>" method="post" class="mx-5">

<div class="row">
<div class="col-md-3 p-0">
 <label>Ingrese la ciudad</label>
 <input type="text" name="ciu_nombre" class="form-control" placeholder="Ej:Cali">
 
</div>

<div class="col-md-3 p-2 ml-4">
<span>Departamento</span>

<select class='display-5 form-control' name="dep_id">
<option value="">Seleccione...</option>
    <?php foreach ($departamentos as $depto){
      
        echo "<option class='form-control' value=".$depto['dep_id'].">".$depto['dep_nombre']."</option>";
    } ?>  

  </select>
</div>

<div class="col-md-3  mt-3 p-3 ml-4" >

<input type="submit" value="Enviar" name="Enviar" class="btn btn-success">
</div>

</div>

</form> 