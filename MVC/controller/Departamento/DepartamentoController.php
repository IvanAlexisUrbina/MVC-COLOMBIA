
<?php
  include_once '../model/Departamento/DepartamentoModel.php';
    class DepartamentoController{
        public function getInsert(){
      
            include_once '../view/Departamento/formInsertar.php';
        }

        public function postInsert(){
         $obj=new DepartamentoModel();
         $dep_nombre=$_POST['dep_nombre'];
         $id=$obj->autoIncrement("departamento","dep_id");


         $sql="INSERT INTO departamento VALUES ($id,'".$dep_nombre."',0)";
         $ejecutar=$obj->insert($sql);
         //echo "El siguiente ID es $id";

                if($ejecutar){
                    redirect(getUrl("Departamento","Departamento","consult"));
                }else{
                    echo "Ups ocurrio un error";
                }
    }

    public function consult(){
        $obj=new DepartamentoModel();
        $sql="SELECT * FROM departamento";
        $departamentos=$obj->consult($sql);
        include_once '../view/Departamento/consultar.php';
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
                $dep_id=$_GET['dep_id'];
                $obj=new DepartamentoModel();

                $sql="SELECT * FROM departamento WHERE dep_id=$dep_id ";
                $departamentos=$obj->consult($sql);

                include_once '../view/Departamento/formUpdate.php';


        }

        public function postUpdate(){
            $dep_id=$_POST['dep_id'];
            $dep_nombre=$_POST['dep_nombre'];
            $obj=new DepartamentoModel();

            $sql="UPDATE departamento SET dep_nombre='".$dep_nombre."' WHERE dep_id=$dep_id";
            print_r($sql);
            $ejecutar=$obj->update($sql);

                if($ejecutar){
                    redirect(getUrl("Departamento","Departamento","consult"));
                }


        }

        public function getDelete(){
            $dep_id=$_GET['dep_id'];
            $obj=new DepartamentoModel();
            $sql="SELECT * FROM departamento WHERE dep_id=$dep_id ";
            $departamentos=$obj->consult($sql);
            include_once '../view/Departamento/formDelete.php';
        }

        public function postDelete(){

            $dep_id=$_POST['dep_id'];
           
            $obj=new DepartamentoModel();
         
            $sql = "DELETE FROM departamento WHERE dep_id=$dep_id";
        $ejecutar=$obj->delete($sql);
            print_r($sql);
            

                if($ejecutar){
                   
                    redirect(getUrl("Departamento","Departamento","consult"));
                }
        }

        public function filtro(){
            $buscar=$_POST['buscar'];
            $obj=new DepartamentoModel();

            $sql="SELECT * FROM departamento WHERE dep_nombre LIKE '%".$buscar."%'";
            $departamento=$obj->consult($sql);
            $row=$departamento->num_rows;
            
            include_once '../view/Departamento/filtro.php';
            
        }

        public function modalInsert(){
            include_once '../view/Departamento/insertModal.php';
        }

       
}


?>