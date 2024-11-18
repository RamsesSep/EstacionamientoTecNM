<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo</title>
    <link rel="shortcut icon" href="IMG/monitor.png">
    <link rel="stylesheet" href="{{ asset('css/monitoreo.css') }}">
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

            // Cargar registros desde LocalStorage
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
            }
        });

        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                window.location.href = "Inicio.html";
            }
        }

        function verCodigoQR(id) {
            window.location.href = `codigoQR.html?id=${id}`;
        }

        function agregarRegistro() {
            window.location.href = "Avance1.html";
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
            <li onclick="window.location.href='RegistrarVehiculo.html'">
                <!-- Icono Carros -->
                <img src="{{ asset('images/Car.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Registro de Carros</span>
            </li>
            <li onclick="window.location.href='Avance1.html'">
                <!-- Icono Bicicleta -->
                <img src="{{ asset('images/bici.svg') }}" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Registro de Bicicletas</span>
            </li>
            <li onclick="window.location.href='Perfil.html'">
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

            <!-- Select para elegir el estacionamiento -->
            <label for="estacionamiento">Selecciona el estacionamiento:</label>
            <select id="estacionamiento">
                <option value="" disabled selected>-- Selecciona --</option>
                <option value="1">Estacionamiento Principal</option>
                <option value="2">Estacionamiento Idiomas</option>
            </select>

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
                            <div class="digit">9</div>
                            <div class="digit">0</div>
                            <span>%</span>
                        </div>
                        <br><br><hr><br>
                        <div class="informacion">
                            <span>Vehículos: </span><h2>100</h2>
                            <span>Motocicletas: </span><h2>20</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div id="infoEstacionamiento2" class="info">
                <div class="container">
                    <div class="tituloEstacionamiento">Ingreso Vehículos</div>
                
                    <!-- Reloj y fecha -->
                    <div class="clock-container">
                        <div class="tituloCapacidad">
                            CAPACIDAD:
                        </div>
                        <div class="porcentaje">
                            <div class="digit">1</div>
                            <div class="digit">5</div>
                            <span>%</span>
                        </div>
                        <br><br><hr><br>
                        <div class="informacion">
                            <span>Vehículos: </span><h2>100</h2>
                            <span>Motocicletas: </span><h2>20</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Obtener el select y los divs de información
        const selectEstacionamiento = document.getElementById('estacionamiento');
        const infoEstacionamiento1 = document.getElementById('infoEstacionamiento1');
        const infoEstacionamiento2 = document.getElementById('infoEstacionamiento2');
    
        // Función para mostrar u ocultar la información según la selección
        selectEstacionamiento.addEventListener('change', function() {
            // Ocultar ambos divs de información
            infoEstacionamiento1.style.display = 'none';
            infoEstacionamiento2.style.display = 'none';
    
            // Mostrar el div correspondiente según la opción seleccionada
            if (this.value === '1') {
                infoEstacionamiento1.style.display = 'block';
            } else if (this.value === '2') {
                infoEstacionamiento2.style.display = 'block';
            }
        });
    </script>

</body>

</html>
