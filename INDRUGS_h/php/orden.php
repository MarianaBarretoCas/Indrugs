<?php

class Ordenes {
    
    public $ID_ORDENES;
    public $FECHA_ENTREGA;
    public $EPS_ORDEN;
    public $ESTADO_ORDEN;
    public $USUARIOS_PACIENTE;
    public $CANTIDAD_ORDEN;
    public $DIRECCION_ORDEN;
    public $TELEFONO_ORDEN;

    public function __construct($ID_ORDENES, $FECHA_ENTREGA, $EPS_ORDEN, $ESTADO_ORDEN, $USUARIOS_PACIENTE, $CANTIDAD_ORDEN, $DIRECCION_ORDEN, $TELEFONO_ORDEN) {
        $this->ID_ORDENES = $ID_ORDENES;
        $this->FECHA_ENTREGA = $FECHA_ENTREGA;
        $this->EPS_ORDEN = $EPS_ORDEN;
        $this->ESTADO_ORDEN = $ESTADO_ORDEN;
        $this->USUARIOS_PACIENTE = $USUARIOS_PACIENTE;
        $this->CANTIDAD_ORDEN = $CANTIDAD_ORDEN;
        $this->DIRECCION_ORDEN = $DIRECCION_ORDEN;
        $this->TELEFONO_ORDEN = $TELEFONO_ORDEN;
    }

    // Métodos getter
    public function getIdOrden() {
        return $this->ID_ORDENES;
    }

    public function getCantidadOrden() {
        return $this->CANTIDAD_ORDEN;
    }

    public function getFechaEntrega() {
        return $this->FECHA_ENTREGA;
    }

    public function getEstadoOrden() {
        return $this->ESTADO_ORDEN;
    }

    public function getUsuariosPaciente() {
        return $this->USUARIOS_PACIENTE;
    }

    public function getDireccionOrden() {
        return $this->DIRECCION_ORDEN;
    }

    public function getTelefonoOrden() {
        return $this->TELEFONO_ORDEN;
    }

    // Métodos setter
    public function setIdOrden($ID_ORDENES) {
        $this->ID_ORDENES = $ID_ORDENES;
    }

    public function setCantidadOrden($CANTIDAD_ORDEN) {
        $this->CANTIDAD_ORDEN = $CANTIDAD_ORDEN;
    }

    public function setFechaEntrega($FECHA_ENTREGA) {
        $this->FECHA_ENTREGA = $FECHA_ENTREGA;
    }

    public function setEstadoOrden($ESTADO_ORDEN) {
        $this->ESTADO_ORDEN = $ESTADO_ORDEN;
    }

    public function setUsuariosPaciente($USUARIOS_PACIENTE) {
        $this->USUARIOS_PACIENTE = $USUARIOS_PACIENTE;
    }

    public function setDireccionOrden($DIRECCION_ORDEN) {
        $this->DIRECCION_ORDEN = $DIRECCION_ORDEN;
    }

    public function setTelefonoOrden($TELEFONO_ORDEN) {
        $this->TELEFONO_ORDEN = $TELEFONO_ORDEN;
    }

    
    public function conectar($conexion) {
        $sql = "INSERT INTO ordenes(FECHA_ENTREGA, EPS_ORDEN, ESTADO_ORDEN, USUARIOS_PACIENTE, CANTIDADMED_ORDEN, DIRECCION_ORDEN, TELEFONO_ORDEN) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssss", $this->FECHA_ENTREGA, $this->EPS_ORDEN, $this->ESTADO_ORDEN, $this->USUARIOS_PACIENTE, $this->CANTIDAD_ORDEN, $this->DIRECCION_ORDEN, $this->TELEFONO_ORDEN);
        $stmt->execute();
        return $conexion->insert_id;
    

    }
    
}

class ordenesFactory {
    public static function crearOrden($ID_ORDENES, $FECHA_ENTREGA, $EPS_ORDEN, $ESTADO_ORDEN, $USUARIOS_PACIENTE, $CANTIDADMED_ORDEN, $DIRECCION_ORDEN, $TELEFONO_ORDEN) {
        return new Ordenes($ID_ORDENES, $FECHA_ENTREGA, $EPS_ORDEN, $ESTADO_ORDEN, $USUARIOS_PACIENTE, $CANTIDADMED_ORDEN, $DIRECCION_ORDEN, $TELEFONO_ORDEN);
    }
}

?>
