<?php

namespace app\models;

class Coche extends Vehiculo{
    public int $puertas;
    
    public function __construct($id, $marca, $modelo, $anio, $tipo, $puertas){
        // Llamo al constructor de la clase padre (Vehículos)
        parent::__construct($id, $marca, $modelo, $anio, $tipo);
        $this->puertas = $puertas;
    }
    
    public function getPuertas(): int {
        return $this->puertas;
    }
    
    public function setPuertas(int $puertas): self {
        $this->puertas = $puertas;
        
        return $this;
    }
}
?>