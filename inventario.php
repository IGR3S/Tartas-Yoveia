<?php 
$css = "inventario";
require_once("templates/header.php");
?>

<?php
$sql = $conexion->query("SELECT * FROM tartas");
$tartas = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Tartas</title>
</head>
<body>

<div class="titulo">
    <h1>Inventario de Tartas</h1>
    <p>Catálogo completo · <?php echo count($tartas); ?> tartas disponibles</p>
    <span class="titulo-linea"></span>
</div>

<div class="grid">
<?php
if (count($tartas) > 0):
    foreach ($tartas as $tarta):
?>
    <div class="card">

        <?php if (!empty($tarta['img_entera'])): ?>
            <img class="card-img"
                 src="static/img/<?php echo rawurlencode(htmlspecialchars($tarta['img_entera'])); ?>"
                 alt="<?php echo htmlspecialchars($tarta['nombre_tarta']); ?>"
                 onerror="this.outerHTML='<div class=\'card-img-placeholder\'>🎂</div>';">
        <?php else: ?>
            <div class="card-img-placeholder">🎂</div>
        <?php endif; ?>

        <div class="card-body">
            <div class="card-title"><?php echo htmlspecialchars($tarta['nombre_tarta']); ?></div>
            <div class="descricpionTarta"><?php echo htmlspecialchars($tarta['descripcion']); ?></div>
            <div>
                <?php if ($tarta['sin_azucar']): ?>
                    <span class="lleva-azucar">🌿 Sin azúcar</span>
                <?php else: ?>
                    <span class="lleva-azucar">🍰 Con azúcar</span>
                <?php endif; ?>
            </div>
            <div class="precio">
                <?php echo number_format($tarta['precio'], 2, ',', '.'); ?> €
            </div>
        </div>

    </div>
<?php
    endforeach;
else:
?>
    <div class="empty">No hay tartas registradas en la base de datos.</div>
<?php endif; ?>
</div>

</body>
</html>

<?php $conexion = null; ?>

<?php require_once("templates/footer.php"); ?>