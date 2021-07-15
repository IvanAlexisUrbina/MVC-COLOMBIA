<div class="">
    <h3 class="display-4">Departamento</h3>
</div>
<table>
    <tr>
        <td>
            <div class="">
                <input type="text" name="filtro" id="filtro"
                    data-url="<?php echo getUrl("Departamento","Departamento","filtro",false,"ajax"); ?>"
                    class="form-control" placeholder="buscar...">
            </div>
        </td>
        <td>
            <div class="col-md-3 p-3">
                <button class="btn btn-success" id="botonModal"
                    data-url="<?php echo getUrl("Departamento","Departamento","modalInsert",false,"ajax"); ?>">Registrar</button>
            </div>
        </td>
    </tr>
</table>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
        </tr>

    <tbody>
        <?php 
foreach($departamentos as $depto){
echo "<tr>";
echo "<td>".$depto['dep_id']."</td>";
echo "<td>".$depto['dep_nombre']."</td>";
echo "<td> <a href='".getUrl("Departamento","Departamento","getUpdate",array("dep_id"=>$depto['dep_id']))."'> 
        <button class='btn btn-primary'>Editar</button>
</a> </td>";

echo "<td> <a href='".getUrl("Departamento","Departamento","getDelete",array("dep_id"=>$depto['dep_id']))."'> 
        <button class='btn btn-danger'>Eliminar</button>
</a> </td>";

echo "</tr>";
}

?>
    </tbody>
    </thead>

</table>