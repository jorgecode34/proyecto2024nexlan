<?php

/*************************************************************************************************************************************/

// En este archivo define la clase BaseDatos, que se encarga de interactuar con la base de datos MySQL utilizando la extensión MySQLi. 

/*************************************************************************************************************************************/

class BaseDatos {
/********************************************************************************/
    private $servidor;      // En Xampp es "localhost"
    private $usuario;       // En Xampp es "root"
    private $password;      // En Xampp es ""
    private $base_datos;    // base datos en phpmyadmin
    private $conexion;      // Para las operaciones con MySQL
/********************************************************************************/	
    public function __construct() {
        $this->servidor = "localhost";
        $this->usuario = "root";
		$this->password = "";
		$this->base_datos = "proyectoNexlan2024";            // --------------------------------------> Cambiar el nombre de la base de datos
		$this->conexion = $this->nueva("localhost","root","","proyectoNexlan2024"); // ---------------> Cambiar el nombre de la base de datos
    }
/*******************************************************************************/	
    private function nueva($server,$user,$pass,$base) {  //-----------------------------> esta funcion es privada, no publica
        try {
            $conectar = mysqli_connect($server,$user,$pass,$base);
	    } catch (Exception $ex) {
            die($ex->getMessage());
	    }
	    return $conectar;
    }	
/********************************************************************************/
public function ingresarEstudiante($estudiante) {
    $IDEstudiante = $estudiante->getIdEstudiante();
    $ci = $estudiante->getCi();
    $pasaporte = $estudiante->getPasaporte();
    $primerNombre = $estudiante->getPrimerNombre();
    $segundoNombre = $estudiante->getSegundoNombre();
    $primerApellido = $estudiante->getPrimerApellido();
    $segundoApellido = $estudiante->getSegundoApellido();
    $calle = $estudiante->getCalle();
    $numeroPuerta = $estudiante->getNumeroPuerta();
    $barrio = $estudiante->getBarrio();
    $localidad = $estudiante->getLocalidad();
    $tel = $estudiante->getTel();
    $email = $estudiante->getEmail();
    $pass = $estudiante->getPass();

    $insertar = "INSERT INTO estudiante (IDEstudiante, ci, pasaporte, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, email, pass) 
                 VALUES ('$IDEstudiante' , '$ci', '$pasaporte', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$calle', '$numeroPuerta', '$barrio', '$localidad', '$tel', '$email', '$pass')";

    return mysqli_query($this->conexion, $insertar);
}
/********************************************************************************/
    public function seleccionarTodos() {
    	$resultado = mysqli_query($this->conexion, "select * from estudiante");//------------------> Cambiar tabla
    	$arreglo = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
    	return $arreglo;
    }
/********************************************************************************/

public function eliminarEstudiante($ciEstudiante) {
    $eliminar = "DELETE FROM estudiante WHERE ci = $ciEstudiante";
    return mysqli_query($this->conexion, $eliminar);
}

/********************************************************************************/
public function buscarEstudiantes($termino) {
    $consulta = "SELECT * FROM estudiante 
                 WHERE 
                 ci LIKE '%$termino%' 
                 OR 
                 primerNombre LIKE '%$termino%' 
                 OR 
                 primerApellido LIKE '%$termino%'";

    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $estudiantes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $estudiantes;
    } else {
        return [];
    }
}

/********************************************************************************/


public function modificarEstudiante($IDEstudiante , $ci, $pasaporte, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass) {
    $modificar = "UPDATE estudiante SET 
                    pasaporte = '$pasaporte',
                    primerNombre = '$primerNombre',
                    segundoNombre = '$segundoNombre',
                    primerApellido = '$primerApellido',
                    segundoApellido = '$segundoApellido',
                    calle = '$calle',
                    numeroPuerta = '$numeroPuerta',
                    barrio = '$barrio',
                    localidad = '$localidad',
                    tel = '$tel',
                    email = '$email',
                    pass = '$pass'
                 WHERE ci = '$ci'";

    return mysqli_query($this->conexion, $modificar);
}


public function ingresarClase($clase) {
    $fecha = $clase->getFecha();
    $hora = $clase->getHora();
    $tipo = $clase->getTipo();
    $duracion = $clase->getDuracion();

    $query = "INSERT INTO clases (fecha, hora, tipo, duracion) VALUES (?, ?, ?, ?)";
    $stmt = $this->conexion->prepare($query);
    $stmt->bind_param("sssi", $fecha, $hora, $tipo, $duracion);
    
    if ($stmt->execute()) {
        return $this->conexion->insert_id;
    } else {
        return false;
    }
}


public function obtenerClases() {
    $query = "SELECT id, fecha, hora, tipo, duracion FROM clases";
    $resultado = $this->conexion->query($query);
    $clases = array();
    while ($fila = $resultado->fetch_assoc()) {
        $clases[] = $fila;
    }
    return $clases;
}


/********************************************************************************/

public function cerrarConexion() {
    mysqli_close($this->conexion);
}
}

/********************************************************************************/
