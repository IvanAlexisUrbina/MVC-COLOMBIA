<?php 
if ($row==0){ 
    echo "<h3 class='from-control'>No se encontraron resultados de '".$buscar."'</h3>";
}else{
    foreach($ciudad as $ciu){
        echo "<tr>";
        echo "<td>".$ciu['ciu_id']."</td>";
        echo "<td>".$ciu['ciu_nombre']."</td>";
        echo "<td>".$ciu['dep_nombre']."</td>";
        echo "<td><img src='".$ciu['ciu_imagen']."' width='100' height='100' class='img-thumbnail'></td>";
        echo "<td> <a href='".getUrl("Ciudad","Ciudad","getUpdate",array("ciu_id"=>$ciu['ciu_id']))."'> 
                <button class='btn btn-primary'>Editar</button>
        </a> </td>";
        
        echo "<td> <a href='".getUrl("Ciudad","Ciudad","getDelete",array("ciu_id"=>$ciu['ciu_id']))."'> 
                <button class='btn btn-danger'>Eliminar</button>
        </a> </td>";
        
        echo "</tr>";
        
        }

}

// if(mysqli_num_rows($ciudades)>0){
//         foreach($ciudades as $ciu){

//         }
// }else{
//         echo "<td colspan='6'><h3>No hay resultado</h3></td>";
// }



?>