<?php
session_start();

if (!isset($_SESSION['ID_USUARIOS'])) {
    header("Location: ../2.pagina_inicio_sesion.html?error=sesion_no_iniciada");
    exit();
}
    include("conexion.php");
    $sql = "SELECT 
    o.ID_ORDENES,
    u.NOMBRE_USUARIOS,
    o.FECHA_ENTREGA,
    o.EPS_ORDEN,
    o.ESTADO_ORDEN,
    o.CANTIDADMED_ORDEN,
    o.DIRECCION_ORDEN,
    o.TELEFONO_ORDEN,
    m.NOMBRE_MEDICAMENTOS
    FROM ordenes o
    JOIN usuarios u ON o.USUARIOS_PACIENTE = u.ID_USUARIOS
    JOIN ordenes_has_medicamentos ohm ON o.ID_ORDENES = ohm.ID_ORDENES
    JOIN medicamentos m ON ohm.ID_MEDICAMENTOS = m.ID_MEDICAMENTOS;";
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
    <link rel="stylesheet" href="../css/14.estilos_pagina_órdenes.css">
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
            <h1>Órdenes</h2>

                <?php  if($result->num_rows > 0){
                    echo "<table id=\"tabla1\" class=\"table\">
                    <thead class=\"table-dark\">
                        <tr>
                            <th>ID</th>
                            <th>Usuarios</th>
                            <th>EPS</th>
                            <th>Fecha de entrega</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Cantidad solicitada</th>
                            <th>Nombre medicamento</th>
                            <th>Estado de orden</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    while ($row = $result->fetch_assoc()) {
                    $estadoTexto = strtoupper($row['ESTADO_ORDEN']) === 'ACTIVO' ? 'Activo' : 'Inactivo';
                        echo "
                        <tr>
                            <td>{$row['ID_ORDENES']}</td>
                            <td>{$row['NOMBRE_USUARIOS']}</td>
                            <td>{$row['EPS_ORDEN']}</td>
                            <td>{$row['FECHA_ENTREGA']}</td>
                            <td>{$row['DIRECCION_ORDEN']}</td>
                            <td>{$row['TELEFONO_ORDEN']}</td>
                            <td>{$row['CANTIDADMED_ORDEN']}</td>
                            <td>{$row['NOMBRE_MEDICAMENTOS']}</td>
                            <td>{$estadoTexto}</td>
                            <td><a href=\"eliminar_orden.php?id={$row['ID_ORDENES']}\"><button class=\"btn btn-primary\">Eliminar</button></a></td>
                            </tr>";
                    } echo "</tbody></table>";
                } else {
                    echo "No hay datos.";
                    }?>
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
                                <li><a class="mapa_nav" href="10.pagina_mapa_nav.html">Mapa de navegación</a></li>
                                <li><a class="mapa_nav" href="404.html">Error 404</a></li> 
                                <li><a class="mapa_nav" href="500.html">Error 500</a></li>  
                            </ul>
                        </div>
            
                        <div class="box">
                            <h2> Nosotros</h2>
                            <hr class="linea_separación"><ul  class="lista_mapa_nav">
                                <li><a class="mapa_nav" href="7.pagina_sobre_nosotros.html">Quiénes somos</a></li>  
                                <li><a class="mapa_nav" href="7.pagina_sobre_nosotros.html">Acerca del proyecto</a></li>  
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