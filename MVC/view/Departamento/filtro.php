<?php 
if ($row==0){ 
        echo "<h3 class='from-control'>No se encontraron resultados de '".$buscar."'</h3>";
    }else{
        foreach($departamento as $depto){
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
    }



?>