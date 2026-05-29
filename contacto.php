<?php

$css = "contacto";
require_once("templates/header.php");

?>

<div class="contenido">
    <h2 class="titulos">ENCARGA TU TARTA</h2>

    <?php
    $nombre       = trim($_POST['nombre']        ?? '');
    $apellidos    = trim($_POST['apellidos']     ?? '');
    $email        = trim($_POST['email']         ?? '');
    $telefono     = trim($_POST['telefono']      ?? '');
    $fecha        = trim($_POST['fecha']         ?? '');
    $tarta        = trim($_POST['tarta_tematica']?? '');
    $mensaje      = trim($_POST['mensaje']       ?? '');

    if (empty($nombre) || empty($telefono) || empty($mensaje)) {
    echo '<p class="form-error">Por favor, rellena los campos obligatorios.</p>';
    } else {
        $destinatario = "tartasyoveiacrevi@gmail.com";
        $asunto = "Nueva encarga de tarta - " . $nombre;

        $cuerpo = "NUEVA ENCARGA DE TARTA\n\n";
        $cuerpo .= "Nombre: $nombre $apellidos\n";
        $cuerpo .= "Email: $email\n";
        $cuerpo .= "Teléfono: $telefono\n";
        $cuerpo .= "Fecha de recogida: " . trim($_POST['fecha'] ?? '') . "\n";
        $cuerpo .= "¿Tarta temática?: " . trim($_POST['tarta_tematica'] ?? '') . "\n\n";
        $cuerpo .= "Mensaje:\n$mensaje\n";

        $cabecera = "From: noreply@tudominio.com\r\n";
        if (!empty($email)) {
            $cabecera .= "Reply-To: $email\r\n";
        }

    if (mail($destinatario, $asunto, $cuerpo, $cabecera)) {
        echo '<p class="form-ok">¡Mensaje enviado correctamente! Nos pondremos en contacto contigo pronto.</p>';
    } else {
        echo '<p class="form-error">Hubo un error al enviar el mensaje. Inténtalo de nuevo.</p>';
    }
}
    ?>

    <div class="formContacto">
        
        <form action="" method="post">

            <div class="mismaLinea">
                <div class="campoFormulario">
                    <label>Nombre <span class="obligatorio">*</span></label>
                    <input type="text" name="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="campoFormulario">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" placeholder="Tus apellidos">
                </div>
            </div>

            <div class="campoFormulario">
                <label>Email</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com">
            </div>

            <div class="campoFormulario">
                <label>Teléfono <span class="obligatorio">*</span></label>
                <input type="tel" name="telefono" placeholder="+34 600 000 000" required>
            </div>

            <div class="campoFormulario">
                <label>Fecha De Recogida<span class="obligatorio">*</span></label>
                <input type="date" name="fecha" placeholder="Para cuando quieres la tarta" required>
            </div>

            <fieldset class="campoPersonalizada">
                <legend>¿TARTA TEMATICA?</legend>
                <div class="opciones">
                    <label><input type="radio" name="tarta_tematica" value="no" checked>No</label>
                    <label><input type="radio" name="tarta_tematica" value="si">Sí</label>
                </div>
            </fieldset>

            <div class="campoFormulario">
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