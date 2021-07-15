<div class="row col-md-5 mb-3">
    <h3 class="display-4">Ciudad</h3>
</div>
<table>
    <tr>
        <td>
            <div class="">
                <input type="text" name="filtro" id="filtro"
                    data-url="<?php echo getUrl("Ciudad","Ciudad","filtro",false,"ajax"); ?>" class="form-control"
                    placeholder="buscar...">
            </div>
        </td>
        <td>
            <div class="col-md-3 p-3">
                <button class="btn btn-success botonModal" value="Registrar Ciudad"
                    data-url="<?php echo getUrl("Ciudad","Ciudad","modalInsert",false,"ajax"); ?>">Registrar</button>
            </div>
        </td>
    </tr>
</table>
<!-- Alerta -->
<?php
if(isset($_SESSION['mensaje'])){
?>
<div class="alert alert-<?=$_SESSION['alert']?>" id="alert" role="alert">
    <?php
    echo $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
    unset($_SESSION['alert']);
    ?>
</div>
<?php
}
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Departamento</th>
            <th></th>
            <th colspan="2">Acciones</th>
        </tr>
    <tbody>

        <?php 
foreach($ciudad as $ciu){
    echo "<tr>";
    echo "<td>".$ciu['ciu_id']."</td>";
    echo "<td>".$ciu['ciu_nombre']."</td>";
    echo "<td>".$ciu['dep_nombre']."</td>";
    echo "<td><img src='".$ciu['ciu_imagen']."' width='100' height='100' class='img-thumbnail'></td>";
    
    echo "<td>
            <button data-url='".getUrl("Ciudad","Ciudad","modalUpdate",false,"ajax")."' data-id='".$ciu['ciu_id']."' class='btn btn-primary botonModal' value='Editar Ciudad'>Editar</button>
    </td>";

    echo "<td> <a href='".getUrl("Ciudad","Ciudad","getDelete",array("ciu_id"=>$ciu['ciu_id']))."'> 
            <button class='btn btn-danger botonModal'>Eliminar</button>
    </a> </td>";

    echo "</tr>";
}

?>
    </tbody>
    </thead>

</table>