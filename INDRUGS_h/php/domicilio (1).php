<?php

class Domicilio { 
    
    public $id_domicilio;
    public $ubicacion_domicilio;
    public $fecha_entrega_domicilio;
    public $estado_domicilio;

    public function __construct($id_domicilio, $ubicacion_domicilio, $fecha_entrega_domicilio, $estado_domicilio) {
        $this->id_domicilio = $id_domicilio;
        $this->ubicacion_domicilio = $ubicacion_domicilio;
        $this->fecha_entrega_domicilio = $fecha_entrega_domicilio;
        $this->estado_domicilio = $estado_domicilio;
    }

    public function getIdDomicilio() {
        return $this->id_domicilio;
    }

    public function getUbicacionDomicilio() {
        return $this->ubicacion_domicilio;
    }

    public function getFechaEntregaDomicilio() {
        return $this->fecha_entrega_domicilio;
    }

    public function getEstadoDomicilio() {
        return $this->estado_domicilio;
    }

    public function setIdDomicilio($id_domicilio) {
        $this->id_domicilio = $id_domicilio;
    }

    public function setUbicacionDomicilio($ubicacion_domicilio) {
        $this->ubicacion_domicilio = $ubicacion_domicilio;
    }

    public function setFechaEntregaDomicilio($fecha_entrega_domicilio) {
        $this->fecha_entrega_domicilio = $fecha_entrega_domicilio;
    }

    public function setEstadoDomicilio($estado_domicilio) {
        $this->estado_domicilio = $estado_domicilio;
    }

}

$domicilio = new Domicilio(301, '123 Calle Principal', '2025-03-10', 'En camino');

echo "ID del domicilio: " . $domicilio->getIdDomicilio() . PHP_EOL;
echo "Ubicación del domicilio: " . $domicilio->getUbicacionDomicilio() . PHP_EOL;
echo "Fecha de entrega del domicilio: " . $domicilio->getFechaEntregaDomicilio() . PHP_EOL;
echo "Estado del domicilio: " . $domicilio->getEstadoDomicilio() . PHP_EOL;

?>
