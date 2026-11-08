<?php

namespace app\controllers;

use app\models\Vehiculo;
use app\models\Coche;
use app\models\Moto;

class VehicleController {
    private const COCHE = "coche";
    private const MOTO = "moto";
    
    // Los ":" indican el tipo de dato que se va a devolver (Vehiculo)
    // La "?" indica que puede devolver null 
    public function store($vehiculoData): ? Vehiculo{
        // Obtengo todos los vehiculos convertidos a objeto de tipo Vehiculo
        $vehiculos = $this->leerVehiculos();
        
        // Serializar el objeto a formato JSON
        $vehiculoDataJSON = json_decode($vehiculoData, true);
                
        switch (true) {
            case $vehiculoDataJSON['tipo'] === self::COCHE:
                $vehiculo = new Coche(
                (int)$vehiculoDataJSON['id'],
                $vehiculoDataJSON['marca'],
                $vehiculoDataJSON['modelo'],
                (int)$vehiculoDataJSON['anio'],
                self::COCHE,
                (int)$vehiculoDataJSON['puertas']);
                break;
            case $vehiculoDataJSON['tipo'] === self::MOTO:
                $vehiculo = new Moto(
                (int)$vehiculoDataJSON['id'],
                $vehiculoDataJSON['marca'],
                $vehiculoDataJSON['modelo'],
                (int)$vehiculoDataJSON['anio'],
                self::MOTO,
                (bool)$vehiculoDataJSON['sidecar']);
        }
        
        // Añado el nuevo vehículo al final de la lista
        array_push($vehiculos, $vehiculo);
        
        // Se mostrarán todos los vehículos en una nueva interfaz
        require_once __DIR__ . '/../views/vehiculo_post.php';
        
        return $vehiculo;
    }

    public function getById($id): ? Vehiculo {
        // Obtengo todos los vehiculos convertidos a objeto de tipo Vehiculo
        $vehiculos = $this->leerVehiculos();
        
        $vehiculoEncontrado = null;
        
        // Recorro la lista y busco el que me interesa. Si no lo encuentra, devolverá null
        foreach ($vehiculos as $vehiculo) {
            if($vehiculo->getId() === (int)$id) {
                $vehiculoEncontrado = $vehiculo;
                break; // Una vez encontrado, rompe el bucle
            }
        }
        
        // Se mostrarán los datos del vehículo en una nueva interfaz
        require_once __DIR__ . '/../views/vehiculo_get.php';
        
        return $vehiculoEncontrado;
    }
    
    private function leerVehiculos() {
        // Cargo el archivo desde aquí, ya que no se va a utilizar en ninguna otra función de esta clase
        require_once __DIR__ . '/../models/vehiculos_bbdd.php'; // Recibo la constante VEHICULOS
               
        $listaVehiculos = [];
        foreach (VEHICULOS as $vehiculo) {
            switch (true) {
                case $vehiculo['tipo'] === self::COCHE:
                    $vehiculo = new Coche(
                                          (int)$vehiculo['id'],
                                          $vehiculo['marca'],
                                          $vehiculo['modelo'],
                                          (int)$vehiculo['anio'],
                                          $vehiculo['tipo'],
                                          (int)$vehiculo['puertas']);
                    break;
                case $vehiculo['tipo'] === self::MOTO:
                    $vehiculo = new Moto(
                                        (int)$vehiculo['id'],
                                        $vehiculo['marca'],
                                        $vehiculo['modelo'],
                                        (int)$vehiculo['anio'],
                                        $vehiculo['tipo'],
                                        (bool)$vehiculo['sidecar']);
            }
            // Antes de la siguiente iteración, añado el vehículo, sea del tipo que sea al final de la lista
            array_push($listaVehiculos, $vehiculo);
        }
        
        return $listaVehiculos;
    }
}



