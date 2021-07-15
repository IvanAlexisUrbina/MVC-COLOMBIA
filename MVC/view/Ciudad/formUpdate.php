<div class="container">
    <div class="jumbotron bg-white"><label class="display-4">Ciudad</label></div>
    <form action="<?php echo getUrl("Ciudad","Ciudad","postUpdate");?>" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-4">
                <label>Nombre ciudad</label><br>
                <?php 
			    foreach ($ciudad as  $ciu) {
		        ?>
                <input type="hidden" name="ciu_id" value="<?php echo $ciu['ciu_id']?>">
                <input class="form-control" type="text" name="ciu_nombre"
                    value="<?php echo $ciu['ciu_nombre']?>"><br><br>
                <?php }?>
            </div>


            <div class="col-md-4">
                <label>Departamento</label><br>
                <select name="dep_id" id="" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php
                        foreach ($departamentos as $depto){
                            if($depto['dep_id']==$ciu['dep_id']){
                                echo"<option value='".$depto['dep_id']."'selected>".$depto['dep_nombre']."</option>";
                            }else{
                                echo "<option value='".$depto['dep_id']."'>".$depto['dep_nombre']."</option>";
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="">Imagen Actual</label>
                
                <input type="hidden" name="ciu_imagenOld" value="<?=$ciu['ciu_imagen']?>">

                <button onclick="document.getElementById('uploadfile').value = ''; return false;" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                <br>
                <img src="<?php echo $ciu['ciu_imagen'] ?>" alt="" width='' height='100' class='img-thumbnail'>
                <input type="file" name="ciu_imagen" id="uploadfile">
                
                
            </div>


            <div class="col-md-3  mt-3 p-3 ml-4">
                <input class="btn btn-primary" type="submit" name="Enviar" value="Guardar">
                <a href='<?php echo getUrl("Ciudad","Ciudad","consult");?>'><button class="btn btn-secondary"
                        type="button">Cancelar</button></a>

            </div>
        </div>
    </form>
    
    