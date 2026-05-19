<?php
require_once("templates/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {

        $usuario        = $_POST['usuario'];
        $contra         = $_POST['contra'];
        $contraHasheada = password_hash($contra, PASSWORD_BCRYPT);

        // --- COMPROBAR SI EL USUARIO YA EXISTE ---
        $sqlCheck  = "SELECT id FROM usuarios WHERE usuario = ?";
        $stmtCheck = $conexion->prepare($sqlCheck);
        $stmtCheck->execute([$usuario]);
        $existe = $stmtCheck->fetch();

        if ($existe) {
            echo "Ese nombre de usuario ya está en uso.";
            exit();
        }

        // --- INSERTAR USUARIO CON CONTRASEÑA HASHEADA ---
        $sql  = "INSERT INTO usuarios (usuario, contraseña, admin) VALUES (?, ?, 0)";
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute([$usuario, $contraHasheada])) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error al registrar el usuario.";
            exit();
        }

    } else {
        echo "Has dejado campos vacíos.";
        exit();
    }
}
?>