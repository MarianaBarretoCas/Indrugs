<?php
require_once 'conexion.php';
require_once 'Vehiculos.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombrePropietario = $_POST['PROPIETARIO_USUARIOS'];
    $stmt = $conexion->prepare("SELECT ID_USUARIOS FROM usuarios WHERE NOMBRE_USUARIOS = ?");
    $stmt->bind_param("s", $nombrePropietario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $PROPIETARIO_USUARIOS = $row['ID_USUARIOS'];
    } else {
        echo "No se encontró el medicamento proporcionado.";
        exit;
    } 

    $ID_VEHICULO = null;
    $PLACA_VEHICULO = $_POST['PLACA_VEHICULO'];
    $COLOR_VEHICULO = $_POST['COLOR_VEHICULO'];
    $MARCA_VEHICULO = $_POST['MARCA_VEHICULO'];
    $TIPO_VEHICULO = $_POST['TIPO_VEHICULO'];
    $ESTADO_VEHICULO = $_POST['ESTADO_VEHICULO'];
    
    
    try {
        $vehiculo = VehiculoFactory::crearVehiculo($TIPO_VEHICULO, $ID_VEHICULO, $PROPIETARIO_USUARIOS,  
        $PLACA_VEHICULO, $COLOR_VEHICULO, $MARCA_VEHICULO, $ESTADO_VEHICULO);
        $vehiculo->conectar($conexion);
        header('Location: 12.pagina_vehiculos.php?registro=exitoso');
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>