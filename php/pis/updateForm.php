<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["editarR"])) {
    $id = $_GET["editarR"];
    include_once "../conex.php";

    $sql = "SELECT * FROM piscinas WHERE id = ?";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("i", $id);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                $registro = $resultado->fetch_assoc();
            } else {
                echo "<script>
                alert('No se encontró el registro con el ID proporcionado.');
                location.href = './editar.php';
                </script>";
                exit;
            }
        } else {
            echo "Error al seleccionar el registro: " . $stmt->error;
            exit;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la declaración: " . $conexion->error;
        exit;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "<script>
    alert('ID no proporcionado.');
    location.href = './editar.php';
    </script>";
    exit;
}
?>

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

        .form-container {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            /* display: block; */
            margin-bottom: 8px;
            padding-right: 10px;
            color: #ffff;
            font-weight: 500;
            font-style: italic;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: calc(50% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d1d3e2;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f7f9fc;
            height: 10px;
            color: black;
        }

        #sexo {
            width: calc(50% - 20px);
            margin-bottom: 20px;
            padding: 3px;
            font-size: 16px;
            background-color: #ffff;
        }

        .opt {
            color: black;
        }


        input[type="file"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d1d3e2;
            box-sizing: border-box;
            font-size: 16px;
            background-color: rgba(0, 0, 0, 0.0);
        }

        input[type="submit"],
        input[type="reset"] {
            width: 20%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0c5dbb;
        }

        #imgC {
            width: 15px;
            height: 15px;
        }

        img {
            width: 50%;
            height: auto;
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
                    <option disabled>Nadadores</option>
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
                    <option value="bajas3">Bajas</option>
                    <option selected value="editar3">Editar</option>
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
            Editar-Piscinas
        </h2>
        <div class="cons">
            <div class="form-content">
                <div class="form-container">
                    <h2>Editar Registro de Piscinas
                    </h2>
                    <form action="actualizar.php" method="POST" enctype="multipart/form-data"
                        onsubmit="confirmarEditar(event)">
                        <input type="hidden" name="id" value="<?php echo $registro['ID']; ?>">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $registro['Nombre']; ?>"
                            required><br>

                        <label for="especialidad">Ubicación:</label>
                        <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $registro['Ubicacion']; ?>"
                            required><br>

                        <label for="email">Tamaño (m2):</label>
                        <input type="number" id="metroscuadrados" value="<?php echo $registro['MetrosCuadrados']; ?>"
                            name="metroscuadrados" required min="0"><br>

                        <label for="telefono">Profundidad (m):</label>
                        <input type="number" id="profundidad" name="profundidad"
                            value="<?php echo $registro['Profundidad']; ?>" required><br><br>

                        <label for="foto">Foto:</label><br><br>
                        <label for="imagenC">Mantener imagen: </label><br>
                        <input type="checkbox" checked name="imgC" id="imgC"><br>
                        <img src="<?php echo $registro['Imagen']; ?>" alt="a">

                        <input disabled required type="file" id="foto" name="foto" accept="image/*"><br>

                        <input type="submit" value="Editar" id="editar">
                        <input type="reset" value="Reset">
                    </form>
                </div>
                <br>
            </div>
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