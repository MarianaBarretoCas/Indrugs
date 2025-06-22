<?php
include("conexion.php");
session_start();

if (!isset($_SESSION['ID_USUARIOS'])) {
    header("Location: ../2.pagina_inicio_sesion.html?error=sesion_no_iniciada");
    exit();
}

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de usuario no proporcionado.");
}

$query = "SELECT * FROM usuarios WHERE ID_USUARIOS = $id";
$result = $conexion->query($query);
$usuario = $result->fetch_assoc();

if (!$usuario) {
    die("Usuario no encontrado.");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];

    $update = "UPDATE usuarios SET 
        NOMBRE_USUARIOS = '$nombre',
        DIRECCION_USUARIOS = '$direccion',
        TELEFONO_USUARIOS = '$telefono',
        CORREO_USUARIOS = '$correo',
        ESTADO_USUARIO = '$estado'
        WHERE ID_USUARIOS = $id";

    if ($conexion->query($update)) {
        header("Location: 21.pagina_usuarios.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio administrador</title>
    <script src="https://kit.fontawesome.com/14122cd484.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/1.estilos_pagina_inicio.css">
    <link rel="stylesheet" href="../css/menu_usuarios.css">
</head>

<body>
	<header class="cabeza_indrugs">
        <div class="contenedeor_cabeza logo_nav_items">
            <a href="#" class="logo"><img class="img_indrugs_logo" src="../imagenes/logo.png">Indrugs</a>
            <a href="#"><input type="search" placeholder="Buscar..." id="buscador"></a>
            <nav class="navegacion_1">
                <ul class="barra_1">
                    <li id="items_barra1"><a href="7.pagina_sobre_nosotros.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/ubicacion.png"></a></li>
                     <li id="items_barra1"><a href="2.pagina_inicio_sesion.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/icons8-cerrar-sesión-96.png"></a></li>
                     <li id="items_barra1"><a href="5.pagina_pqrs.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/alerta.png"></a></li>
                 </ul>
             </nav>   
         </div>
         <hr class="linea_separación">
         <div class="contenedeor_cabeza logo_nav_items">
             <nav class="menu">
                 <ul class="barra_2">
                     <li id="items_barra"><a id="enlaces_barra" href="../20.pagina_principal_administrador.html">Inicio</a></li>
                     <li id="items_barra"><a id="enlaces_barra" href="21.pagina_usuarios.php">Usuarios</a></li> 
                     <li id="items_barra"><a id="enlaces_barra" href="17.pagina_inventario.php">Inventario</a></li>
                     <li id="items_barra"><a id="enlaces_barra" href="22.pagina_medicamento.php">Medicamento</a></li>
                     <li id="items_barra"><a id="enlaces_barra" href="18.pagina_orden_admin.php">Órdenes</a></li>
                     <li id="items_barra"><a id="enlaces_barra" href="../index.html">Cerrar sesión</a></li> 
                 </ul>
             </nav>
        </div>
        <hr class="linea_separación">
    </header>
    <main class="cuerpo_indrugs">
        <div class="contenido">
            <h1 >Editar usuario</h1>
            <form method="POST" id="registro" class="row mt-3 col-12 g-3 needs-validation"> 
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?= $usuario['NOMBRE_USUARIOS'] ?>" required><br>

                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" name="direccion" value="<?= $usuario['DIRECCION_USUARIOS'] ?>" required><br>

                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" value="<?= $usuario['TELEFONO_USUARIOS'] ?>" required><br>

                <label for="correo">Correo:</label>
                <input type="email" class="form-control" name="correo" value="<?= $usuario['CORREO_USUARIOS'] ?>" required><br>

                <label for="estado" >Estado:</label>
                <select class="form-control" name="estado">
                    <option value="ACTIVO" <?= $usuario['ESTADO_USUARIO'] == 'ACTIVO' ? 'selected' : '' ?>>Activo</option>
                    <option value="INACTIVO" <?= $usuario['ESTADO_USUARIO'] == 'INACTIVO' ? 'selected' : '' ?>>Inactivo</option>
                </select><br><br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>         
            </form>
             
        </div>    
    </main>
        
        <footer class="pie-pagina">
	<hr class="linea_separación">
        <div class="grupo-1">

            <div class="box">
                    <h2>Contactanos</h2>
                    <hr class="linea_separación">
                    <p><i class="fa-solid fa-phone" style="color: #6bd10c;"></i> 601 6783 546 / 601 6789 564</p>
                    <p><i class="fa-brands fa-whatsapp" style="color: #6bd10c;"></i> Línea WhatsApp 327 678 5679</p>
                    <p><i class="fa-brands fa-facebook" style="color: #6bd10c;"></i>Facebook Indrugs</p>
                </div>

            <div class="box">
                <h2>Nuestras tiendas</h2>
                <hr class="linea_separación"><p> Ubicar tienda  </p>
            </div>

            <div class="box">
                <h2> Categorias </h2>
                <hr class="linea_separación">
                <ul  class="lista_mapa_nav">
                    <li><a class="mapa_nav" href="../10.pagina_mapa_nav.html">Mapa de navegación</a></li>
                    <li><a class="mapa_nav" href="../404.html">Error 404</a></li>
                    <li><a class="mapa_nav" href="../500.html">Error 500</a></li>
                </ul>               
            </div>

            <div class="box">
                <h2> Nosotros</h2>
                <hr class="linea_separación"><ul  class="lista_mapa_nav">
                    <li><a class="mapa_nav" href="../7.pagina_sobre_nosotros.html">Quiénes somos</a></li>  
                    <li><a class="mapa_nav" href="../7.pagina_sobre_nosotros.html">Acerca del proyecto</a></li>  
                </ul>
                 
            </div>

        </div>

        <div class="grupo-2">
            <hr class="linea_separación">
            <small>DISPENSADORA DE MEDICAMENTOS InDrugs - La salud llega a tu puerta</small> 
            <hr class="linea_separación">  
        </div>
            
    </footer>
</body>
</html>
