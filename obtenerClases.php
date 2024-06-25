<?php
// obtenerClases.php

include("BaseDatos.php");

$baseDatos = new BaseDatos();
$clases = $baseDatos->obtenerClases();

$eventos = array();
foreach ($clases as $clase) {
    $fechaHora = $clase['fecha'] . 'T' . $clase['hora']; // Combina fecha y hora
    $fechaHoraFin = date('Y-m-d\TH:i:s', strtotime($fechaHora . ' + ' . $clase['duracion'] . ' minutes'));
    
    $eventos[] = array(
        'id' => $clase['id'],
        'title' => $clase['tipo'] . ' (' . $clase['duracion'] . ' min)',
        'start' => $fechaHora,
        'end' => $fechaHoraFin,
        'color' => $clase['tipo'] == 'Teórico' ? '#3788d8' : '#38B000' // Azul para teórico, verde para práctico
    );
}

// Devolver respuesta como JSON
header('Content-Type: application/json');
echo json_encode($eventos);

$baseDatos->cerrarConexion();
?>