<?php

foreach($ciudad as $ciu){
?>

<form action="<?php echo getUrl("Ciudad","Ciudad","postUpdate"); ?>" method="post" enctype="multipart/form-data">

    <div class="modal-body">
        <div class="col-md-12 form-group">
            <label>Nombre</label>
            <input type="hidden" name="ciu_id" value="<?php echo $ciu['ciu_id']?>">
            <input class="form-control" type="text" name="ciu_nombre" value="<?php echo $ciu['ciu_nombre']?>">
        </div>

        <div class="col-md-12 form-group">
            <label>Departamento</label>
            <select name="dep_id" class="form-control" require>
                <option value="">Seleccione....</option>

                <?php
                foreach($departamentos as $depto){

                    if($depto['dep_id']==$ciu['dep_id']){
                        echo"<option value='".$depto['dep_id']."'selected>".$depto['dep_nombre']."</option>";
                    }else{
                        echo "<option value='".$depto['dep_id']."'>".$depto['dep_nombre']."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-md-12 form-group mt-3">
            <label>Imagen</label>

            <input type="hidden" name="ciu_imagenOld" value="<?=$ciu['ciu_imagen']?>">
            <div id="cambioImagen">
                
                <img src="<?php echo $ciu['ciu_imagen'] ?>" alt="<?php echo $ciu['ciu_nombre'] ?>" id="imagen"
                    width="150px"><br><br>

                <button type="button" class="btn btn-primary" id="cambiar">Cambiar</button>
            </div>


        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>

        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>

<?php
}
?>