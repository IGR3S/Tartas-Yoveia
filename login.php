<?php
require_once("templates/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {

        $usuario = $_POST['usuario'];
        $contra  = $_POST['contra']; // Contraseña en texto plano que escribió el usuario

        // --- CONSULTA PREPARADA ---
        $sql  = "SELECT usuario, contraseña, admin FROM usuarios WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // --- COMPROBAR SI EXISTE EL USUARIO ---
        if ($resultado->num_rows === 0) {
            echo "El usuario no existe, inténtelo de nuevo.";
            exit();
        }

        // --- OBTENER DATOS DEL USUARIO ---
        $fila      = $resultado->fetch_assoc();
        $usuarioBD = $fila['usuario'];
        $contraBD  = $fila['contraseña']; // Hash guardado en la BD
        $esAdmin   = (bool) $fila['admin'];

        // --- VERIFICAR LA CONTRASEÑA CON password_verify() ---
        if (!password_verify($contra, $contraBD)) {
            //  ^^^^^^^^^^^^^^
            //  Compara el texto plano con el hash de forma segura
            echo "Contraseña incorrecta, inténtelo de nuevo.";
            exit();
        }

        // --- SESIÓN SEGÚN ROL ---
        if ($esAdmin) {
            $_SESSION['admin']   = $usuarioBD;
        } else {
            $_SESSION['usuario'] = $usuarioBD;
        }

        $conn->close();
        header("Location: inicio.php");
        exit();

    } else {
        echo "Has dejado campos vacíos.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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