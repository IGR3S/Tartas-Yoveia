<?php
require_once("templates/header.php");
require_once("config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {

        $usuario = $_POST['usuario'];
        $contra  = $_POST['contra'];

        // --- HASHEAR LA CONTRASEÑA antes de guardarla ---
        $contraHasheada = password_hash($contra, PASSWORD_BCRYPT);
        //                              tu texto  algoritmo seguro

        // --- COMPROBAR SI EL USUARIO YA EXISTE ---
        $sqlCheck = "SELECT id FROM usuarios WHERE usuario = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("s", $usuario);
        $stmtCheck->execute();
        $stmtCheck->store_result();

        if ($stmtCheck->num_rows > 0) {
            echo "Ese nombre de usuario ya está en uso.";
            exit();
        }

        // --- INSERTAR USUARIO CON CONTRASEÑA HASHEADA ---
        $sql  = "INSERT INTO usuarios (usuario, contraseña, admin) VALUES (?, ?, 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $contraHasheada);

        if ($stmt->execute()) {
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