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
            background-image: url('../../img/fondos/pis2.jpg');
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
                    <option selected value="altas1">Altas</option>
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
                    <option selected disabled>Piscinas</option>
                    <option value="consulta3">Consulta</option>
                    <option value="altas3">Altas</option>
                    <option value="bajas3">Bajas</option>
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
            Altas-Nadadores
        </h2>
        <div class="cons">
            <div class="form-content">
                <div class="form-container">
                    <h2>Formulario de Registro de Nadadores</h2>
                    <form action="subir.php" method="POST" enctype="multipart/form-data"
                        onsubmit="confirmarSubida(event)">
                        <label for=" nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required><br>

                        <label for="edad">Edad:</label>
                        <input type="number" id="edad" name="edad" required><br>

                        <label for="sexo">Sexo:</label>
                        <select id="sexo" name="sexo" required>
                            <option class="opt" value="Masculino">Masculino</option>
                            <option class="opt" value="Femenino">Femenino</option>
                        </select><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br>

                        <label for="foto">Foto:</label><br>
                        <input type="file" id="foto" name="foto" accept="image/*"><br>

                        <input type="submit" value="Enviar" id="subir">
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