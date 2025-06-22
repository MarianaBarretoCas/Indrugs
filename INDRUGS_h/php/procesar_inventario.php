<?php
    require_once 'conexion.php';
    require_once 'inventario.php';

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombreMEDICA = $_POST['NOMBRE_MEDICAMENTOS'];
        $stmt = $conexion->prepare("SELECT ID_MEDICAMENTOS FROM medicamentos WHERE NOMBRE_MEDICAMENTOS = ?");
        $stmt->bind_param("s", $nombreMEDICA);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $ID_MEDICAMENTOS = $row['ID_MEDICAMENTOS'];
        } else {
            echo "No se encontró el propietario con el nombre proporcionado.";
            exit;
        } 

        $ID_INVENTARIO = null;
        $FECHA_ENTRADA_INVENTARIO = $_POST['FECHA_ENTRADA_INVENTARIO'];
        $FECHA_SALIDA_INVENTARIO = $_POST['FECHA_SALIDA_INVENTARIO'];
        $VENCIMIENTOMED_INVENTARIO = $_POST['VENCIMIENTOMED_INVENTARIO'];
        $STOCK_INVENTARIO = $_POST['STOCK_INVENTARIO'];
        $ESTADOMED_INVENTARIO = "activo"; 
        try {
            $inventario = InventarioFactory::crearInventario($ID_INVENTARIO, $FECHA_ENTRADA_INVENTARIO, $FECHA_SALIDA_INVENTARIO, $ID_MEDICAMENTOS, 
            $VENCIMIENTOMED_INVENTARIO, $STOCK_INVENTARIO, $ESTADOMED_INVENTARIO);
            $inventario->conectar($conexion);
            header('location: 17.pagina_inventario.php?registro=exitoso');
            exit();
        }catch (Exception $e) {
            echo "Error en la conexión: " . $e->getMessage();

        }
    }
    






?>