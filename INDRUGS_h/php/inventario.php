<?php

    class inventario{

        public $ID_INVENTARIO;
        public $FECHA_ENTRADA_INVENTARIO;
        public $FECHA_SALIDA_INVENTARIO;
        public $ID_MEDICAMENTOS;
        public $STOCK_INVENTARIO;
        public $VENCIMIENTOMED_INVENTARIO;
        public $ESTADOMED_INVENTARIO;

        public function __construct($ID_INVENTARIO, $FECHA_ENTRADA_INVENTARIO, $FECHA_SALIDA_INVENTARIO, $ID_MEDICAMENTOS, $VENCIMIENTOMED_INVENTARIO, $STOCK_INVENTARIO, $ESTADOMED_INVENTARIO) {
            $this->ID_INVENTARIO = $ID_INVENTARIO;
            $this->FECHA_ENTRADA_INVENTARIO = $FECHA_ENTRADA_INVENTARIO;
            $this->FECHA_SALIDA_INVENTARIO = $FECHA_SALIDA_INVENTARIO;
            $this->ID_MEDICAMENTOS = $ID_MEDICAMENTOS;
            $this->VENCIMIENTOMED_INVENTARIO = $VENCIMIENTOMED_INVENTARIO;
            $this->STOCK_INVENTARIO = $STOCK_INVENTARIO;
            $this->ESTADOMED_INVENTARIO = $ESTADOMED_INVENTARIO;
        }        

        public function getID_INVENTARIO(){
            return $this->ID_INVENTARIO;
        }
        public function getFECHA_ENTRADA_INVENTARIO(){
            return $this->FECHA_ENTRADA_INVENTARIO;
        }
        public function getFECHA_SALIDA_INVENTARIO(){
            return $this->FECHA_SALIDA_INVENTARIO;
        }
        public function getID_MEDICAMENTOS(){
            return $this->ID_MEDICAMENTOS;
        }
        public function getVENCIMIENTOMED_INVENTARIO(){
            return $this->VENCIMIENTOMED_INVENTARIO;
        }
        public function getSTOCK_INVENTARIO(){
            return $this->STOCK_INVENTARIO;
        }
        public function getESTADOMED_INVENTARIO(){
            return $this->ESTADOMED_INVENTARIO;
        }
        public function setID_INVENTARIO($ID_INVENTARIO){
            $this->ID_INVENTARIO = $ID_INVENTARIO;
        }
        public function setFECHA_ENTRADA_INVENTARIO($FECHA_ENTRADA_INVENTARIO){
            $this->FECHA_ENTRADA_INVENTARIO = $FECHA_ENTRADA_INVENTARIO;
        }
        public function setFECHA_SALIDA_INVENTARIO($FECHA_SALIDA_INVENTARIO){
            $this->FECHA_SALIDA_INVENTARIO = $FECHA_SALIDA_INVENTARIO;
        }
        public function setID_MEDICAMENTOS($ID_MEDICAMENTOS){
            $this->ID_MEDICAMENTOS = $ID_MEDICAMENTOS;
        }
        public function setVENCIMIENTOMED_INVENTARIO($VENCIMIENTOMED_INVENTARIO){
            $this->VENCIMIENTOMED_INVENTARIO = $VENCIMIENTOMED_INVENTARIO;
        }
        public function setSTOCK_INVENTARIO($STOCK_INVENTARIO){
            $this->STOCK_INVENTARIO = $STOCK_INVENTARIO;
        }
        public function setESTADOMED_INVENTARIO($ESTADOMED_INVENTARIO){
            $this->ESTADOMED_INVENTARIO = $ESTADOMED_INVENTARIO;
        }
        public function conectar($conexion) {
            $stmt = $conexion->prepare("INSERT INTO inventario (ID_INVENTARIO, FECHA_ENTRADA_INVENTARIO, FECHA_SALIDA_INVENTARIO, ID_MEDICAMENTOS, VENCIMIENTOMED_INVENTARIO, STOCK_INVENTARIO, ESTADOMED_INVENTARIO) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issisis", $this->ID_INVENTARIO, $this->FECHA_ENTRADA_INVENTARIO, $this->FECHA_SALIDA_INVENTARIO, $this->ID_MEDICAMENTOS, $this->VENCIMIENTOMED_INVENTARIO, $this->STOCK_INVENTARIO, $this->ESTADOMED_INVENTARIO);
            $stmt->execute();
        }
    }
    class InventarioFactory{
        public static function crearInventario($ID_INVENTARIO, $FECHA_ENTRADA_INVENTARIO, $FECHA_SALIDA_INVENTARIO, $ID_MEDICAMENTOS, $VENCIMIENTOMED_INVENTARIO, $STOCK_INVENTARIO, $ESTADOMED_INVENTARIO){
            return new inventario($ID_INVENTARIO, $FECHA_ENTRADA_INVENTARIO, $FECHA_SALIDA_INVENTARIO, $ID_MEDICAMENTOS, $VENCIMIENTOMED_INVENTARIO, $STOCK_INVENTARIO, $ESTADOMED_INVENTARIO);
        }

    }
?>