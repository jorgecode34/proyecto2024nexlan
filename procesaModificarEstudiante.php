<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de alta usuario con post */

/*************************************************************************************************************************************/

    require_once 'Controlador.php';
    $controlador = new Controlador();
    $resultado = $controlador->modificarEstudiante($_POST['IDEstudiante'] , $_POST['ci'], $_POST['pasaporte'], $_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['calle'], $_POST['numeroPuerta'], $_POST['barrio'], $_POST['localidad'], $_POST['tel'], $_POST['email'], $_POST['pass']);

    header('Location: estudiante.php');
?>