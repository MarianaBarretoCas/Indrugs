<?php


    require_once 'conexion.php';
    require_once 'pqrs.php';



    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ID_PQRS = null; 
        $TIPO_SOLICITUD = $_POST['TIPO_SOLICITUD'];
        $NOMBRE_COMPLETO = $_POST['NOMBRE_COMPLETO'];
        $NUMERO_TELEFONO = $_POST['NUMERO_TELEFONO'];
        $TIPO_DOCUMENTO = $_POST['TIPO_DOCUMENTO'];
        $NUMERO_DOCUMENTO = $_POST['NUMERO_DOCUMENTO'];
        $MOTIVO_PQRS = $_POST['MOTIVO_PQRS'];
      session_start();
            $ID_USUARIOS = $_SESSION['ID_USUARIOS'];
        try {
            $pqrs =pqrsFactory::crearPQRS($ID_PQRS, $TIPO_SOLICITUD, $NOMBRE_COMPLETO, $NUMERO_TELEFONO, $TIPO_DOCUMENTO, $NUMERO_DOCUMENTO, $MOTIVO_PQRS,$ID_USUARIOS);
            $pqrs->conectar($conexion);
            header('location: ../5.pagina_pqrs.html?registro=exitoso');
            exit();
        } catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
    ?>