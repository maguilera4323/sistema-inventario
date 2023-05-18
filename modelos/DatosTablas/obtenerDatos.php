<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosTablas extends ConexionBD{

    public function datosTablas($tabla){
        $this->getConexion();
        if($tabla=='insumos'){
            $sql="SELECT * FROM $tabla WHERE estado_registro!=2";
        }else{
            $sql="SELECT * FROM $tabla";
        }
        
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function contarRegistros($tabla){
        $sql=ConexionBD::getConexion()->prepare("SELECT count(*) as contar_registros FROM $tabla");
        $sql->execute();
        return $sql;
    }
    
}