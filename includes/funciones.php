<?php
function obtenerTartas($conexion){

    $sql = "SELECT t.id_tarta, t.nombre_tarta, t.descripcion, t.precio, t.sin_azucar, t.img_entera
    FROM tartas t;";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $resultado;
}

?>