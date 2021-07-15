<?php
  include_once '../model/Ciudad/CiudadModel.php';
    class CiudadController{
        public function getInsert(){
                $obj=new CiudadModel();
                $sql="SELECT * FROM departamento";
                $departamentos=$obj->consult($sql);
            include_once '../view/Ciudad/formInsertar.php';
        }

        public function postInsert(){
            $obj=new CiudadModel();
            $ciu_nombre = $_POST['ciu_nombre'];
            $dep_id = $_POST['dep_id'];
            $id=$obj->autoIncrement("Ciudad","ciu_id");

            //datos del arhivo
            $ruta = '../imagenesCargadas/';
            $nombre_archivo = "ciudad_".$id."_".$_FILES['ciu_imagen']['name'];
            $ubicacion = $_FILES['ciu_imagen']['tmp_name'];

            if(file_exists($ruta.$nombre_archivo)){
                unlink($ruta.$nombre_archivo);
            }
            
            move_uploaded_file($ubicacion,$ruta.$nombre_archivo);

            $sql="INSERT INTO ciudad VALUES ($id,'".$ciu_nombre."','".$dep_id."','".$ruta.$nombre_archivo."')";
            $ejecutar=$obj->insert($sql);
            if($ejecutar){
                $_SESSION['alert'] = "success";
                $_SESSION['mensaje']="¡Se ha registrado <strong>$ciu_nombre</strong> exitosamente!";
                redirect(getUrl("Ciudad","Ciudad","consult"));
            }else{
                echo "Ups ocurrio un error";
            }
        }

    public function consult(){
        $obj=new CiudadModel();
        $sql="SELECT ciudad.ciu_id, ciudad.ciu_nombre, ciudad.ciu_imagen, departamento.dep_nombre 
        FROM ciudad, departamento
        WHERE ciudad.dep_id = departamento.dep_id ORDER BY ciudad.ciu_id ASC";
        $ciudad=$obj->consult($sql);
        include_once '../view/ciudad/consultar.php';
    }

    public function consultInsert(){

        $this->consult();

        echo '
        <script>
            $(document).ready(function() {
                $("#botonModal").trigger("click");
            });
        </script>
        ';
        
    }

    public function getUpdate(){
        $ciu_id=$_GET['ciu_id'];
        $obj=new CiudadModel(); 
        $sql="SELECT * FROM ciudad  WHERE ciu_id=$ciu_id";
        $ciudad=$obj->consult($sql);
        $sql="SELECT * FROM departamento";
        $departamentos=$obj->consult($sql);
           
        include_once '../view/Ciudad/formUpdate.php';


}
        public function postUpdate(){

            $ciu_nombre=$_POST['ciu_nombre'];
            $ciu_id=$_POST['ciu_id'];
            $dep_id=$_POST['dep_id'];
            $ciu_imagen = $_POST['ciu_imagenOld'];
            $obj=new CiudadModel();

            if(isset($_FILES['ciu_imagen'])){
                
     

            if($_FILES['ciu_imagen']['name'] != null){

                //Eliminar archivo anterior
                if(file_exists($ciu_imagen)){
                    unlink($ciu_imagen);
                }

                //datos del arhivo
                $ruta = '../imagenesCargadas/';
                $nombre_archivo = "ciudad_".$ciu_id."_".$_FILES['ciu_imagen']['name'];
                $ubicacion = $_FILES['ciu_imagen']['tmp_name'];
    
                if(file_exists($ruta.$nombre_archivo)){
                    unlink($ruta.$nombre_archivo);
                }
                
                move_uploaded_file($ubicacion,$ruta.$nombre_archivo);

                $sql="UPDATE ciudad SET ciu_nombre='".$ciu_nombre."',dep_id=$dep_id, ciu_imagen='".$ruta.$nombre_archivo."' WHERE ciu_id=$ciu_id";          

            }else{
                $sql="UPDATE ciudad SET ciu_nombre='".$ciu_nombre."',dep_id=$dep_id WHERE ciu_id=$ciu_id";          
            }}else{
                $sql="UPDATE ciudad SET ciu_nombre='".$ciu_nombre."',dep_id=$dep_id WHERE ciu_id=$ciu_id";          
            }

            $ejecutar=$obj->update($sql);
                if($ejecutar){
                    $_SESSION['alert'] = "primary";
                    $_SESSION['mensaje']="¡Se ha Actualizado <strong>$ciu_nombre</strong> exitosamente!";
                   redirect(getUrl("Ciudad","Ciudad","consult"));
                }
        }

        public function getDelete(){
            $ciu_id=$_GET['ciu_id'];
            $obj=new CiudadModel(); 
            $sql="SELECT * FROM ciudad WHERE ciu_id=$ciu_id ";
            $ciudad=$obj->consult($sql);
            include_once '../view/Ciudad/formDelete.php';
}


        public function postDelete(){

            $ciu_id=$_POST['ciu_id'];
            $ciu_imagen=$_POST['ciu_imagen'];

            if(file_exists($ciu_imagen)){
                unlink($ciu_imagen);
            }

            $obj=new CiudadModel();
            $sql = "DELETE FROM ciudad WHERE ciu_id=$ciu_id";
             $ejecutar=$obj->delete($sql);
                if($ejecutar){
                
                    redirect(getUrl("Ciudad","Ciudad","consult"));
                }
        }


        public function filtro(){
            $buscar=$_POST['buscar'];
            $obj=new CiudadModel();

            $sql="SELECT c.ciu_id, c.ciu_nombre, d.dep_nombre 
            FROM ciudad as c, departamento as d
            WHERE c.dep_id = d.dep_id
            and (c.ciu_nombre LIKE '%".$buscar."%' or d.dep_nombre LIKE '%".$buscar."%') ORDER BY c.ciu_id ASC";
             
            $ciudad=$obj->consult($sql);
            $row=$ciudad->num_rows;
            include_once '../view/Ciudad/filtro.php';
            
        }
        public function modalInsert(){
            $obj=new CiudadModel();
            $sql="SELECT * FROM departamento";
            $departamentos=$obj->consult($sql);
            include_once '../view/Ciudad/insertModal.php';
        }

        public function modalUpdate(){
            $ciu_id=$_POST['datos'];
            $obj=new CiudadModel(); 
            $sql="SELECT * FROM ciudad  WHERE ciu_id=$ciu_id";
            $ciudad=$obj->consult($sql);
            $sql="SELECT * FROM departamento";
            $departamentos=$obj->consult($sql);
            
            include_once '../view/Ciudad/modalUpdate.php';
        }

}