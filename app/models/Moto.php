<?php

namespace app\models;

class Moto extends Vehiculo{
    public bool $sidecar;
    
    public function __construct($id, $marca, $modelo, $anio, $tipo, $sidecar){
        // Llamo al constructor de la clase padre (Vehículos)
        parent::__construct($id, $marca, $modelo, $anio, $tipo);
        $this->sidecar = $sidecar;
    }
    
    public function isSidecar(): bool {
        return $this->sidecar;
    }
    
    public function setSidecar(bool $sidecar): self {
        $this->sidecar = $sidecar;
        
        return $this;
    }
}
?>