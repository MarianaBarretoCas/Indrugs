<?php
session_start();

if (!isset($_SESSION['ID_USUARIOS'])) {
    header("Location: ../2.pagina_inicio_sesion.html?error=sesion_no_iniciada");
    exit();
}

include("conexion.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de orden no proporcionado.");
}


$sql = "DELETE FROM ordenes WHERE ID_ORDENES = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: 18.pagina_orden_admin.php");
    exit();
} else {
    echo "Error al eliminar la orden: " . $conexion->error;
}
?>
