<?php

namespace app\models;

class Vehiculo{
    public int $id;
    public string $marca;
    public string $modelo;
    public int $anio;
    public string $tipo;
    
    public function __construct($id, $marca, $modelo, $anio, $tipo){
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
        $this->tipo = $tipo;
    }
    
    // NOTA: He autogenerado los getters y los setters con Eclipse
    public function getId(): int {
        return $this->id;
    }
    
    public function getMarca(): string {
        return $this->marca;
    }
    
    public function getModelo(): string {
        return $this->modelo;
    }
    
    public function getAnio(): int {
        return $this->anio;
    }
    
    public function getTipo(): string {
        return $this->tipo;
    }
    
    public function setId(int $id): self {
        $this->id = $id;
        
        return $this;
    }
    
    public function setMarca(string $marca): self {
        $this->marca = $marca;
        
        return $this;
    }
    
    public function setModelo(string $modelo): self {
        $this->modelo = $modelo;
        
        return $this;
    }
    
    public function setAnio(int $anio): self {
        $this->anio = $anio;
        
        return $this;
    }
    public function setTipo(string $tipo): self {
        $this->tipo = $tipo;
        
        return $this;
    }
}
?>