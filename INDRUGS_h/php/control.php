<?php

class Control { 
    
    protected $ID_CONTROL;
    protected $FECHA_INICIO_TRATAMIENTO;
    protected $FECHA_FIN_TRATAMIENTO;
    protected $PROBLEMA_SALUD;
    protected $CANTIDAD_MEDIC;
    protected $FRECUENCIA_MEDIC;
    protected $ALARMA_CONTROL;
    protected $ID_USUARIO;
    protected $ID_MEDICAMENTOS;

    public function __construct($ID_CONTROL, $FECHA_INICIO_TRATAMIENTO, $FECHA_FIN_TRATAMIENTO, $PROBLEMA_SALUD, $CANTIDAD_MEDIC, $FRECUENCIA_MEDIC, $ALARMA_CONTROL, $ID_USUARIO, $ID_MEDICAMENTOS) {
        $this->ID_CONTROL = $ID_CONTROL;
        $this->FECHA_INICIO_TRATAMIENTO = $FECHA_INICIO_TRATAMIENTO;
        $this->FECHA_FIN_TRATAMIENTO = $FECHA_FIN_TRATAMIENTO;
        $this->PROBLEMA_SALUD = $PROBLEMA_SALUD;
        $this->CANTIDAD_MEDIC = $CANTIDAD_MEDIC;
        $this->FRECUENCIA_MEDIC = $FRECUENCIA_MEDIC;
        $this->ALARMA_CONTROL = $ALARMA_CONTROL;
        $this->ID_USUARIO = $ID_USUARIO;
        $this->ID_MEDICAMENTOS = $ID_MEDICAMENTOS;
    }
 
    // Métodos getter
    public function __getID_CONTROL() {
        return $this->ID_CONTROL;
    }
    public function __getFECHA_INICIO_TRATAMIENTO() {
        return $this->FECHA_INICIO_TRATAMIENTO;
    }
    public function __getFECHA_FINAL_TRATAMIENTO() {
        return $this->FECHA_FIN_TRATAMIENTO;
    }
    public function __getPROBLEMA_SALUD() {
        return $this->PROBLEMA_SALUD;
    }
    public function __getCANTIDAD_MEDIC() {
        return $this->CANTIDAD_MEDIC;
    }
    public function __getFRECUENCIA_MEDIC() {
        return $this->FRECUENCIA_MEDIC;
    }
    public function __getALARMA_CONTROL() {
        return $this->ALARMA_CONTROL;
    }
    public function __getID_USUARIO() {
        return $this->ID_USUARIO;
    }
    
    public function __getID_MEDICAMENTOS() {
        return $this->ID_MEDICAMENTOS;
    }
    public function __setID_MEDICAMENTOS($ID_MEDICAMENTOS) {
        $this->ID_MEDICAMENTOS = $ID_MEDICAMENTOS;
    }
    // Métodos setter
    public function __setID_CONTROL($ID_CONTROL) {
        $this->ID_CONTROL = $ID_CONTROL;
    }
    public function __setFECHA_INICIO_TRATAMIENTO($FECHA_INICIO_TRATAMIENTO) {
        $this->FECHA_INICIO_TRATAMIENTO = $FECHA_INICIO_TRATAMIENTO;
    }
    public function __setFECHA_FINAL_TRATAMIENTO($FECHA_FINAL_TRATAMIENTO) {
        $this->FECHA_FINAL_TRATAMIENTO = $FECHA_FIN_TRATAMIENTO;
    }
    public function __setPROBLEMA_SALUD($PROBLEMA_SALUD) {
        $this->PROBLEMA_SALUD = $PROBLEMA_SALUD;
    }
    public function __setCANTIDAD_MEDIC($CANTIDAD_MEDIC) {
        $this->CANTIDAD_MEDIC = $CANTIDAD_MEDIC;
    }
    public function __setFRECUENCIA_MEDIC($FRECUENCIA_MEDIC) {
        $this->FRECUENCIA_MEDIC = $FRECUENCIA_MEDIC;
    }
    public function __setALARMA_CONTROL($ALARMA_CONTROL) {
        $this->ALARMA_CONTROL = $ALARMA_CONTROL;
    }
    public function __setID_USUARIO($ID_USUARIO) {
        $this->ID_USUARIO = $ID_USUARIO;
    }
    
  
    public function conectar($conexion) {
        $sql = "INSERT INTO control(ID_CONTROL, FECHA_INICIO_TRATAMIENTO, FECHA_FIN_TRATAMIENTO, PROBLEMA_SALUD, CANTIDAD_MEDIC, FRECUENCIA_MEDIC, ALARMA_CONTROL, ID_USUARIO, ID_MEDICAMENTOS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssssss", $this->ID_CONTROL, $this->FECHA_INICIO_TRATAMIENTO, $this->FECHA_FIN_TRATAMIENTO, $this->PROBLEMA_SALUD, $this->CANTIDAD_MEDIC, $this->FRECUENCIA_MEDIC, $this->ALARMA_CONTROL, $this->ID_USUARIO, $this->ID_MEDICAMENTOS);
        $stmt->execute();
    }
}

    class controlFactory {
    public static function crearControl($ID_CONTROL, $FECHA_INICIO_TRATAMIENTO, $FECHA_FIN_TRATAMIENTO, $PROBLEMA_SALUD, $CANTIDAD_MEDIC, $FRECUENCIA_MEDIC, $ALARMA_CONTROL, $ID_USUARIO, $ID_MEDICAMENTOS) {
        return new Control($ID_CONTROL, $FECHA_INICIO_TRATAMIENTO, $FECHA_FIN_TRATAMIENTO, $PROBLEMA_SALUD, $CANTIDAD_MEDIC, $FRECUENCIA_MEDIC, $ALARMA_CONTROL, $ID_USUARIO, $ID_MEDICAMENTOS);
    }
}

?>
