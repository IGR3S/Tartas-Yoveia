<?php 
$css = "contacto";
    require_once("templates/header.php");

?>

<?php
require_once("templates/header.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="page-content">
    <h2 class="titulos">CONTACTO</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre   = trim($_POST['nombre']   ?? '');
        $apellidos = trim($_POST['apellidos'] ?? '');
        $email    = trim($_POST['email']    ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $mensaje  = trim($_POST['mensaje']  ?? '');

        if (empty($nombre) || empty($telefono) || empty($mensaje)) {
            echo '<p class="form-error">Por favor, rellena los campos obligatorios.</p>';
        } else {
            // Aquí iría el envío del email con mail() o PHPMailer
            echo '<p class="form-ok">¡Mensaje enviado correctamente! Nos pondremos en contacto contigo pronto.</p>';
        }
    }
    ?>

    <div class="formContacto">
        <form action="contacto.php" method="post">

            <div class="form-row">
                <div class="form-group">
                    <label>Nombre <span class="obligatorio">*</span></label>
                    <input type="text" name="nombre" placeholder="Tu nombre">
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" placeholder="Tus apellidos">
                </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com">
            </div>

            <div class="form-group">
                <label>Teléfono <span class="obligatorio">*</span></label>
                <input type="tel" name="telefono" placeholder="+34 600 000 000">
            </div>

            <div class="form-group">
                <label>Mensaje <span class="obligatorio">*</span></label>
                <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..."></textarea>
            </div>

            <input type="submit" id="botonEnviar" value="Enviar mensaje">
            <input type="reset"  id="botonCancelar" value="Cancelar">

        </form>
    </div>
</div>

<?php require_once("templates/footer.php"); ?>
</body>
</html>
