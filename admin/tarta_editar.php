<?php
require_once __DIR__ . '/../templates/header_admin.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && !isset($_POST['guardar'])) {
    $id   = $_POST['id'];
    $sql  = "SELECT * FROM `tartas` WHERE `id_tarta` = ?";
    $stmt = $conexion->prepare($sql);
    //EL FALLO QUE HAY AQUI NO AFECTA AL CODIGO, ES UN AVISO DE INTELPHENSE PQ NO ENCUENTRA EL ARCHIVO CONEXION
    $stmt->execute([$id]);
    $tarta = $stmt->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar'])) {
    $id          = $_POST['id'];
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio      = $_POST['precio'];
    $sin_azucar  = isset($_POST['sin_azucar']) ? 1 : 0;
    $img_entera  = $_POST['img_entera'];

    $sql  = "UPDATE `tartas` SET `nombre_tarta`=?, `descripcion`=?, `precio`=?, `sin_azucar`=?, `img_entera`=? WHERE `id_tarta`=?";
    $stmt = $conexion->prepare($sql);
    //EL FALLO QUE HAY AQUI NO AFECTA AL CODIGO, ES UN AVISO DE INTELPHENSE PQ NO ENCUENTRA EL ARCHIVO CONEXION

    if ($stmt->execute([$nombre, $descripcion, $precio, $sin_azucar, $img_entera, $id])) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Error al guardar los cambios.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarta</title>
</head>
<body>
<main>
    <h1>Editar Tarta</h1>
    <div class="formAdmin">
        <form action="tarta_editar.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($tarta['id_tarta']) ?>">
            <input type="hidden" name="guardar" value="1">

            <label>Nombre *</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($tarta['nombre_tarta']) ?>">

            <label>Descripción *</label>
            <textarea name="descripcion"><?= htmlspecialchars($tarta['descripcion']) ?></textarea>

            <label>Precio *</label>
            <input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($tarta['precio']) ?>">

            <label>
                <input type="checkbox" name="sin_azucar" <?= $tarta['sin_azucar'] ? 'checked' : '' ?>> Sin azúcar
            </label>

            <label>Imagen entera</label>
            <input type="text" name="img_entera" value="<?= htmlspecialchars($tarta['img_entera']) ?>">

            <input type="submit" id="aceptar" value="GUARDAR CAMBIOS">
            <a href="panel.php"><input type="button" id="cancelar" value="CANCELAR"></a>
        </form>
    </div>
</main>
</body>
</html>