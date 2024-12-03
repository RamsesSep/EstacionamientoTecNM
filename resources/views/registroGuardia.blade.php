<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Bicicletas</title>
    <style>
        /* Reset de estilos */
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* Estilos de la barra de encabezado */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 1001;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header .toggle-btn {
            background: none;
            border: none;
            color: #ecf0f1;
            cursor: pointer;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .header .toggle-btn:hover {
            background-color: #1a252f;
            border-radius: 4px;
        }

        .header .toggle-btn img {
            width: 24px;
            height: 24px;
        }

        .header .titulo-pagina {
            margin-left: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        /* Estilos del menú lateral */
        .sidebar {
            position: fixed;
            top: 60px;
            left: -250px;
            width: 250px;
            height: calc(100% - 60px);
            background-color: #2c3e50;
            color: #ecf0f1;
            padding-top: 20px;
            transition: left 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background 0.3s;
        }

        .sidebar ul li:hover {
            background-color: #34495e;
        }

        .sidebar ul li img {
            margin-right: 15px;
            width: 20px;
            height: 20px;
        }

        .sidebar ul li.salir:hover {
            background-color: #d32f2f;
        }

        .sidebar ul li.salir img {
            margin-right: 8px;
            width: 20px;
            height: 20px;
        }

        .sidebar ul li.salir span {
            font-size: 16px;
        }

        /* Contenido Principal */
        .content {
            margin-top: 0px;
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar.active ~ .content {
            margin-left: 250px;
        }

        /* Contenedor del Registro de Bicicletas */
        .registro-container {
            background-color: #2c3e50;
            padding: 40px 50px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 1200px;
            width: 90%;
            margin: 40px 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }

        .registro-container .titulo {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Estilos para la barra de búsqueda */
        .barra-busqueda {
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .barra-busqueda input {
            width: 80%;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
        }

        .barra-busqueda button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            transition: background-color 0.3s ease;
        }

        .barra-busqueda button:hover {
            background-color: #0015ff;
        }

        /* Ocultar inicialmente ambas tablas */
        .tabla-registros,
        .tabla-registros-vehiculos {
            display: none;
            width: 100%;
            border-collapse: collapse;
        }

        .tabla-registros th,
        .tabla-registros td,
        .tabla-registros-vehiculos th,
        .tabla-registros-vehiculos td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .tabla-registros th,
        .tabla-registros-vehiculos th {
            background-color: #007BFF;
            color: white;
        }

        .tabla-registros tr:nth-child(even),
        .tabla-registros-vehiculos tr:nth-child(even) {
            background-color: #f2f2f2;
            color: #333;
        }

        /*
        .tabla-registros tr:hover,
        .tabla-registros-vehiculos tr:hover {
            background-color: #ddd;
            color: #000;
        }
        */

        /* Mostrar tabla seleccionada */
        .visible {
            display: table;
        }

        .select-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .select-container label {
            font-size: 18px;
            margin-right: 10px;
            color: white;
        }

        .select-container select {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            outline: none;
        }

        /* ------------- */

        .logo {
            width: 120px;
            height: auto;
            margin-left: 20px;
        }

        .logo2 {
            width: 50px;
            height: auto;
            margin-left: 20px;
        }

        /* Responsividad */
        @media (max-width: 800px) {
            .barra-busqueda input {
                width: 70%;
                font-size: 14px;
            }

            .barra-busqueda button {
                padding: 8px 16px;
                font-size: 14px;
            }

            .tabla-registros th,
            .tabla-registros td {
                padding: 8px;
                font-size: 14px;
            }

            .tabla-registros-vehiculos th,
            .tabla-registros-vehiculos td {
                padding: 8px;
                font-size: 14px;
            }
        }

        @media (max-width: 600px) {
            .registro-container {
                padding: 20px;
            }

            .barra-busqueda {
                flex-direction: column;
                align-items: flex-start;
            }

            .barra-busqueda input {
                width: 100%;
                margin-bottom: 10px;
            }

            .tabla-registros th,
            .tabla-registros td {
                padding: 6px;
                font-size: 12px;
            }

            .tabla-registros-vehiculos th,
            .tabla-registros-vehiculos td {
                padding: 6px;
                font-size: 12px;
            }
        }
    </style>
    <!-- Incluir la biblioteca QRCode.js desde CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script type="module">
        import QrScanner from "https://unpkg.com/qr-scanner@1.4.2/qr-scanner.min.js";

        QrScanner.WORKER_PATH = 'https://unpkg.com/qr-scanner@1.4.2/qr-scanner-worker.min.js';

        document.addEventListener("DOMContentLoaded", function () {
            // Funcionalidad de la barra lateral
            const toggleBtn = document.querySelector(".toggle-btn");
            const sidebar = document.querySelector(".sidebar");

            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("active");
                // Ajustar el margen del contenido según el estado del sidebar
                if (sidebar.classList.contains("active")) {
                    document.querySelector(".content").style.marginLeft = "250px";
                } else {
                    document.querySelector(".content").style.marginLeft = "0";
                }
            });

            // Asignar el event listener al botón "Salir"
            document.querySelector('.sidebar ul li.salir').addEventListener('click', salir);
        });

        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                window.location.href = "Inicio.html";
            }
        }

        function verCodigoQR(id) {
            window.location.href = `codigoQR.html?id=${id}`;
        }
    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <button class="toggle-btn" aria-label="Abrir menú lateral">
            <!-- Icono de hamburguesa -->
            <img src="{{ asset('images/Menu.svg') }}" width="30" height="30" alt="Menu">
        </button>
        <img src="{{ asset('images/tecnm.png') }}" alt="Logo TECNM" class="logo">
        <img src="{{ asset('images/itl.png') }}" alt="Logo ITL" class="logo2">
    </div>

    <!-- Menú Lateral -->
    <div class="sidebar">
        <div class="logo">Menú</div>
        <ul>
            <li onclick="window.location.href='{{ route('scaneo-guardia') }}'">
                <!-- Icono Registros -->
                <img src="{{ asset('images/sacan.svg') }}" width="20" height="20" alt="Registros">
                <span>Escaneo</span>
            </li>
            <li class="salir">
                <!-- Icono Salir -->
                <img src="{{ asset('images/power.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Cerrar sesion</span>
            </li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="registro-container">
            <div class="titulo">Registros de Bicicletas</div>

            <!-- Barra de Búsqueda -->
            <div class="barra-busqueda">
                <input type="text" id="campoBusqueda" placeholder="Buscar por ID, Número de Control, etc...">
                <button id="botonBusqueda"><img src="lupa.svg" width="20" height="20" alt="Buscar">
                </button>
            </div>

            <div class="select-container">
                <label for="tipoRegistro">Selecciona el tipo de registro:</label>
                <select id="tipoRegistro">
                    <option value="" disabled selected>--Selecciona una opción--</option>
                    <option value="bicicletas">Bicicletas</option>
                    <option value="vehiculos">Vehículos</option>
                </select>
            </div>            

            <table class="tabla-registros" id="tablaRegistros">
                <thead>
                    <tr>
                        <th>ID de Registro</th>
                        <th>Placas de vehiculo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Código QR</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- CONTENIDO DINAMICO - INICIO -->
                </tbody>
            </table>

            <table class="tabla-registros-vehiculos" id="tablaRegistrosVehiculos">
                <thead>
                    <tr>
                        <th>ID de Registro</th>
                        <th>Placas de vehiculo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Tipo</th>
                        <th>Numero de control del dueño</th>
                        <th>Fecha y hora de registro</th>
                        <th>Ultima actualizacion</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- CONTENIDO DINAMICO - INICIO -->
                    @foreach ($vehiculos as $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->id }}</td>
                            <td>{{ $vehiculo->placas }}</td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->color }}</td>
                            <td>{{ $vehiculo->tipo }}</td>
                            <td>{{ $vehiculo->numero_control }}</td>
                            <td>{{ $vehiculo->created_at }}</td>
                            <td>{{ $vehiculo->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>

        document.addEventListener("DOMContentLoaded", () => {
            const select = document.getElementById("tipoRegistro");
            const tablaBicicletas = document.querySelector(".tabla-registros");
            const tablaVehiculos = document.querySelector(".tabla-registros-vehiculos");

            // Escuchar cambios en el select
            select.addEventListener("change", () => {
                const opcionSeleccionada = select.value;

                // Ocultar ambas tablas inicialmente
                tablaBicicletas.classList.remove("visible");
                tablaVehiculos.classList.remove("visible");

                // Mostrar la tabla correspondiente
                if (opcionSeleccionada === "bicicletas") {
                    tablaBicicletas.classList.add("visible");
                } else if (opcionSeleccionada === "vehiculos") {
                    tablaVehiculos.classList.add("visible");
                }
            });
        });

    </script>

</body>

</html>
