<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de baja con post */

/*************************************************************************************************************************************/


require_once 'Controlador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ci'])) {
    $id = $_POST['ci'];
    
    $controlador = new Controlador();
    $controlador->eliminarEstudiante($id);
    
    header('Location: estudiante.php'); 
} else {
    echo "Error al procesar la solicitud de eliminación.";
}
?>
