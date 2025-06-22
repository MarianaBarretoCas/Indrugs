<?php
session_start();

require_once 'conexion.php';

if(isset($_POST['CORREO_USUARIOS']) && isset($_POST['CONTRASEÑA_USUARIOS'])) {
    
    $CORREO_USUARIOS = $_POST['CORREO_USUARIOS'];
    $CONTRASEÑA_USUARIOS = $_POST['CONTRASEÑA_USUARIOS'];

    if (!preg_match("/^[^@\s]+@[^@\s]+\.[^@\s]+$/", $CORREO_USUARIOS)) {
        header("Location: ../2.pagina_inicio_sesion.html?error=correo_invalido");
        exit();
    }

    
    if (empty($CONTRASEÑA_USUARIOS)) {
        header("Location: ../2.pagina_inicio_sesion.html?error=clave_vacia");
        exit();
    }

    $sql = "SELECT * FROM usuarios WHERE CORREO_USUARIOS = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $CORREO_USUARIOS);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows === 1){
        $usuario = $result->fetch_assoc();
     
        if($usuario && password_verify($CONTRASEÑA_USUARIOS, $usuario['CONTRASEÑA_USUARIOS'])){
            $_SESSION['ID_USUARIOS'] = $usuario['ID_USUARIOS'];
            $_SESSION['CORREO_USUARIOS'] = $usuario['CORREO_USUARIOS'];
            $_SESSION['ID_ROLES_USUARIOS'] = $usuario['ID_ROLES_USUARIOS'];
            
            switch ($usuario['ID_ROLES_USUARIOS']) {
                case '1':
                    header('Location: ../20.pagina_principal_administrador.html');
                    exit();
                    
                case '2':
                    header('Location: ../1.pagina_principal_paciente.html');
                    exit();
                    
                case '3':
                    header('Location: ../11.pagina_principal_domiciliario.html');
                    exit();
                    
                default:
                    header("Location: ../2.pagina_inicio_sesion.html?error=rol_invalido");
                    exit();
                
            } exit();
        } else {
            header("Location: ../2.pagina_inicio_sesion.html?error=clave_incorrecta");
            exit();
        }
    } else {
        header("Location: ../2.pagina_inicio_sesion.html?error=usuario_no_encontrado");
        exit();
    }
} else {
    header("Location: ../2.pagina_inicio_sesion.html?error=faltan_campos");
    exit();
}

    













?>