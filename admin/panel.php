<?php
require_once __DIR__ . '/../templates/header_admin.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}
?>
<main>
    <h1>Administracion de tartas</h1>
    <div class="botonesSobreTabla">
        <a href="proyecto_nuevo.php" id="botonVerde">Añadir Tarta</a>
    </div>
    
    <br><br>
    <table border="1">
        <tr>
            <th>ID Tarta</th>
            <th>Nombre Tarta</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Sin Azucar</th>
            <th>Imagen Entera</th>
            <th>Imagen Porción</th>
            <th>Acciones</th>
        </tr>

<?php 
    $resultado = obtenerTartas($conexion);
    $tartas = [];
    foreach ($resultado as $fila) {
        $id = $fila['id'];
        if (!isset($tartas[$id])) {
           $tartas[$id] = $fila;
        }
    }
    foreach ($tartas as $a) {
?>
        <tr>
            <td><?= $a['nombre'] ?></td>
            <td><?= $a['descripcion'] ?></td>
            <td><?= $a['precio'] ?></td>
            <td><?= $a['sin_azucar'] ?></td>
            <td><?= $a['img_entera'] ?></td>
            <td><?= $a['img_porcion'] ?></td>
            <td class="botonesTabla">
                <form action="proyecto_editar.php" method="post">
                    <input type="hidden" value="<?= $a['id'] ?>" name="id">
                    <input type="submit" value="Editar" id="botonAzul">
                </form>
                <form action="proyecto_borrar.php" method="post">
                    <input type="hidden" value="<?= $a['id'] ?>" name="id">
                    <input type="submit" value="Borrar" id="botonRojo">
                </form>
            </td>
        </tr>
    <?php } ?>
    </table>
</main>