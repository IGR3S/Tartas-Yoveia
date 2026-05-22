<?php
require_once("templates/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {

        $usuario = $_POST['usuario'];
        $contra  = $_POST['contra'];

        $sql  = "SELECT `nombre_usuario`, `contraseña`, `administrador` FROM `usuarios` WHERE `nombre_usuario` = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$usuario]);
        $fila = $stmt->fetch();

    if (!$fila) {
        echo "Usuario o contraseña incorrectos.";
        exit();
    }

    $usuarioBD = $fila['nombre_usuario'];
    $contraBD  = $fila['contraseña'];
    $esAdmin   = (bool) $fila['administrador'];  // ← no es 'admin', es 'administrador'

    if (!password_verify($contra, $contraBD)) {
        echo "Usuario o contraseña incorrectos.";
        exit();
    }
    session_regenerate_id(true);
    if ($esAdmin) {
        $_SESSION['admin']   = $usuarioBD;
    } else {
        $_SESSION['usuario'] = $usuarioBD;
    }
    $conexion = null;
    header("Location: inicio.php");
    exit();

    } else {
        echo "Has dejado campos vacíos.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="formLogin">
        <form action="login.php" method="post">
            <label>Usuario</label><br>
            <input type="text" name="usuario"><br>
            <label>Contraseña</label><br>
            <input type="password" name="contra"><br>
            <input type="submit" id="botonEnviar" name="enviar" value="Iniciar Sesion">
            <input type="button" id="botonCancelar" name="cancelar" value="Cancelar">
        </form>
    </div>
    <div class="contenedorRegistrarse">
        <p>Si no tienes una cuenta registrada, <a class="registrarse" href="registrar.php">registrate aquí</a></p>
    </div>
</body>
</html>

<?php
    require_once("templates/footer.php");
?>