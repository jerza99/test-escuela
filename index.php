<?php
    // Incluir el archivo que contiene la función
    include 'config.php';

    // Obtener los datos de las tablas utilizando la función
    $datos = Obtener_datos_de_las_3_Tablas();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela</title>
    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="text">
            <h1>Tabla de escuela</h1>
        </div>
        <div class="container-fluid p-2">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del alumno</th>
                        <th scope="col">Edad del alumno</th>
                        <th scope="col">Nombre del profesor </th>
                        <th scope="col">salón del alumno</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Datos de Alumnos
                    $index = 0;
                    while ($index < count($datos['alumnos'])) {
                        $alumno = $datos['alumnos'][$index];

                        echo '<tr>';
                        echo '<th scope="row">' . ($index + 1) . '</th>';
                        echo '<td>' . $alumno['nombre'] . '</td>';
                        echo '<td>' . $alumno['edad'] . '</td>';

                        // Datos de Profesores
                        if (isset($datos['profesores'][$index])) {
                            echo '<td>' . $datos['profesores'][$index]['nombre'] . '</td>';
                        } else {
                            echo '<td></td>';
                        }

                        // Datos de Salones
                        if (isset($datos['salon'][$index])) {
                            echo '<td>' . $datos['salon'][$index]['nombre'] . '</td>';
                        } else {
                            echo '<td></td>';
                        }

                        echo '</tr>';

                        $index++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>