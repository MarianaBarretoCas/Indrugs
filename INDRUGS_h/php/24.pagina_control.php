<?php
include("conexion.php");
session_start();

if (!isset($_SESSION['ID_USUARIOS'])) {
    header("Location: ../2.pagina_inicio_sesion.html?error=sesion_no_iniciada");
    exit();
}
$sql = "SELECT 
        c.ID_CONTROL,
        u.NOMBRE_USUARIOS,
        c.FECHA_INICIO_TRATAMIENTO,
        c.FECHA_FIN_TRATAMIENTO,
        c.PROBLEMA_SALUD,
        c.CANTIDAD_MEDIC,
        c.FRECUENCIA_MEDIC,
        c.ALARMA_CONTROL,
        m.NOMBRE_MEDICAMENTOS
        FROM control c
        JOIN usuarios u ON c.ID_USUARIO = u.ID_USUARIOS
        JOIN medicamentos m ON c.ID_MEDICAMENTOS = m.ID_MEDICAMENTOS;";
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
	<title>Control</title>
    <script src="https://kit.fontawesome.com/14122cd484.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/1.estilos_pagina_inicio.css">
    <link rel="stylesheet" href="../css/3.estilos_página_control.css">
        
</head>

<body>
	<header class="cabeza_indrugs">
        <div class="contenedeor_cabeza logo_nav_items">
            <a href="#" class="logo"><img class="img_indrugs_logo" src="../imagenes/logo.png">Indrugs</a>
            <a href="#"><input type="search" placeholder="Buscar..." id="buscador"></a>
            <nav class="navegacion_1">
                <ul class="barra_1">
                   <li id="items_barra1"><a href="../7.pagina_sobre_nosotros.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/ubicacion.png"></a></li>
                    <li id="items_barra1"><a href="../8.pagina_med.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/compras.png"></a></li>
                    <li id="items_barra1"><a href="../2.pagina_inicio_sesion.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/icons8-cerrar-sesión-96.png"></a></li>
                    <li id="items_barra1"><a href="../5.pagina_pqrs.html" id="enlaces_barra1"><img id="iconos"src="../Iconos/alerta.png"></a></li>
                </ul>
            </nav>   
        </div>
        <hr class="linea_separación">
        <div class="contenedeor_cabeza logo_nav_items">
            <nav class="menu">
                <ul class="barra_2">
                    <li id="items_barra"><a id="enlaces_barra" href="../1.pagina_principal_paciente.html">Inicio</a></li>
                    
                    <li id="items_barra"><a id="enlaces_barra" href="php/24.pagina_control.php">Control</a></li>
                    <li id="items_barra"><a id="enlaces_barra" href="../8.pagina_med.html">Medicamentos</a></li>
                    <li id="items_barra"><a id="enlaces_barra" href="../5.pagina_pqrs.html">PQRS</a></li> 
                    <li id="items_barra"><a id="enlaces_barra" href="../index.html">Cerrar sesión</a></li> 
                     
                </ul>
            </nav>
        </div>
        <hr class="linea_separación">
    </header>
    <main class="cuerpo_indrugs">
        <div class="contenido">
        <h1 id="titulo_control">Controles Médicos</h1>
            <?php  if($result->num_rows > 0){
                echo "<table id=\"tabla1\" class=\"table\">
                    <thead class=\"table-dark\">
                        <tr>
                            <th>ID</th>
                            <th>Paciente</th>
                            <th>Inicio Tratamiento</th>
                            <th>Fin Tratamiento</th>
                            <th>Problema Salud</th>
                            <th>Cantidad Medic.</th>
                            <th>Frecuencia Medic</th>
                            <th>Alarma</th>
                            <th>Nombre medicamentos</th>
                        </tr>
                    </thead>
                    <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['ID_CONTROL']}</td>
                            <td>{$row['NOMBRE_USUARIOS']}</td>
                            <td>{$row['FECHA_INICIO_TRATAMIENTO']}</td>
                            <td>{$row['FECHA_FIN_TRATAMIENTO']}</td>
                            <td>{$row['PROBLEMA_SALUD']}</td>
                            <td>{$row['CANTIDAD_MEDIC']}</td>
                            <td>{$row['FRECUENCIA_MEDIC']}</td>
                            <td>{$row['ALARMA_CONTROL']}</td>
                            <td>{$row['NOMBRE_MEDICAMENTOS']}</td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "No hay controles registrados.";
            }?>
            <a href="../3.pagina_de_control.html"><button class="btn btn-primary">Nuevo Control</button></a>
                
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
