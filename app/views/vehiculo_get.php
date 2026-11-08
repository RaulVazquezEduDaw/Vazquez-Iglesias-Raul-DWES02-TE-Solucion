<?php
declare(strict_types=1);
namespace app\views;
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Detalles del Vehículo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <h1>Detalles del Vehículo</h1>
    	<?php if ($vehiculoEncontrado !== null) { ?>
        	<ul>
        		<li>ID: <?= $vehiculoEncontrado->getId() ?></li>
                <li>Marca: <?= $vehiculoEncontrado->getMarca() ?></li>
                <li>Modelo: <?= $vehiculoEncontrado->getModelo() ?></li>
                <li>Año: <?= $vehiculoEncontrado->getAnio() ?></li>
                <li>Tipo: <?= $vehiculoEncontrado->getTipo() ?></li>
            	<?php if ($vehiculoEncontrado->getTipo() === "coche") { ?>
            		<li>Número de puertas: <?= $vehiculoEncontrado->getPuertas() ?></li>
            	<?php } elseif ($vehiculoEncontrado->getTipo() === "moto") { ?>
            		<li>¿Tiene sidecar? <?= $vehiculoEncontrado->isSidecar() ? "Si" : "No" ?></li>
            	<?php } ?>
            </ul>
    	<?php } else { ?>
    		<h1>No se ha encontrado ningún vehículo</h1>
    	<?php }?>
    	<br>
        <a href="./">Volver</a>
    </body>
</html>
