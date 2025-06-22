<?php
$host = "localhost";
$dbname = "indrugs";
$username = "root";
$password = ""; 

$conexion = new mysqli($host, $username, $password, $dbname, 3306);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}
?>
