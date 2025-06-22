<?php
require_once 'conexion.php';
require_once 'orden.php'; 





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nombreUsuario = $_POST['USUARIOS_PACIENTE'];
    $stmt = $conexion->prepare("SELECT ID_USUARIOS FROM usuarios WHERE NOMBRE_USUARIOS = ?");
    $stmt->bind_param("s", $nombreUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $USUARIOS_PACIENTE = $row['ID_USUARIOS'];
    } else {
        echo "No se encontró el medicamento proporcionado.";
        exit;
    } 
    $nombreMedic = $_POST['NOMBRE_MEDICAMENTOS'];
    $stmt = $conexion->prepare("SELECT ID_MEDICAMENTOS FROM medicamentos WHERE NOMBRE_MEDICAMENTOS = ?");
    $stmt->bind_param("s", $nombreMedic);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $ID_MEDICAMENTOS = $row['ID_MEDICAMENTOS'];
    } else {
        echo "No se encontró el medicamento proporcionado.";
        exit;
    } 
    
    
    $ID_ORDENES = null; 
    $FECHA_ENTREGA = $_POST['FECHA_ENTREGA'];
    $EPS_ORDEN = $_POST['EPS_ORDEN'];
    $CANTIDADMED_ORDEN = $_POST['CANTIDAD_ORDEN'];
    $DIRECCION_ORDEN = $_POST['DIRECCION_ORDEN'];
    $TELEFONO_ORDEN = $_POST['TELEFONO_ORDEN'];
    $ESTADO_ORDEN = 'Activo';

    try {
        $orden = ordenesFactory::crearOrden($ID_ORDENES, $FECHA_ENTREGA, $EPS_ORDEN, $ESTADO_ORDEN, $USUARIOS_PACIENTE, $CANTIDADMED_ORDEN, $DIRECCION_ORDEN, $TELEFONO_ORDEN);
        $ID_ORDEN_INSERTADA = $orden->conectar($conexion);

        $stmt = $conexion->prepare("INSERT INTO ordenes_has_medicamentos (ID_ORDENES, ID_MEDICAMENTOS) VALUES (?, ?)");
        $stmt->bind_param("ii", $ID_ORDEN_INSERTADA, $ID_MEDICAMENTOS);
        $stmt->execute();
        header('Location: ../8.pagina_med.html?registro=exitoso');
        exit();
    } catch (Exception $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }
}
?>
