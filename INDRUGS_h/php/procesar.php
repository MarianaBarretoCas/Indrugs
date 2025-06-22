<?php
    require_once 'conexion.php';
    require_once 'usuarios.php';
    //require_once 'usuario.php';
    
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $NOMBRE_USUARIOS = $_POST['NOMBRE_USUARIOS'];
        $TIPODOC_USUARIOS = $_POST['TIPODOC_USUARIOS'];
        $NUMDOC_USUARIOS = $_POST['NUMDOC_USUARIOS'];
        $DIRECCION_USUARIOS = $_POST['DIRECCION_USUARIOS'];
        $TELEFONO_USUARIOS = $_POST['TELEFONO_USUARIOS'];
        $CORREO_USUARIOS = $_POST['CORREO_USUARIOS'];
        $CONTRASEÑA_USUARIOS = $_POST['CONTRASEÑA_USUARIOS'];
        
        $ID_ROLES_USUARIOS = $_POST['ROLES_USUARIOS'];
        $tipo = $_POST['ROLES_USUARIOS']; 
        $ID_USUARIOS = NULL;  
        $ESTADO_USUARIOS = "activo";  
        
        //nombre
        if (!preg_match("/^[a-zA-Z\s]+$/", $NOMBRE_USUARIOS)) {
            die("❌ El nombre solo debe contener letras y espacios.");
        }
    
        // doc
        if (!preg_match("/^[0-9]+$/", $NUMDOC_USUARIOS)) {
            die("❌ El número de documento debe contener solo números.");
        }
    
        // tel
        if (!preg_match("/^[0-9\s\+]+$/", $TELEFONO_USUARIOS)) {
            die("❌ El teléfono solo debe contener números, espacios o +.");
        }
    
        // correo
        if (!preg_match("/^[^@\s]+@[^@\s]+\.[^@\s]+$/", $CORREO_USUARIOS)) {
            die("❌ Correo electrónico inválido.");
        }
    
        // contraseña caracteres
        if (strlen($CONTRASEÑA_USUARIOS) < 6) {
            die("❌ La contraseña debe tener al menos 6 caracteres.");
        }
    // no repetir
        if ($CONTRASEÑA_USUARIOS === $NOMBRE_USUARIOS || $CONTRASEÑA_USUARIOS === $NUMDOC_USUARIOS) {
            die("❌ La contraseña no puede ser igual al nombre ni al documento.");
        }
        //encrypy=t
        $CONTRASEÑA_USUARIOS = password_hash($CONTRASEÑA_USUARIOS, PASSWORD_BCRYPT);

        try {
            $usuarios = UsuarioFactory::crearUsuario($tipo, $NOMBRE_USUARIOS, $TIPODOC_USUARIOS,
             $NUMDOC_USUARIOS, $DIRECCION_USUARIOS, $ESTADO_USUARIOS, $TELEFONO_USUARIOS, 
             $CORREO_USUARIOS, $CONTRASEÑA_USUARIOS, $ID_ROLES_USUARIOS);
            $usuarios->conectar($conexion);
            header('location: ../2.pagina_inicio_sesion.html?registro=exitoso');
            exit();
        }catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();

        }
    }
    






?>