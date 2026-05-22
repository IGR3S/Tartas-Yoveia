<?php
require_once("templates/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {

        $usuario        = $_POST['usuario'];
        $contra         = $_POST['contra'];
        $contraHasheada = password_hash($contra, PASSWORD_BCRYPT);

        // --- COMPROBAR SI EL USUARIO YA EXISTE ---
        $sqlCheck  = "SELECT `id_usuario` FROM `usuarios` WHERE `nombre_usuario` = ?";
        $stmtCheck = $conexion->prepare($sqlCheck);
        $stmtCheck->execute([$usuario]);
        $existe = $stmtCheck->fetch();

        if ($existe) {
            echo "Ese nombre de usuario ya está en uso.";
            exit();
        }

        // --- INSERTAR USUARIO CON CONTRASEÑA HASHEADA ---
        $sql  = "INSERT INTO `usuarios` (`nombre_usuario`, `contraseña`, `administrador`) VALUES (?, ?, 0)";
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute([$usuario, $contraHasheada])) {
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
            <label>Usuario</label><br>
            <input type="text" name="usuario"><br>
            <label>Contraseña</label><br>
            <input type="password" name="contra"><br>
            <input type="submit" id="botonEnviar" name="enviar" value="Registrarse">
            <input type="button" id="botonCancelar" name="cancelar" value="Cancelar">
        </form>
    </div>
</body>
</html>

<?php
    require_once("templates/footer.php");
?>