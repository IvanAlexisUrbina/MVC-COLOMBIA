<form action="<?php echo getUrl("Ciudad","Ciudad","postInsert"); ?>" method="post" enctype="multipart/form-data">

    <div class="modal-body">
        <div class="col-md-12 form-group">
            <label>Nombre</label>
            <input type="text" name="ciu_nombre" class="form-control" placeholder="Ej: Cali" id="" require>
        </div>

        <div class="col-md-12 form-group">
            <label>Departamento</label>
            <select name="dep_id" class="form-control" require>
                <option value="">Seleccione....</option>

                <?php
                foreach($departamentos as $depto){
                    echo "<option value='".$depto['dep_id']."'>".$depto['dep_nombre']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-12 form-group mt-3">
                <label>Imagen</label>
                <input type="file" name="ciu_imagen" require>
        </div>

    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
        
        <button type="submit" class="btn btn-success">Enviar</button>
        </div>
</form>