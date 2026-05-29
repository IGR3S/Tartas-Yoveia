<?php
require_once __DIR__ . '/../templates/header_admin.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])) {
    $id   = $_POST['id'];
    $sql  = "DELETE FROM `tartas` WHERE `id_tarta` = ?";
    $stmt = $conexion->prepare($sql);
    //EL FALLO QUE HAY AQUI NO AFECTA AL CODIGO, ES UN AVISO DE INTELPHENSE PQ NO ENCUENTRA EL ARCHIVO CONEXION

    if ($stmt->execute([$id])) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Error al borrar la tarta.";
    }
} else {
    header("Location: panel.php");
    exit();
}
?>