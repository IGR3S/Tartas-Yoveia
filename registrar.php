<?php
require_once("templates/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        !empty($_POST['nombre'])    &&
        !empty($_POST['telefono'])  &&
        !empty($_POST['correo'])    &&
        !empty($_POST['contra'])
    ) {

        $nombre    = $_POST['nombre'];
        $telefono  = $_POST['telefono'];
        $correo    = $_POST['correo'];
        $contra    = $_POST['contra'];
        $contraHasheada = password_hash($contra, PASSWORD_BCRYPT);

        // --- COMPROBAR SI EL CORREO YA EXISTE ---
        $sqlCheck  = "SELECT `id_usuario` FROM `usuarios` WHERE `correo_usuario` = ?";
        $stmtCheck = $conexion->prepare($sqlCheck);
        $stmtCheck->execute([$correo]);
        $existe = $stmtCheck->fetch();

        if ($existe) {
            echo "Ese correo ya está registrado.";
            exit();
        }

        // --- INSERTAR USUARIO ---
        $sql  = "INSERT INTO `usuarios` (`nombre_usuario`, `telefono_usuario`, `correo_usuario`, `contraseña`, `administrador`) VALUES (?, ?, ?, ?, 0)";
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute([$nombre, $telefono, $correo, $contraHasheada])) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error al registrar el usuario.";
            exit();
        }

    } else {
        echo "Ha dejado campos vacíos.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <div class="formLogin">
        <form action="registrar.php" method="post">

            <label>Nombre de Usuario*</label>
            <input type="text" name="nombre" placeholder="Tu nombre">

            <label>Teléfono *</label>
            <input type="tel" name="telefono" placeholder="+34 600 000 000">

            <label>Gmail *</label>
            <input type="email" name="correo" placeholder="correo@gmail.com">

            <label>Contraseña *</label>
            <input type="password" name="contra" placeholder="Tu contraseña">

            <input type="submit" id="botonEnviar" name="enviar" value="Registrarse">
            <a href="index.php"><input type="button" id="botonCancelar" value="Cancelar"></a>

        </form>
    </div>
</body>
</html>

<?php
    require_once("templates/footer.php");
?>