<div class="container">
    <form action="<?php echo getUrl("Ciudad","Ciudad","postDelete");?>" method="post">
        <?php 
			foreach ($ciudad as  $ciu) {
		?>
        <div class="jumbotron bg-white"><label class="display-4">Ciudad</label><br></div>
        <div class="col-md-4">
            <label>Desea eliminar la ciudad?</label><br>
			<input type="hidden" name="ciu_id" value="<?=$ciu['ciu_id']?>">

			<input type="hidden" name="ciu_imagen" value="<?=$ciu['ciu_imagen']?>">
			<img src="<?php echo $ciu['ciu_imagen'] ?>" alt="" width='' height='100' class='img-thumbnail'>
            
			<input class="form-control" type="text" readonly name="ciu_nombre"
                value="<?php echo $ciu['ciu_nombre']?>"><br><br>
        </div>

        <input class="btn btn-danger" type="submit" name="Enviar" value="Eliminar">
        <a href='<?php echo getUrl("Ciudad","Ciudad","consult");?>'><button class="btn btn-secondary"
                type="button">Cancelar</button></a>
        <?php }?>
    </form>

</div>