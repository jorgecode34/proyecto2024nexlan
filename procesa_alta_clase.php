<?php
require_once 'Controlador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $duracion = $_POST['duracion'];

    $controlador = new Controlador();
    $resultado = $controlador->altaClase($fecha, $hora, $tipo, $duracion);

    if ($resultado) {
        echo json_encode(["success" => true, "id" => $resultado]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al agregar la clase"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Método no permitido"]);
}
?>