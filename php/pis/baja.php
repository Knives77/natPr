<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teléfonos</title>
    <link rel="stylesheet" href="../../css/style.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100..900&display=swap");

        main {
            /* padding-top: 150px; */
            background-image: url('../../img/fondos/pis4.jpg');
            color: white;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border: 2px solid white;
            border-radius: 10px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 2px solid white;
            font-size: 25px;
            font-family: "Fira Sans", sans-serif;
            font-optical-sizing: auto;
        }

        th {
            background-color: #0059ff;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        label {
            width: 15%;
            margin-bottom: 5px;
            margin-right: 30px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 20%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #000;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 8%;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #ff0000;
        }
    </style>
</head>

<body>
    <header>
        <div class="titulo">
            <h1>NATTT</h1>
        </div>
        <nav>
            <div class="nav-item">
                <select class="nav-btn" id="loby">
                    <option selected value="principal">Principal</option>
                    <option value="galeria">Galeria</option>
                </select>
            </div>
            <div class="nav-item">
                <select class="nav-btn" id="nad">
                    <option selected disabled>Nadadores</option>
                    <option value="consulta1">Consulta</option>
                    <option value="altas1">Altas</option>
                    <option value="bajas1">Bajas</option>
                    <option value="editar1">Editar</option>
                </select>
            </div>
            <div class="nav-item">
                <select class="nav-btn" id="ent">
                    <option selected disabled>Entrenadores</option>
                    <option value="consulta2">Consulta</option>
                    <option value="altas2">Altas</option>
                    <option value="bajas2">Bajas</option>
                    <option value="editar2">Editar</option>
                </select>
            </div>
            <div class="nav-item">
                <select class="nav-btn" id="pis">
                    <option disabled>Piscinas</option>
                    <option value="consulta3">Consulta</option>
                    <option value="altas3">Altas</option>
                    <option selected value="bajas3">Bajas</option>
                    <option value="editar3">Editar</option>
                </select>
            </div>
            <div class="nav-item">
                <select class="nav-btn" id="eq">
                    <option selected disabled>Equipos</option>
                    <option value="consulta4">Consulta</option>
                    <option value="altas4">Altas</option>
                    <option value="bajas4">Bajas</option>
                    <option value="editar4">Editar</option>
                </select>
            </div>
            <div class="close-btn">
                <button class="cerrar" id="cerrar">
                    <i class="fi fi-br-cross"></i>
                </button>
            </div>
        </nav>
    </header>
    <main>
        <h2 class="section-title">
            Bajas-Piscinas
        </h2>
        <div class="cons">
            <div class="form-content">
                <form action="eliminar.php" method="POST" onsubmit="confirmarEliminacion(event)">
                    <label for="eliminar">ID: </label>
                    <input type="number" name="eliminar" id="eliminar" required>
                    <input type="submit" value="Eliminar">
                    <input type="reset" value="Reset">
                    <br>
                </form>
                <br>
            </div>
            <?php
            include_once "../conex.php";
            // Realizar la consulta
            $sql = "SELECT * FROM piscinas";
            $resultado = $conexion->query($sql);
            // Verificar si hay resultados
            if ($resultado->num_rows > 0) {
                // Comenzar a imprimir la tabla HTML
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Ubicación</th><th>Metros cuadrados (m2)</th><th>Profundidad (m)</th><th>Imagen</th></tr>";

                // Iterar sobre los resultados y mostrar cada fila
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["ID"] . "</td>";
                    echo "<td>" . $fila["Nombre"] . "</td>";
                    echo "<td>" . $fila["Ubicacion"] . "</td>";
                    echo "<td>" . $fila["MetrosCuadrados"] . "</td>";
                    echo "<td>" . $fila["Profundidad"] . "</td>";
                    echo "<td><img src='" . $fila["Imagen"] . "' alt='imagen del nadador'></td>";
                    echo "</tr>";
                }
                // Cerrar la tabla
                echo "</table>";
            } else {
                echo "No se encontraron resultados.";
            }
            // Cerrar la conexión a la base de datos
            $conexion->close();
            ?>
        </div>
        <br /><br /><br />
    </main>
    <footer>
        <div class="content-footer">
            <p class="pp">&copy; 2024 NATT. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="../../js/script2.js"></script>
</body>

</html>