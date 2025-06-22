<?php
//require 'conexion.php';
abstract class Vehiculo {
    protected $ID_VEHICULO;
    protected $COLOR_VEHICULO;
    protected $MARCA_VEHICULO;
    protected $PLACA_VEHICULO;
    protected $TIPO_VEHICULO;
    protected $ESTADO_VEHICULO;
    protected $PROPIETARIO_USUARIOS;
   
    public function __construct($ID_VEHICULO, $PROPIETARIO_USUARIOS, $TIPO_VEHICULO, $PLACA_VEHICULO, $COLOR_VEHICULO, $MARCA_VEHICULO, $ESTADO_VEHICULO)
    {
        $this->ID_VEHICULO = $ID_VEHICULO;
        $this->PROPIETARIO_USUARIOS = $PROPIETARIO_USUARIOS;
        $this->TIPO_VEHICULO = $TIPO_VEHICULO;
        $this->PLACA_VEHICULO = $PLACA_VEHICULO;
        $this->COLOR_VEHICULO = $COLOR_VEHICULO;
        $this->MARCA_VEHICULO = $MARCA_VEHICULO;
        $this->ESTADO_VEHICULO = $ESTADO_VEHICULO;    
    }

    public function getID_VEHICULO(){
        return $this->ID_VEHICULO;
    }
    public function getPROPIETARIO_USUARIOS(){
        return $this->PROPIETARIO_USUARIOS;
    }
    public function getTIPO_VEHICULO(){
        return $this->TIPO_VEHICULO;
    }
    public function getPLACA_VEHICULO(){
        return $this->PLACA_VEHICULO;
    }
    public function getCOLOR_VEHICULO(){
        return $this->COLOR_VEHICULO;
    }
    public function getMARCA_VEHICULO(){
        return $this->MARCA_VEHICULO;
    }
    public function getESTADO_VEHICULO(){
        return $this->ESTADO_VEHICULO;
    }
    public function setID_VEHICULO($ID_VEHICULO){
        $this->ID_VEHICULO = $ID_VEHICULO;
    }
    public function setPROPIETARIO_USUARIOS($PROPIETARIO_USUARIOS){
        $this->PROPIETARIO_USUARIOS = $PROPIETARIO_USUARIOS;
    }
    public function setTIPO_VEHICULO($TIPO_VEHICULO){
        $this->TIPO_VEHICULO = $TIPO_VEHICULO;
    }
    public function setPLACA_VEHICULO($PLACA_VEHICULO){
        $this->PLACA_VEHICULO = $PLACA_VEHICULO;
    }
    public function setCOLOR_VEHICULO($COLOR_VEHICULO){
        $this->COLOR_VEHICULO = $COLOR_VEHICULO;
    }
    public function setMARCA_VEHICULO($MARCA_VEHICULO){
        $this->MARCA_VEHICULO = $MARCA_VEHICULO;
    }
    public function setESTADO_VEHICULO($ESTADO_VEHICULO){
        $this->ESTADO_VEHICULO = $ESTADO_VEHICULO;
    }
    abstract public function conectar($conexion);

}

class Moto extends Vehiculo {
    public function conectar($conexion): void {
        $sql = "INSERT INTO vehiculo (ID_VEHICULO, PROPIETARIO_USUARIOS, TIPO_VEHICULO, PLACA_VEHICULO, COLOR_VEHICULO, MARCA_VEHICULO) VALUES (?, ?, 'Moto', ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssss", $this->ID_VEHICULO, $this->PROPIETARIO_USUARIOS,  $this->PLACA_VEHICULO, $this->COLOR_VEHICULO, $this->MARCA_VEHICULO);
        $stmt->execute();
    }
}

class Carro extends Vehiculo {
    public function conectar($conexion): void {
        $sql = "INSERT INTO vehiculo (ID_VEHICULO, PROPIETARIO_USUARIOS, TIPO_VEHICULO, PLACA_VEHICULO, COLOR_VEHICULO, MARCA_VEHICULO) VALUES (?, ?, 'Carro', ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssss", $this->ID_VEHICULO, $this->PROPIETARIO_USUARIOS,  $this->PLACA_VEHICULO, $this->COLOR_VEHICULO, $this->MARCA_VEHICULO);
        $stmt->execute();
    }
}
// Función Factory
class VehiculoFactory {
    public static function crearVehiculo($TIPO_VEHICULO, $ID_VEHICULO, $PROPIETARIO_USUARIOS,  $PLACA_VEHICULO, $COLOR_VEHICULO, $MARCA_VEHICULO, $ESTADO_VEHICULO) {
    switch ($TIPO_VEHICULO) {
        case 'Moto':
            return new Moto($ID_VEHICULO, $PROPIETARIO_USUARIOS, 'Moto', $PLACA_VEHICULO, $COLOR_VEHICULO, $MARCA_VEHICULO, $ESTADO_VEHICULO);
        case 'Carro':
            return new Carro($ID_VEHICULO, $PROPIETARIO_USUARIOS, 'Carro', $PLACA_VEHICULO, $COLOR_VEHICULO, $MARCA_VEHICULO, $ESTADO_VEHICULO);
        default:
            throw new Exception("Tipo de vehículo no válido.");
    }
}
}


?>