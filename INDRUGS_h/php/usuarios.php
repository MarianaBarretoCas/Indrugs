<?php
    //require 'conexion.php';
    abstract class usuarios{
        
        protected $NOMBRE_USUARIOS;
        protected $TIPODOC_USUARIOS;
        protected $NUMDOC_USUARIOS;
        protected $DIRECCION_USUARIOS;
        protected $ESTADO_USUARIO;
        protected $TELEFONO_USUARIOS;
        protected $CORREO_USUARIOS;
        protected $CONTRASEÑA_USUARIOS;
        protected $ID_ROLES_USUARIOS;

        public function __construct( $NOMBRE_USUARIOS, $TIPODOC_USUARIOS, $NUMDOC_USUARIOS, $DIRECCION_USUARIOS, $ESTADO_USUARIO, $TELEFONO_USUARIOS, $CORREO_USUARIOS, $CONTRASEÑA_USUARIOS, $ID_ROLES_USUARIOS){
            
            $this->NOMBRE_USUARIOS = $NOMBRE_USUARIOS;
            $this->TIPODOC_USUARIOS = $TIPODOC_USUARIOS;  
            $this->NUMDOC_USUARIOS = $NUMDOC_USUARIOS;
            $this->DIRECCION_USUARIOS = $DIRECCION_USUARIOS;
            $this->ESTADO_USUARIO = $ESTADO_USUARIO;
            $this->TELEFONO_USUARIOS = $TELEFONO_USUARIOS;
            $this->CORREO_USUARIOS = $CORREO_USUARIOS;
            $this->CONTRASEÑA_USUARIOS = $CONTRASEÑA_USUARIOS;
            $this->ID_ROLES_USUARIOS = $ID_ROLES_USUARIOS;
        }
        
        public function getNOMBRE_USUARIOS(){
            return $this->NOMBRE_USUARIOS;
        }
        public function getTIPODOC_USUARIOS(){
            return $this->TIPODOC_USUARIOS;
        }
        public function getNUMDOC_USUARIOS(){
            return $this->NUMDOC_USUARIOS;
        }
        public function getDIRECCION_USUARIOS(){
            return $this->DIRECCION_USUARIOS;
        }
        public function getESTADO_USUARIO(){
            return $this->ESTADO_USUARIO;
        }
        public function getTELEFONO_USUARIOS(){
            return $this->TELEFONO_USUARIOS;
        }
        public function getCORREO_USUARIOS(){
            return $this->CORREO_USUARIOS;
        }
        public function getCONTRASEÑA_USUARIOS(){
            return $this->CONTRASEÑA_USUARIOS;
        }
        public function getID_ROLES_USUARIOS(){
            return $this->ID_ROLES_USUARIOS;
        }
        
        public function setNOMBRE_USUARIOS($NOMBRE_USUARIOS){
            $this->NOMBRE_USUARIOS = $NOMBRE_USUARIOS;
        }
        public function setTIPODOC_USUARIOS($TIPODOC_USUARIOS){
            $this->TIPODOC_USUARIOS = $TIPODOC_USUARIOS;
        }
        public function setNUMDOC_USUARIOS($NUMDOC_USUARIOS){
            $this->NUMDOC_USUARIOS = $NUMDOC_USUARIOS;
        }
        public function setDIRECCION_USUARIOS($DIRECCION_USUARIOS){
            $this->DIRECCION_USUARIOS = $DIRECCION_USUARIOS;
        }
        public function setESTADO_USUARIO($ESTADO_USUARIO){
            $this->ESTADO_USUARIO = $ESTADO_USUARIO;
        }
        public function setTELEFONO_USUARIOS($TELEFONO_USUARIOS){
            $this->TELEFONO_USUARIOS = $TELEFONO_USUARIOS;
        }
        public function setCORREO_USUARIOS($CORREO_USUARIOS){
            $this->CORREO_USUARIOS = $CORREO_USUARIOS;
        }
        public function setCONTRASEÑA_USUARIOS($CONTRASEÑA_USUARIOS){
            $this->CONTRASEÑA_USUARIOS = $CONTRASEÑA_USUARIOS;
        }
        public function setID_ROLES_USUARIOS($ID_ROLES_USUARIOS){
            $this->ID_ROLES_USUARIOS = $ID_ROLES_USUARIOS;
        }
        abstract public function conectar($conexion);
        
    }

    class Paciente extends usuarios{
       
        //public $conexion= Conexion1::conectar();
        public function conectar($conexion) {
            $sql = "INSERT INTO usuarios (NOMBRE_USUARIOS, TIPODOC_USUARIOS, NUMDOC_USUARIOS, DIRECCION_USUARIOS, ESTADO_USUARIO, TELEFONO_USUARIOS, CORREO_USUARIOS, CONTRASEÑA_USUARIOS, ID_ROLES_USUARIOS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssssssss", $this->NOMBRE_USUARIOS, $this->TIPODOC_USUARIOS, $this->NUMDOC_USUARIOS, $this->DIRECCION_USUARIOS, $this->ESTADO_USUARIO, $this->TELEFONO_USUARIOS, $this->CORREO_USUARIOS, $this->CONTRASEÑA_USUARIOS, $this->ID_ROLES_USUARIOS);
            $stmt->execute();
            
        }
    }

    class Domiciliario extends usuarios{
        public function conectar($conexion) {
            $sql = "INSERT INTO usuarios (NOMBRE_USUARIOS, TIPODOC_USUARIOS, NUMDOC_USUARIOS, DIRECCION_USUARIOS, ESTADO_USUARIO, TELEFONO_USUARIOS, CORREO_USUARIOS, CONTRASEÑA_USUARIOS, ID_ROLES_USUARIOS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssssssss", $this->NOMBRE_USUARIOS, $this->TIPODOC_USUARIOS, $this->NUMDOC_USUARIOS, $this->DIRECCION_USUARIOS, $this->ESTADO_USUARIO, $this->TELEFONO_USUARIOS, $this->CORREO_USUARIOS, $this->CONTRASEÑA_USUARIOS, $this->ID_ROLES_USUARIOS);
            $stmt->execute();   
            
        }
    }
    class Administrador extends usuarios{
        public function conectar($conexion) {
            $sql = "INSERT INTO usuarios (NOMBRE_USUARIOS, TIPODOC_USUARIOS, NUMDOC_USUARIOS, DIRECCION_USUARIOS, ESTADO_USUARIO, TELEFONO_USUARIOS, CORREO_USUARIOS, CONTRASEÑA_USUARIOS, ID_ROLES_USUARIOS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssssssss", $this->NOMBRE_USUARIOS, $this->TIPODOC_USUARIOS, $this->NUMDOC_USUARIOS, $this->DIRECCION_USUARIOS, $this->ESTADO_USUARIO, $this->TELEFONO_USUARIOS, $this->CORREO_USUARIOS, $this->CONTRASEÑA_USUARIOS, $this->ID_ROLES_USUARIOS);
            $stmt->execute(); 
               
        }
    }
    class UsuarioFactory {
        public static function crearUsuario($tipo, $NOMBRE_USUARIOS, $TIPODOC_USUARIOS, $NUMDOC_USUARIOS, $DIRECCION_USUARIOS, $ESTADO_USUARIO, $TELEFONO_USUARIOS, $CORREO_USUARIOS, $CONTRASEÑA_USUARIOS, $ID_ROLES_USUARIOS) {
            switch ($tipo) {
                case 2:
                    return new Paciente( $NOMBRE_USUARIOS, $TIPODOC_USUARIOS, $NUMDOC_USUARIOS, $DIRECCION_USUARIOS, $ESTADO_USUARIO, $TELEFONO_USUARIOS, $CORREO_USUARIOS, $CONTRASEÑA_USUARIOS, $ID_ROLES_USUARIOS);
                // Puedes agregar más tipos de usuarios aquí
                case 3:
                    return new Domiciliario( $NOMBRE_USUARIOS, $TIPODOC_USUARIOS, $NUMDOC_USUARIOS, $DIRECCION_USUARIOS, $ESTADO_USUARIO, $TELEFONO_USUARIOS, $CORREO_USUARIOS, $CONTRASEÑA_USUARIOS, $ID_ROLES_USUARIOS);
                case 1:
                    return new Administrador( $NOMBRE_USUARIOS, $TIPODOC_USUARIOS, $NUMDOC_USUARIOS, $DIRECCION_USUARIOS, $ESTADO_USUARIO, $TELEFONO_USUARIOS, $CORREO_USUARIOS, $CONTRASEÑA_USUARIOS, $ID_ROLES_USUARIOS);
                default:
                    throw new Exception("Tipo de usuario no válido.");
            }
        }
    }
?>