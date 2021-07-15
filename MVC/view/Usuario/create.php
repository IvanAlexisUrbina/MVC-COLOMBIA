<div class="jumbotron bg-white">
    <h3 class="display-4">Registrar Usuario</h3>
</div>



<form action="<?php echo getUrl("Usuario","Usuario","postInsert");?>" method="post" class="mx-5">

    <div class="row">
        <div class="col-md-3 p-0">
            <label>Nombre</label>
            <input type="text" name="usu_nombre" class="form-control" placeholder="Ej:Cali">
        </div>

        <div class="col-md-3 p-0">
            <label>Apellido</label>
            <input type="text" name="usu_apellido" class="form-control" placeholder="Ej:Cali">
        </div>

        <div class="col-md-3 p-0">
            <label>Correo</label>
            <input type="text" name="usu_correo" class="form-control" placeholder="Ej:Cali">
        </div>
    </div>
    <div class="row">

        <div class="col-md-3 p-2 ml-4">
            <span>Departamento</span>

            <select class='display-5 form-control' name="dep_id" id="selectDepto" data-url="<?=getUrl("Usuario","Usuario","selectDinamico",false,"ajax");?>">

                <option value="">Seleccione...</option>
                <?php
                foreach($departamentos as $depto){
                    echo "<option value='".$depto['dep_id']."'>".$depto['dep_nombre']."</option>";
                }
                ?>

            </select>
        </div>

        <div class="col-md-3  mt-3 p-3 ml-4 d-none">
            <label>Departamento</label>
            <select name="ciu_id" id="selectCiudad" class="form-control"></select>
        </div>

    </div>

</form>