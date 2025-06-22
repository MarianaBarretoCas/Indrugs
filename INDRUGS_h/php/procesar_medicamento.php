<?php
    require_once 'conexion.php';
    require_once 'medicamentos.php';
    //require_once 'usuario.php';
    


    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ID_MEDICAMENTOS = null;
        $NOMBRE_MEDICAMENTOS = $_POST['NOMBRE_MEDICAMENTOS'];    
        $DESCRIPCION_MEDICAMENTOS = $_POST['DESCRIPCION_MEDICAMENTOS'];
 
        try {
            $medicamentos = medicamentosFactory::crearMedicamento($ID_MEDICAMENTOS, $NOMBRE_MEDICAMENTOS, $DESCRIPCION_MEDICAMENTOS);
            $medicamentos->conectar($conexion);
            header('location: 22.pagina_medicamento.php?registro=exitoso');
            exit();
        }catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();

        }
    }
    






?>