<?php
class Clase {

    private $IDClase;
    private $fecha;
    private $hora;
    private $tipo;
    private $duracion;

    public function __construct($IDClase, $fecha, $hora, $tipo, $duracion) {
        $this->IDClase = $IDClase;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->tipo = $tipo;
        $this->duracion = $duracion;
    }

    public function getIDClase() {
        return $this->IDClase;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function __toString() {
        return $this->IDClase . "," . $this->fecha . "," . $this->hora . "," . $this->tipo . "," . $this->duracion;
    }
}
?>
