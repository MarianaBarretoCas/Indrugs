<?php
session_start();

if (!isset($_SESSION['ID_USUARIOS'])) {
    header("Location: ../2.pagina_inicio_sesion.html?error=sesion_no_iniciada");
    exit();
}
    include("conexion.php");
    $sql = "SELECT 
        v.ID_VEHICULO, 
        u.NOMBRE_USUARIOS AS PROPIETARIO_NOMBRE, 
        v.TIPO_VEHICULO, 
        v.PLACA_VEHICULO, 
        v.COLOR_VEHICULO, 
        v.MARCA_VEHICULO, 
        v.ESTADO_VEHICULO
    FROM vehiculo v
    JOIN usuarios u ON v.PROPIETARIO_USUARIOS = u.ID_USUARIOS;
    ";
    $result= $conexion->query($sql);
    if (!$result) {
        die("Error en la consulta: " . $conexion->error);
    }
    ?>



<!DOCTYPE html>
<html>
<head>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Indrugs</title>
    <script src="https://kit.fontawesome.com/14122cd484.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/1.estilos_pagina_inicio.css">
    <link rel="stylesheet" href="../css/12.estilos_pagina_vehiculos.css">
</head>

<body>
	<header class="cabeza_indrugs">
        <div class="contenedeor_cabeza logo_nav_items">
            <a href="#" class="logo"><img class="img_indrugs_logo" src="../imagenes/logo.png">Indrugs</a>
            <a href="#"><input type="search" placeholder="Buscar..." id="buscador"></a>
            <nav class="navegacion_1">
                <ul class="barra_1">
                   <li id="items_barra1"><a href="../7.pagina_sobre_nosotros.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/ubicacion.png"></a></li>
                    <li id="items_barra1"><a href="../2.pagina_inicio_sesion.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/icons8-cerrar-sesión-96.png"></a></li>
                    <li id="items_barra1"><a href="../5.pagina_pqrs.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/alerta.png"></a></li>
                </ul>
            </nav>   
        </div>
        <hr class="linea_separación">
        <div class="contenedeor_cabeza logo_nav_items">
            <nav class="menu">
                <ul class="barra_2">
                    <li id="items_barra"><a id="enlaces_barra" href="../11.pagina_principal_domiciliario.html">Inicio</a></li>
                    <li id="items_barra"><a id="enlaces_barra" href="../15.pagina_domicilio_domi.html">Domicilio</a></li> 
                    <li id="items_barra"><a id="enlaces_barra" href="12.pagina_vehiculos.php">Vehículos</a></li>
                    <li id="items_barra"><a id="enlaces_barra" href="14.pagina_ordenes.php">Órdenes</a></li>
                    <li id="items_barra"><a id="enlaces_barra" href="../index.html">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
        <hr class="linea_separación">
    </header>
    <main class="cuerpo_indrugs">
        <div class="contenido">
            <h1>Vehículos</h2>
                <?php  if($result->num_rows > 0){
                echo "<table id=\"tabla1\" class=\"table\">
                <thead class=\"table-dark\">
                    <tr>
                        <th>ID</th>
                        <th>Propietario</th>
                        <th>Tipo</th>
                        <th>Placa</th>
                        <th>Color</th>
                        <th>Marca</th>
                        <th>Estados</th>
                    </tr>
                </thead>
                <tbody>
                ";
                while ($row = $result->fetch_assoc()) {
                
                    $estadoText = strtoupper($row['ESTADO_VEHICULO']) === 'ACTIVO' ? 'Activo' : 'Inactivo';
                    echo "
                    <tr id=\"cuerpo_tabla\">
                        <td>{$row['ID_VEHICULO']}</td>
                        <td>{$row['PROPIETARIO_NOMBRE']}</td>
                        <td>{$row['TIPO_VEHICULO']}</td>
                        <td>{$row['PLACA_VEHICULO']}</td>
                        <td>{$row['COLOR_VEHICULO']}</td>
                        <td>{$row['MARCA_VEHICULO']}</td>
                        <td>{$estadoText}</td>
                    </tr>";
                } echo "</tbody></table>";
            } else {
                echo "No hay datos.";
                }?>
            <a href="../13_pagina_agregar_vehiculo.html"><button class="btn btn-primary">Agregar vehículo</button></a>
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