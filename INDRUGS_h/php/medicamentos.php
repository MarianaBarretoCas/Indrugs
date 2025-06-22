<?php

    class medicamentos{

        protected $ID_MEDICAMENTOS; 
        protected $NOMBRE_MEDICAMENTOS;     
        protected $DESCRIPCION_MEDICAMENTOS;  
        public function __construct($ID_MEDICAMENTOS, $NOMBRE_MEDICAMENTOS, $DESCRIPCION_MEDICAMENTOS){
            $this->ID_MEDICAMENTOS = $ID_MEDICAMENTOS;
            $this->NOMBRE_MEDICAMENTOS = $NOMBRE_MEDICAMENTOS;
            $this->DESCRIPCION_MEDICAMENTOS = $DESCRIPCION_MEDICAMENTOS;  
        }
        public function getID_MEDICAMENTOS(){
            return $this->ID_MEDICAMENTOS;
        }
        public function getNOMBRE_MEDICAMENTOS(){
            return $this->NOMBRE_MEDICAMENTOS;
        }
        public function getDESCRIPCION_MEDICAMENTOS(){
            return $this->DESCRIPCION_MEDICAMENTOS;
        }
        public function setID_MEDICAMENTOS($ID_MEDICAMENTOS){
            $this->ID_MEDICAMENTOS = $ID_MEDICAMENTOS;
        }
        public function setNOMBRE_MEDICAMENTOS($NOMBRE_MEDICAMENTOS){
            $this->NOMBRE_MEDICAMENTOS = $NOMBRE_MEDICAMENTOS;
        }
        public function setDESCRIPCION_MEDICAMENTOS($DESCRIPCION_MEDICAMENTOS){
            $this->DESCRIPCION_MEDICAMENTOS = $DESCRIPCION_MEDICAMENTOS;
        }
        public function conectar($conexion){
            $sql = "INSERT INTO medicamentos (ID_MEDICAMENTOS, NOMBRE_MEDICAMENTOS, DESCRIPCION_MEDICAMENTOS) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sss", $this->ID_MEDICAMENTOS, $this->NOMBRE_MEDICAMENTOS, $this->DESCRIPCION_MEDICAMENTOS);
            $stmt->execute();
        }
    }
    class medicamentosFactory{
        public static function crearMedicamento($ID_MEDICAMENTOS, $NOMBRE_MEDICAMENTOS, $DESCRIPCION_MEDICAMENTOS){
            return new medicamentos($ID_MEDICAMENTOS, $NOMBRE_MEDICAMENTOS, $DESCRIPCION_MEDICAMENTOS);
        }
    }
        



?>