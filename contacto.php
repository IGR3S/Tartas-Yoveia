<?php

$css = "contacto";
require_once("templates/header.php");

?>

<div class="page-content">
    <h2 class="titulos">ENCARGA TU TARTA</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nombre   = trim($_POST['nombre']   ?? '');
        $apellidos = trim($_POST['apellidos'] ?? '');
        $email    = trim($_POST['email']    ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $mensaje  = trim($_POST['mensaje']  ?? '');

        if (empty($nombre) || empty($telefono) || empty($mensaje)) {
            echo '<p class="form-error">Por favor, rellena los campos obligatorios.</p>';
        } else {
            // Aquí iría el envío con PHPMailer o mail()
            echo '<p class="form-ok">¡Mensaje enviado correctamente! Nos pondremos en contacto contigo pronto.</p>';
        }
    }
    ?>

    <div class="formContacto">
        
        <form action="" method="post">

            <div class="form-row">
                <div class="form-group">
                    <label>Nombre <span class="obligatorio">*</span></label>
                    <input type="text" name="nombre" placeholder="Tu nombre" required>
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
                <input type="tel" name="telefono" placeholder="+34 600 000 000" required>
            </div>

            <div class="form-group">
                <label>Fecha De Recogida<span class="obligatorio">*</span></label>
                <input type="date" name="fecha" placeholder="Para cuando quieres la tarta" required>
            </div>

            <fieldset class="tarta-fieldset">
                <legend>¿TARTA TEMATICA?</legend>
                <div class="opciones">
                    <label><input type="radio" name="tarta_tematica" value="no" checked>No</label>
                    <label><input type="radio" name="tarta_tematica" value="si">Sí</label>
                </div>
            </fieldset>

            <div class="form-group">
                <label>Mensaje <span class="obligatorio">*</span></label>
                <textarea name="mensaje" placeholder="Escribe la informacion de la tarta que quieres..." required></textarea>
            </div>

            <input type="submit" id="botonEnviar" value="Enviar mensaje">
            <input type="reset"  id="botonCancelar" value="Cancelar">

        </form>
    </div>
</div>

<?php 

    require_once("templates/footer.php"); 

?> 