<?php
require_once __DIR__ . '/../templates/header_admin.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}
?>
<main>
    <h1>ADMINISTRACIÓN DE TARTAS</h1>
    <div class="botonAñadir">
        <a href="tarta_nueva.php" id="botonVerde">AÑADIR TARTA</a>
    </div>
    
    <br><br>
    <table>
        <tr>
            <th>Nombre Tarta</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>

<?php 
    $resultado = obtenerTartas($conexion);
    $tartas = [];
    foreach ($resultado as $fila) {
    $id = $fila['id_tarta'];  
    if (!isset($tartas[$id])) {
       $tartas[$id] = $fila;
    }
}
foreach ($tartas as $a) {
?>
    <tr>
        <td><?= $a['nombre_tarta'] ?></td>     
        <td><?= $a['descripcion'] ?></td>
        <td><?= $a['precio'] ?></td>
        <td>
            <?php if (!empty($a['img_entera'])): ?>
                <img src="../static/img/<?= rawurlencode(htmlspecialchars($a['img_entera'])) ?>" 
                    alt="<?= htmlspecialchars($a['nombre_tarta']) ?>"
                    style="width:80px; height:60px; object-fit:cover; border-radius:6px;">
            <?php else: ?>
                🎂
            <?php endif; ?>
        </td>
        <td class="botonesTabla">
            <form action="tarta_editar.php" method="post">
                <input type="hidden" value="<?= $a['id_tarta'] ?>" name="id">  
                <input type="submit" value="EDITAR" id="botonAzul">
            </form>
            <form action="tarta_borrar.php" method="post">
                <input type="hidden" value="<?= $a['id_tarta'] ?>" name="id"> 
                <input type="submit" value="BORRAR" id="botonRojo">
            </form>
        </td>
    </tr>
<?php } ?>