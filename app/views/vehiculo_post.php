<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Listado de vehículos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <h1>Listado de vehículos</h1>
    	<?php foreach($vehiculos as $vehiculo) { ?>
        	<ul>
        		<li>ID: <?= $vehiculo->getId() ?></li>
                <li>Marca: <?= $vehiculo->getMarca() ?></li>
                <li>Modelo: <?= $vehiculo->getModelo() ?></li>
                <li>Año: <?= $vehiculo->getAnio() ?></li>
                <li>Tipo: <?= $vehiculo->getTipo() ?></li>
            	<?php if ($vehiculo->getTipo() === "Coche") { ?>
            		<li>Número de puertas: <?= $vehiculo->getPuertas() ?></li>
            	<?php } elseif ($vehiculo->getTipo() === "Moto") { ?>
            		<li>¿Tiene sidecar? <?= $vehiculo->getSidecar() ? "Si" : "No" ?></li>
            	<?php } ?>
            </ul>
    	<?php } ?>
    	<br>
        <a href="./">Volver</a>
    </body>
</html>
