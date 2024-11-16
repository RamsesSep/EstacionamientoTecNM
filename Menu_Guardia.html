<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaneo de Código QR</title>
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
            margin-top: 60px; 
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

        /* Contenedor del Escaneo de Código QR */
        .escaneo-container {
            background-color: #2c3e50;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 90%;
            text-align: center;
            margin: 40px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }

        .escaneo-container .titulo {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #video-preview {
            width: 100%;
            max-width: 600px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none; 
        }

        .boton-escaneo {
            padding: 12px 25px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #2980b9; 
            color: white;
            transition: background-color 0.3s ease;
            margin-bottom: 30px;
        }

        .boton-escaneo:hover {
            background-color: #0015ff;
        }

        .campos-informacion {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
            width: 100%;
        }

        .campo {
            width: 100%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .campo label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .campo input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e0e0e0;
            color: #333;
            font-size: 16px;
        }

        .fotos {
            display: flex;
            flex-direction: row;
            gap: 20px; 
            width: 100%;
            max-width: 600px;
            justify-content: center;
            margin-top: 15px;
        }

        .foto {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 45%; 
        }

        .foto img {
            width: 100%;
            max-width: 280px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 8px;
            margin-bottom: 5px;
            display: none;
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

        /* Responsividad */
        @media (max-width: 800px) {
            .fotos {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .foto {
                width: 80%;
            }

            .foto img {
                max-width: 100%;
            }
        }

        @media (max-width: 600px) {
            .escaneo-container {
                padding: 20px;
            }

            .boton-escaneo {
                font-size: 16px;
                padding: 10px 20px;
            }

            .campo input {
                font-size: 14px;
                padding: 8px;
            }

            .campo label {
                font-size: 14px;
            }

            .fotos .foto {
                width: 100%;
            }

            .fotos .foto img {
                max-width: 100%;
            }
        }
    </style>
    <!-- Incluir la biblioteca QRScanner desde CDN -->
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

            // Funcionalidad del Escaneo QR
            const video = document.getElementById('video-preview');
            const botonEscaneo = document.getElementById('botonEscaneo');
            const resultadoNoControl = document.getElementById('noControl');
            const resultadoColor = document.getElementById('colorBici');
            const resultadoNombre = document.getElementById('nombreUsuario');
            const fotoBici = document.getElementById('fotoBici');
            const fotoEstudiante = document.getElementById('fotoEstudiante');

            let qrScanner;

            botonEscaneo.addEventListener('click', () => {
                botonEscaneo.style.display = 'none'; 
                iniciarEscaneo();
            });

            function iniciarEscaneo() {
                video.style.display = 'block'; 
                qrScanner = new QrScanner(video, result => {
                    procesarResultado(result);
                    qrScanner.stop();
                    video.style.display = 'none'; 
                    botonEscaneo.style.display = 'block'; 
                }, {
                    onDecodeError: error => {
                        console.warn(`Error de decodificación: ${error}`);
                    },
                    highlightScanRegion: true,
                    highlightCodeOutline: true
                });

                qrScanner.start();
            }

            function procesarResultado(result) {
                // Suponemos que el resultado es el ID del registro
                const registroId = result;
                const registros = JSON.parse(localStorage.getItem('registros')) || [];
                const registro = registros.find(r => r.id === registroId);

                if (registro) {
                    // Rellenar los campos con la información del registro
                    resultadoNoControl.value = registro.noControl || 'N/A';
                    resultadoColor.value = registro.color || 'N/A';
                    resultadoNombre.value = registro.nombreUsuario || 'N/A';

                    // Mostrar las fotos si existen
                    if (registro.fotoBici) {
                        fotoBici.src = registro.fotoBici;
                        fotoBici.style.display = 'block';
                    } else {
                        fotoBici.style.display = 'none';
                    }

                    if (registro.fotoEstudiante) {
                        fotoEstudiante.src = registro.fotoEstudiante;
                        fotoEstudiante.style.display = 'block';
                    } else {
                        fotoEstudiante.style.display = 'none';
                    }
                } else {
                    alert("Registro no encontrado.");
                }
            }

            // Exponer la función salir() al objeto global window
            window.salir = function () {
                if (confirm("¿Estás seguro de que deseas salir?")) {
                    window.location.href = "Inicio.html";
                }
            };

            window.verCodigoQR = function (id) {
                window.location.href = `codigoQR.html?id=${id}`;
            };
        });
    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <button class="toggle-btn" aria-label="Abrir menú lateral">
            <!-- Icono de hamburguesa -->
            <img src="IMG/Menu.svg" width="30" height="30" alt="Menu">
        </button>
        <img src="IMG/tecnm.png" alt="Logo TECNM" class="logo">
        <img src="IMG/itl.png" alt="Logo ITL" class="logo2">    </div>

    <!-- Menú Lateral -->
    <div class="sidebar">
        <div class="logo">Menú</div>
        <ul>
            <li onclick="window.location.href='Registro_Guardia.html'">
                <!-- Icono Registros -->
                <img src="IMG/historial.svg" width="20" height="20" alt="Registros">
                <span>Registros</span>
            </li>
            <!-- Puedes agregar más elementos de menú aquí si lo deseas -->
            <li class="salir" onclick="salir()">
                <!-- Icono Salir -->
                <img src="IMG/power.svg" width="20" height="20" alt="salir" style="margin-right: 10px;">
                <span>Cerrar sesion</span>
            </li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="escaneo-container">
            <div class="titulo">Escaneo de Código QR</div>
            <button id="botonEscaneo" class="boton-escaneo">Iniciar Escaneo</button>
            <video id="video-preview" muted></video>

            <div class="campos-informacion">
                <!-- Número de Control -->
                <div class="campo">
                    <label for="noControl">Número de Control:</label>
                    <input type="text" id="noControl" name="noControl" readonly>
                </div>

                <!-- Color de la Bicicleta -->
                <div class="campo">
                    <label for="colorBici">Color de la Bicicleta:</label>
                    <input type="text" id="colorBici" name="colorBici" readonly>
                </div>

                <!-- Nombre del Usuario -->
                <div class="campo">
                    <label for="nombreUsuario">Nombre del Usuario:</label>
                    <input type="text" id="nombreUsuario" name="nombreUsuario" readonly>
                </div>

                <!-- Fotos -->
                <div class="fotos">
                    <!-- Foto de la Bicicleta -->
                    <div class="foto">
                        <label>Foto de la Bicicleta:</label>
                        <img id="fotoBici" src="" alt="Foto de la Bicicleta">
                    </div>

                    <!-- Foto del Estudiante -->
                    <div class="foto">
                        <label>Foto del Estudiante:</label>
                        <img id="fotoEstudiante" src="" alt="Foto del Estudiante">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
