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
    <style>
        /* ── MOBILE FIRST ── */

        .titulo {
            text-align: center;
            margin: 24px 16px 32px;
        }

        .titulo h1 {
            font-size: clamp(1.6rem, 6vw, 3rem);
            color: #ff69b4;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 0 2px 12px rgba(255,105,180,0.18);
        }

        .titulo p {
            margin-top: 8px;
            color: #b06090;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .titulo-linea {
            display: block;
            width: 60%;
            height: 4px;
            background: #f9b8d8;
            border-radius: 4px;
            margin: 12px auto 0;
        }

        /* ── GRID ── */
        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 0 16px 40px;
            margin: 0 auto;
            max-width: 1200px;
        }

        /* ── CARD ── */
        .card {
            border-radius: 16px;
            border: 1.5px solid #f9b8d8;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #ffffff;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(255,105,180,0.18);
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .card-img-placeholder {
            width: 100%;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            background: #fff0f7;
        }

        .card-body {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .card-title {
            font-size: 1.1rem;
            color: #e0408a;
            font-weight: 700;
        }

        .card-desc {
            font-size: 14px;
            color: #7a3a5e;
            line-height: 1.6;
            flex: 1;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .lleva-azucar {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            letter-spacing: 0.5px;
            background: #fff4f9;
            color: #e0408a;
            border: solid 1px #f9b8d8;
        }

        .precio {
            font-size: 1.3rem;
            color: #ff69b4;
            font-weight: 700;
            margin-top: 4px;
        }

        .empty {
            text-align: center;
            color: #b06090;
            font-size: 1rem;
            padding: 40px 16px;
        }

        /* ── TABLET (2 columnas) ── */
        @media (min-width: 600px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px;
                padding: 0 24px 48px;
            }

            .titulo {
                margin: 32px 24px 40px;
            }

            .titulo-linea {
                width: 40%;
            }
        }

        /* ── PC (3 columnas) ── */
        @media (min-width: 1024px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 32px;
                padding: 0 40px 60px;
            }

            .titulo {
                margin: 48px 40px 48px;
            }

            .titulo-linea {
                width: 30%;
            }

            .card-img {
                height: 220px;
            }

            .card-body {
                padding: 22px 24px 18px;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .card-desc {
                font-size: 15px;
            }

            .precio {
                font-size: 1.5rem;
            }
        }
    </style>
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
            <div class="card-desc"><?php echo htmlspecialchars($tarta['descripcion']); ?></div>
            <div class="card-meta">
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