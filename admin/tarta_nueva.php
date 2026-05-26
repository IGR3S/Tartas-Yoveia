<?php
require_once __DIR__ . '/../templates/header_admin.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio'])) {

        $nombre      = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio      = $_POST['precio'];
        $sin_azucar  = isset($_POST['sin_azucar']) ? 1 : 0;
        $img_entera  = $_POST['img_entera'];

        $sql  = "INSERT INTO `tartas` (`nombre_tarta`, `descripcion`, `precio`, `sin_azucar`, `img_entera`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute([$nombre, $descripcion, $precio, $sin_azucar, $img_entera])) {
            header("Location: panel.php");
            exit();
        } else {
            echo "Error al añadir la tarta.";
        }
    } else {
        echo "Rellena los campos obligatorios.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Tarta</title>
</head>
<body>
<main>
    <h1>Añadir Tarta</h1>
    <div class="formAdmin">
        <form action="tarta_nueva.php" method="post">

            <label>Nombre *</label>
            <input type="text" name="nombre" placeholder="Nombre de la tarta">

            <label>Descripción *</label>
            <textarea name="descripcion" placeholder="Descripción de la tarta"></textarea>

            <label>Precio *</label>
            <input type="number" step="0.01" name="precio" placeholder="0.00">

            <label>
                <input type="checkbox" name="sin_azucar"> Sin azúcar
            </label>

            <label>Imagen entera</label>
            <input type="text" name="img_entera" placeholder="Tarta_Ejemplo.jpeg">

            <input type="submit" id="botonVerde" value="Añadir Tarta">
            <a href="panel.php"><input type="button" id="botonRojo" value="Cancelar"></a>
        </form>
    </div>
</main>
</body>
</html>