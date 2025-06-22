<?php
session_start();

if (!isset($_SESSION['ID_USUARIOS'])) {
    header("Location: ../2.pagina_inicio_sesion.html?error=sesion_no_iniciada");
    exit();
}
    include("conexion.php");

    $filtro = $_POST['filtro'] ?? '';
    $estado = $_POST['estado'] ?? '';

    $sql = "SELECT 
    u.ID_USUARIOS,
    r.NOMBRE_ROL,
    u.NOMBRE_USUARIOS,
    u.TIPODOC_USUARIOS,
    u.NUMDOC_USUARIOS,
    u.DIRECCION_USUARIOS,
    u.TELEFONO_USUARIOS,
    u.CORREO_USUARIOS,
    u.ESTADO_USUARIO
    FROM usuarios u
    JOIN roles r ON u.ID_ROLES_USUARIOS = r.ID_ROLES";

    $condiciones = [];

    if (!empty($filtro)) {
        $condiciones[] = "u.ID_ROLES_USUARIOS = " . intval($filtro);
    }

    if (!empty($estado)) {
        $condiciones[] = "u.ESTADO_USUARIO = '" . $conexion->real_escape_string($estado) . "'";
    }

    if (count($condiciones) > 0) {
        $sql .= " WHERE " . implode(" AND ", $condiciones);
    }

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
            <h1 class="tabla_usuarios">USUARIOS</h1>

            <form method="POST" action="21.pagina_usuarios.php" id="registro" class="row mt-3 g-3 needs-validation"> 
                
                <section class="filtrar-usuarios">
                    <label for="filtro">Filtro por rol:</label>
                    <select name="filtro" id="filtro">
                        <option value="">Todos</option>
                        <option value="1" <?= ($filtro == '1') ? 'selected' : '' ?>>Administrador</option>
                        <option value="2" <?= ($filtro == '2') ? 'selected' : '' ?>>Paciente</option>
                        <option value="3" <?= ($filtro == '3') ? 'selected' : '' ?>>Domiciliario</option>
                    </select>
                <label for="estado">Estado:</label>
                <select name="estado" id="estado">
                    <option value="">Todos</option>
                    <option value="ACTIVO" <?= (isset($_POST['estado']) && $_POST['estado'] == 'ACTIVO') ? 'selected' : '' ?>>Activo</option>
                    <option value="INACTIVO" <?= (isset($_POST['estado']) && $_POST['estado'] == 'INACTIVO') ? 'selected' : '' ?>>Inactivo</option>
                </select>
                    <button type="submit" class="butn_filtro" >Filtrar</button>
                </section>
            </form>
            <?php  if($result->num_rows > 0){
                echo "<table id=\"tabla1\" class=\"table\">
                <thead class=\"table-dark\">
                    <tr>
                        <th>Rol</th>
                        <th>Usuario</th>
                        <th>Tipo de documento</th>
                        <th>Documento</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                ";
                while ($row = $result->fetch_assoc()) {
                $estadoTexto = strtoupper($row['ESTADO_USUARIO']) === 'ACTIVO' ? 'Activo' : 'Inactivo';
                    echo "
                    <tr>
                        <td>{$row['NOMBRE_ROL']}</td>
                        <td>{$row['NOMBRE_USUARIOS']}</td>
                        <td>{$row['TIPODOC_USUARIOS']}</td>
                        <td>{$row['NUMDOC_USUARIOS']}</td>
                        <td>{$row['DIRECCION_USUARIOS']}</td>
                        <td>{$row['TELEFONO_USUARIOS']}</td>
                        <td>{$row['CORREO_USUARIOS']}</td>
                        <td>{$estadoTexto}</td>
                        <td><a href=\"actualizar_usuario.php?id={$row['ID_USUARIOS']}\"><button class=\"btn btn-primary\">Editar</button></a></td>
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
