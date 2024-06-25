<?php
class estudiante {

    private $IDEstudiante;
    private $ci;
    private $pasaporte;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $calle;
    private $numeroPuerta;
    private $barrio;
    private $localidad;
    private $tel;
    private $email;
    private $pass;

    public function __construct($IDEstudiante, $ci, $pasaporte, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass) {
        $this->IDEstudiante = $IDEstudiante;
        $this->ci = $ci;
        $this->pasaporte = $pasaporte;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->calle = $calle;
        $this->numeroPuerta = $numeroPuerta;
        $this->barrio = $barrio;
        $this->localidad = $localidad;
        $this->tel = $tel;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function getIdEstudiante(){
        return $this->IDEstudiante;
    }

    public function getCi() {
        return $this->ci;
    }

    public function getPasaporte() {
        return $this->pasaporte;
    }

    public function getPrimerNombre() {
        return $this->primerNombre;
    }

    public function getSegundoNombre() {
        return $this->segundoNombre;
    }

    public function getPrimerApellido() {
        return $this->primerApellido;
    }

    public function getSegundoApellido() {
        return $this->segundoApellido;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getNumeroPuerta() {
        return $this->numeroPuerta;
    }

    public function getBarrio() {
        return $this->barrio;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass(){
        return $this->pass;
    }

    public function __toString() {
        return $this->IDEstudiante . "," . $this->ci . "," . $this->pasaporte . "," . $this->primerNombre . "," . $this->segundoNombre . "," . $this->primerApellido . "," . $this->segundoApellido . "," . $this->calle . "," . $this->numeroPuerta . "," . $this->barrio . "," . $this->localidad . "," . $this->tel . "," . $this->email . "," . $this->pass;
    }
}
?>
