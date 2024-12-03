<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo</title>
    <link rel="shortcut icon" href="{{ asset('images/monitor.png') }}">
    <link rel="stylesheet" href="{{ asset('css/monitoreo.css') }}">
    <script>

        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                localStorage.clear();
                window.location.href = "{{ route('inicio.sesion') }}";
            }
        }

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
        <div class="logo">Monitoreo</div>
        <ul>
            <li onclick="window.location.href='{{ route('registrar.auto') }}'">
                <!-- Icono Carros -->
                <img src="{{ asset('images/Car.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Registro de Carros</span>
            </li>
            <li onclick="window.location.href='{{ route('registrar.bici') }}'">
                <!-- Icono Bicicleta -->
                <img src="{{ asset('images/bici.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Registro de Bicicletas</span>
            </li>
            <li onclick="window.location.href='{{ route('menu.autos') }}'">
                <!-- Icono Regresar al Menú -->
                <img src="{{ asset('images/Home.svg') }}" width="20" height="20" alt="Menú" style="margin-right: 10px;">
                <span>Regresar al Menú</span>
            </li>
            <li onclick="window.location.href='{{ route('perfil') }}'">
                <!-- Icono Perfil -->
                <img src="{{ asset('images/person.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Perfil</span>
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
        <div class="monitoreo-container">
            <h1>Monitoreo de Estacionamiento</h1><br>

            <!-- Div que se despliega dependiendo de la opción seleccionada -->
            <div id="infoEstacionamiento1" class="info">
                <div class="container">
                    <div class="tituloEstacionamiento">Ingreso Vehículos</div>
                
                    <!-- Reloj y fecha -->
                    <div class="clock-container">
                        <div class="tituloCapacidad">
                            CAPACIDAD:
                        </div>
                        <div class="porcentaje">
                            <div class="digit">{{ $porcentajeOcupacion }}</div>
                            <span>%</span>
                        </div>
                        <br><br><hr><br>
                        <div class="informacion">
                            <span>Vehículos registrados: </span><h2>{{ $totalVehiculos }}</h2>
                            <span>Capacidad total: </span><h2>{{ $capacidadTotal }}</h2>
                        </div>
                    </div>                    

                </div>
            </div>
        </div>
    </div>

</body>

</html>
