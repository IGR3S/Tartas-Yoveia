<?php
    session_start();
    require_once __DIR__ . '/../includes/conexion.php';
    require_once __DIR__ . '/../includes/config.php';
    require_once __DIR__ . '/../includes/funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tartas Yoveia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="static/img/faviconPasteleriaResize.png">
    <link rel="stylesheet" href="static/css/estilo_B.css">

</head>
<body>
    <header>
        <div class="header-inner">
            <a href="inicio.php"><img class="logo" src="static/img/LogoPasteleria.png" alt="Tartas Yoveia"></a>
            <nav>
                <ul>
                    <li><a href="inicio.php">INICIO</a></li>
                    <li><a href="inventario.php">TARTAS</a></li>
                    <li><a href="contacto.php">ENCARGA TU TARTA</a></li>
                    <?php
                        if(isset($_SESSION['admin'])){ ?>
                        <li><a href="admin/panel.php">ADMINISTRACION</a></li>
                        <li><a href="logout.php">CERRAR SESION</a></li>
                    <?php } else if (isset($_SESSION['usuario'])){ ?>
                        <li><a href="logout.php">CERRAR SESION</a></li>
                    <?php } else { ?>
                        <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>