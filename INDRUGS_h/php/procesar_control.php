<?php
require_once 'conexion.php';
require_once 'control.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nombreUsuario = $_POST['NOMBRE_USUARIOS'];
    $stmt = $conexion->prepare("SELECT ID_USUARIOS FROM usuarios WHERE NOMBRE_USUARIOS = ?");
    $stmt->bind_param("s", $nombreUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $ID_USUARIO = $row['ID_USUARIOS'];
    } else {
        echo "No se encontró el usuario proporcionado.";
        exit;
    } 
    $nombreMedica = $_POST['NOMBRE_MEDICAMENTOS'];
    $stmt = $conexion->prepare("SELECT ID_MEDICAMENTOS FROM medicamentos WHERE NOMBRE_MEDICAMENTOS = ?");
    $stmt->bind_param("s", $nombreMedica);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $ID_MEDICAMENTOS = $row['ID_MEDICAMENTOS'];
    } else {
        echo "No se encontró el medicamento proporcionado.";
        exit;
    }
    $ID_CONTROL = null; 
    $FECHA_INICIO_TRATAMIENTO = $_POST['FECHA_INICIO_TRATAMIENTO'];
    $FECHA_FIN_TRATAMIENTO = $_POST['FECHA_FIN_TRATAMIENTO'];
    $PROBLEMA_SALUD = $_POST['PROBLEMA_SALUD'];
    $CANTIDAD_MEDIC = $_POST['CANTIDAD_MEDIC'];
    $FRECUENCIA_MEDIC = $_POST['FRECUENCIA_MEDIC'];
    $ALARMA_CONTROL = $_POST['ALARMA_CONTROL'];
    

    try {
        $control = controlFactory::crearControl($ID_CONTROL, $FECHA_INICIO_TRATAMIENTO, $FECHA_FIN_TRATAMIENTO, $PROBLEMA_SALUD, $CANTIDAD_MEDIC, $FRECUENCIA_MEDIC, $ALARMA_CONTROL, $ID_USUARIO,$ID_MEDICAMENTOS);
        $control->conectar($conexion);
        header('Location: 24.pagina_control.php?registro=exitoso');
        exit();
    } catch (Exception $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }
}
?>
