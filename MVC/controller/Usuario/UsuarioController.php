<?php
  include_once '../model/Usuario/UsuarioModel.php';
    class UsuarioController{

        public function getInsert(){
            $obj = new UsuarioModel();
            $sql = "SELECT * FROM  departamento";
            $departamentos = $obj->consult($sql);
            include_once '../view/Usuario/create.php';
        }

        public function selectDinamico(){
            $obj = new UsuarioModel();
            $id = $_POST['id'];
            $sql = "SELECT * FROM ciudad WHERE dep_id=$id";
            $ciudad = $obj->consult($sql);
            foreach($ciudad as $ciu){
                echo "<option value='".$ciu['ciu_id']."'>".$ciu['ciu_nombre']."</option>";
            }
        }
    }

?>