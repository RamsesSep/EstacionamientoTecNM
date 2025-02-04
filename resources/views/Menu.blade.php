<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="shortcut icon" href="{{ asset('images/Home.svg') }}">
    <style>
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

        .header .toggle-btn svg {
            width: 24px;
            height: 24px;
            fill: #ecf0f1;
        }

        .header .titulo-pagina {
            margin-left: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        /* Estilos del menú lateral */
        .sidebar {
            position: fixed;
            top: 60px; /* Debe estar debajo de la barra de encabezado */
            left: -250px; /* Oculto por defecto */
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

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
        }

        .sidebar ul li:hover {
            background-color: #34495e;
        }

        .sidebar ul li svg {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            fill: #ecf0f1;
        }

        .sidebar ul li.salir:hover {
            background-color: #d32f2f;
        }

        .sidebar ul li.salir svg {
            margin-right: 8px;
            fill: white;
            width: 20px;
            height: 20px;
        }

        /* Contenido Principal */
        .content {
            margin-top: 60px;
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
            width: 100%;
            position: relative; /* Para posicionamiento relativo del contenido */
        }

        .sidebar.active ~ .content {
            margin-left: 250px;
        }

        /* Tabla de Registros */
        .tabla-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            margin-top: 20px;
            position: relative; /* Para contener el botón absoluto */
        }

        .tabla-container h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .tabla-registros {
            width: 100%;
            border-collapse: collapse;
        }

        .tabla-registros th,
        .tabla-registros td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .tabla-registros th {
            background-color: #2980b9;
            color: white;
        }

        .tabla-registros tr:nth-child(even) {
            background-color: #f9f9f9;
            color: #333;
        }

        .tabla-registros tr:hover {
            background-color: #f1f1f1;
            color: #000;
        }

        .codigo-qr {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #e67e22;
            color: white;
            transition: background-color 0.3s ease;
        }

        .codigo-qr:hover {
            background-color: #d35400;
        }

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

        /* Botón de Añadir Registro */
        .add-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
        }

        .add-button:hover {
            transform: scale(1.1);
        }

        .add-button svg {
            width: 24px;
            height: 24px;
            fill: #2c3e50;
            transition: fill 0.3s;
        }

        .add-button:hover svg {
            fill: #2980b9;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            .content {
                margin-left: 0;
            }

            .sidebar.active ~ .content {
                margin-left: 250px;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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

            /* Cargar registros desde LocalStorage
            const tabla = document.getElementById('tablaRegistros').getElementsByTagName('tbody')[0];
            const registros = JSON.parse(localStorage.getItem('registros')) || [];

            if (registros.length === 0) {
                const fila = tabla.insertRow();
                const celda = fila.insertCell();
                celda.colSpan = 5;
                celda.textContent = "No hay registros para mostrar.";
            } else {
                registros.forEach(registro => {
                    const fila = tabla.insertRow();

                    const celdaTipo = fila.insertCell();
                    celdaTipo.textContent = registro.tipo;

                    const celdaNombreBici = fila.insertCell();
                    celdaNombreBici.textContent = registro.nombreBici;

                    const celdaColor = fila.insertCell();
                    celdaColor.textContent = registro.color;

                    const celdaFecha = fila.insertCell();
                    celdaFecha.textContent = new Date(registro.fechaRegistro).toLocaleString();

                    const celdaCodigoQR = fila.insertCell();
                    celdaCodigoQR.innerHTML = `<button class="codigo-qr" onclick="verCodigoQR('${registro.id}')">Código QR</button>`;
                });
            }*/
        });

        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                localStorage.clear();
                window.location.href = "{{ route('inicio.sesion') }}";
            }
        }

        function verCodigoQR(id) {
            window.location.href = `codigoQR.html?id=${id}`;
        }

        function agregarRegistro() {
            window.location.href = "{{ route('registrar.bici') }}";
        }

        // Recuperar el localStorage
        // Obtener el número de control de la variable de sesión
        var numeroControl = {!! json_encode(session('numeroControl')) !!}; 

        // Guardar el número de control en el localStorage
        if (numeroControl) {
        localStorage.setItem('numeroControl', numeroControl);
        }

        // Obtener el número de control del localStorage en otras páginas
        var numeroControlAlmacenado = localStorage.getItem('numeroControl');
        console.log(numeroControlAlmacenado); // Usar el número de control

    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <button class="toggle-btn">
            <!-- Icono de hamburguesa -->
            <img src="{{ asset('images/Menu.svg') }}" width="30" height="30" alt="menu">
        </button>
        <img src="{{ asset('images/tecnm.png') }}" alt="Logo" class="logo">
        <img src="{{ asset('images/itl.png') }}" alt="Logo" class="logo2">
    </div>

    <!-- Menú Lateral con la clase 'active' agregada para que esté abierto por defecto -->
    <div class="sidebar active">
        <div class="logo">Menú</div>
        <ul>
            <!--<li onclick="window.location.href='RegistrarVehiculo.html'">-->
            <li>
                <a href="{{ route('registrar.auto') }}">
                    <!-- Icono Carros -->
                    <img src="{{ asset('images/Car.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                    <span>Registro de Carros</span>
                </a>
            </li>
            <!--<li onclick="window.location.href='Avance1.html'">-->
            <li>
                <a href="{{ route('registrar.bici') }}">
                    <!-- Icono Bicicleta -->
                    <img src="{{ asset('images/bici.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                    <span>Registro de Bicicletas</span>
                </a>
            </li>
            <!--Redireccionamiento a el modulo de monitoreo de estacionamiento-->
            <li>
                <a href="{{ route('monitoreo') }}">
                    <!-- Icono monitoreo -->
                    <img src="{{ asset('images/term-blanca.png') }}" width="20" height="20" alt="monitoreo" style="margin-right: 10px;">
                    <span>Monitoreo</span>
                </a>
            </li>
            <!--<li onclick="window.location.href='Perfil.html'">-->
            <li>
                <a href="{{ route('perfil') }}">
                    <!-- Icono Perfil -->
                    <img src="{{ asset('images/person.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                    <span>Perfil</span>
                </a>
            </li>
            <li class="salir" onclick="salir()">
                <!-- Icono Salir -->
                <img src="{{ asset('images/power.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Cerrar sesión</span>
            </li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="content">

        <h2>Mis Bicicletas Registradas</h2>
        <table class="tabla-registros" id="tablaRegistros">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>Fecha de Registro</th>
                    <th>Código QR</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bicicletas as $bicicleta)
                    <tr>
                        <td>{{ $bicicleta->id_bicicleta }}</td>
                        <td>{{ $bicicleta->nombrebici }}</td>
                        <td>{{ $bicicleta->color }}</td>
                        <td>{{ $bicicleta->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                        <button class="codigo-qr" onclick="window.location.href='{{ route('codigoQR', ['id_bicicleta' => $bicicleta->id_bicicleta]) }}'" style="background: none; border: none; cursor: pointer;">
                            <img src="{{ asset('images/qr.svg') }}" alt="Codigo QR">
                        </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay bicicletas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="tabla-container">
            <!-- Botón de Añadir Registro -->
            <!-- Botón de Añadir Registro -->
            <button class="add-button" onclick="agregarRegistro()" title="Agregar Registro">
                <img src="{{ asset('images/nuevo.svg') }}" alt="nuevo" class="icon-image">
            </button>

            <h2 id="tituloRegistros">Mis Registros</h2>
            <script>
                var titulo = document.getElementById('tituloRegistros');
                if (numeroControlAlmacenado) {
                  titulo.textContent = 'Mis Registros - ' + numeroControlAlmacenado;
                }
            </script>              
            <table class="tabla-registros" id="tablaRegistros">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>placas</th>
                        <th>marcar</th>
                        <th>modelo</th>
                        <th>color</th>
                        <th>tipo</th>
                        <th>numero_control</th>
                        <th>fecha de creacion</th>
                        <th>ultima actualizacion</th>
                        <th>codigo QR</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los registros se cargarán aquí -->
                    @forelse ($vehiculos as $vehiculo)
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
                            <td> 
                                {{ $vehiculo->qr_code }}
                             </td>                             
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">No hay vehiculos registrados.</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
