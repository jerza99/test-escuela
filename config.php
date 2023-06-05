<?php
function Obtener_datos_de_las_3_Tablas()
{
    // Variables para la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = 'escuela';

    // Conexion a la base de datos
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Verificar si se conecto a la base de datos
    if (!$conn) {
        echo 'Error al conectar a MySQL';
        exit;
    }

    // Consulta para obtener los datos de alumnos
    $consulta1 = "SELECT nombre, edad FROM alumnos";
    $rest1 = mysqli_query($conn, $consulta1);

    // Obtener datos de la primera tabla
    $datos1 = mysqli_fetch_all($rest1, MYSQLI_ASSOC);

    // Consulta para obtener los datos de profesores
    $consulta2 = "SELECT nombre FROM profesores";
    $rest2 = mysqli_query($conn, $consulta2);

    // Obtener datos de la segunda tabla
    $datos2 = mysqli_fetch_all($rest2, MYSQLI_ASSOC);

    // Duplicar algunos datos en la segunda tabla (profesores)
    array_push($datos2, $datos2[0]);

    // Consulta para obtener los datos de salón
    $consulta3 = "SELECT nombre FROM salon";
    $rest3 = mysqli_query($conn, $consulta3);

    // Obtener datos de la tercera tabla
    $datos3 = mysqli_fetch_all($rest3, MYSQLI_ASSOC);
    
    // Duplicar algunos datos en la segunda tabla (profesores)
    array_push($datos3, $datos3[0]);

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);

    // Devolver los datos de las tablas
    return array(
        'alumnos' => $datos1,
        'profesores' => $datos2,
        'salon' => $datos3
    );
}
?>