<?php

/*************************************************************************************************************************************/

// En este archivo se define la clase Controlador que maneja la lógica de la aplicación y utiliza la clase BaseDatos para realizar los ABML DENTRO de la base de datos

/*************************************************************************************************************************************/

    require_once 'Articulo.php';
    require_once 'BaseDatos.php';
    require_once 'clase.php';
    class Controlador{
    
        private $base;
    
        public function __construct(){
            $this->base = new BaseDatos();
        }               

        /* Casos de uso */

        /* Agarra los datos para crear estudiante, crea el OBJETO estudiante para posteriorme ingresarlo en la BD  */
        public function altaEstudiante($IDEstudiante, $ci, $pasaporte, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass) {
            $estudiante = new Estudiante($IDEstudiante, $ci, $pasaporte, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass);
            $this->base->ingresarEstudiante($estudiante);
        }

        /* Elimina un estudiante de la base de datos usando su cédula como identificador único */
        public function eliminarEstudiante($ciEstudiante) {
            return $this->base->eliminarEstudiante($ciEstudiante);
        }

         public function modificarEstudiante($IDEstudiante, $ci, $pasaporte, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass) {
        return $this->base->modificarEstudiante($IDEstudiante, $ci, $pasaporte, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass);
        }

        public function altaClase($fecha, $hora, $tipo, $duracion) {
            $clase = new Clase(null, $fecha, $hora, $tipo, $duracion); 
            return $this->base->ingresarClase($clase);
        }
        

        public function traerTabla() {
            echo('<pre>');
            print_r($this->base->seleccionarTodos());
            echo('</pre>');
        }
    
    }
