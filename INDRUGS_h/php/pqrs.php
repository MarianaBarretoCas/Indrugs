<?php
class pqrs{
    protected $ID_PQRS;
    protected $TIPO_SOLICITUD;
    protected $NOMBRE_COMPLETO;
    protected $NUMERO_TELEFONO;
    protected $TIPO_DOCUMENTO;
    protected $NUMERO_DOCUMENTO;
    protected $MOTIVO_PQRS;
    protected $ID_USUARIOS;
    //funcion
    public function __construct($ID_PQRS,$TIPO_SOLICITUD,$NOMBRE_COMPLETO,$NUMERO_TELEFONO,$TIPO_DOCUMENTO,$NUMERO_DOCUMENTO,$MOTIVO_PQRS,$ID_USUARIOS)
    {   $this->ID_PQRS = $ID_PQRS;
        $this->TIPO_SOLICITUD = $TIPO_SOLICITUD;
        $this ->NOMBRE_COMPLETO =$NOMBRE_COMPLETO;
        $this->NUMERO_TELEFONO =$NUMERO_TELEFONO;
        $this->TIPO_DOCUMENTO =$TIPO_DOCUMENTO;
        $this->NUMERO_DOCUMENTO =$NUMERO_DOCUMENTO;
        $this->MOTIVO_PQRS =$MOTIVO_PQRS;
        $this->ID_USUARIOS =$ID_USUARIOS;
    }
    public function __getID_PQRS()
    {
        return $this->ID_PQRS;
    }
    public function __getTIPO_SOLICITUD()
    {
        return $this->TIPO_SOLICITUD;
        
    }
    public function __getNOMBRE_COMPLETO()
    {
        return $this->NOMBRE_COMPLETO;
    }
    public function __getNUMERO_TELEFONO($name)
    {
        return $this->NUMERO_TELEFONO;
    }
    public function __getTIPO_DOCUMENTO()
    {
        return $this->TIPO_DOCUMENTO;   
    }
    public function __getNUMERO_DOCUMENTO()
    {
        return $this->NUMERO_DOCUMENTO;
    }
    public function __getMOTIVO_PQRS()
    {
        return $this->MOTIVO_PQRS;
    }

    public function __getID_USUARIOS()
    {
        return $this->ID_USUARIOS;
    }

    public function setID_PQRS($ID_PQRS){
        $this->ID_PQRS = $ID_PQRS;
    }
    public function setTIPO_SOLICITUD($TIPO_SOLICITUD){
        $this->TIPO_SOLICITUD = $TIPO_SOLICITUD;
    }
    public function setNOMBRE_COMPLETO($NOMBRE_COMPLETO){
        $this->NOMBRE_COMPLETO = $NOMBRE_COMPLETO;
    }
    public function setNUMERO_TELEFONO($NUMERO_TELEFONO){
        $this->NUMERO_TELEFONO= $NUMERO_TELEFONO;
    }
    public function setTIPO_DOCUMENTO($TIPO_DOCUMENTO){
        $this->TIPO_DOCUMENTO = $TIPO_DOCUMENTO;
    }
    public function setNUMERO_DOCUMENTO($NUMERO_DOCUMENTO){
        $this->NUMERO_DOCUMENTO= $NUMERO_DOCUMENTO;
    }
    public function setMOTIVO_PQRS($MOTIVO_PQRS){
        $this->MOTIVO_PQRS= $MOTIVO_PQRS;
    }
    public function __setID_USUARIOS($ID_USUARIOS)
    {
        $this->ID_USUARIOS =$ID_USUARIOS;
    }

    public function conectar($conexion) {
        $sql = "INSERT INTO pqrs(ID_PQRS, TIPO_SOLICITUD, NOMBRE_COMPLETO, NUMERO_TELEFONO, TIPO_DOCUMENTO, NUMERO_DOCUMENTO, MOTIVO_PQRS,ID_USUARIOS) VALUES (?, ?, ?, ?, ?, ?, ?,?)";

        $stmt = $conexion->prepare($sql);
       
    
        $stmt->bind_param("ssssssss", $this->ID_PQRS, $this->TIPO_SOLICITUD, $this->NOMBRE_COMPLETO, $this->NUMERO_TELEFONO, $this->TIPO_DOCUMENTO, $this->NUMERO_DOCUMENTO, $this->MOTIVO_PQRS, $this->ID_USUARIOS);
        $stmt->execute();
    }
}

    class pqrsFactory {
        public static function crearPQRS($ID_PQRS, $TIPO_SOLICITUD, $NOMBRE_COMPLETO, $NUMERO_TELEFONO, $TIPO_DOCUMENTO, $NUMERO_DOCUMENTO, $MOTIVO_PQRS, $ID_USUARIOS) {
            return new pqrs($ID_PQRS, $TIPO_SOLICITUD, $NOMBRE_COMPLETO, $NUMERO_TELEFONO, $TIPO_DOCUMENTO, $NUMERO_DOCUMENTO, $MOTIVO_PQRS,$ID_USUARIOS);
        }
    
}















/*$gestion_pqrs =new GestionPQRS("nombre_completo", "numero_telefono","tipo_documento","numero_documento", "direccion_domicilio");
echo "nombre completo:";
$gestion_pqrs ->gestionPQRS = "nombre_completo";
echo "numero de telefono:";
$gestion_pqrs ->gestionPQRS = "numero_telefono";
echo "tipo de documento:";
$gestion_pqrs ->gestionPQRS = "tipo_documento";
echo "numero de documento:";
$gestion_pqrs ->gestionPQRS = "numero_documento";
echo "direccion de domicilio:";
$gestion_pqrs ->gestionPQRS = "direccion_domicilio";*/
?>