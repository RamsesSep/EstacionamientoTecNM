<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        /* --- Estilos Generales --- */

        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* --- Estilos de la Barra de Encabezado --- */
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

        .header .titulo-pagina {
            margin-left: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        /* --- Estilos del Contenido Principal --- */
        .content {
            margin-top: 150px; 
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            height: calc(100vh - 60px);
            position: relative;
        }

        /* --- Estilos del Formulario de Registro de Usuario --- */

        .registro-container {
            position: relative; 
            background-color: #2c3e50;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            color: #ecf0f1; 
        }

        .registro-container .titulo {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
            color: #ecf0f1; 
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #f0f0f0;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        select {
            width: 100%;
            padding: 12px 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #ffffff;
            color: #333;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus,
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="file"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .error-message {
            color: #ffdddd;
            background-color: #f44336;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        /* Clase base para botones */
        .boton {
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin-top: 10px;
        }

        /* Botón de Verificar Correo */
        .boton-verificar {
            background-color: #007BFF;
        }

        .boton-verificar:hover {
            background-color: #0069d9;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .boton-verificar:active {
            background-color: #005cbf;
            transform: translateY(0);
            box-shadow: 0 6px 6px rgba(0, 0, 0, 0.1);
        }

        /* Botón de Salir */
        .boton-salir {
            background-color: #f44336; 
        }

        .boton-salir:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .boton-salir:active {
            background-color: #c62828;
            transform: translateY(0);
            box-shadow: 0 6px 6px rgba(0, 0, 0, 0.1);
        }

        /* Botón para Confirmar Código */
        .boton-confirmar {
            background-color: #28a745; 
        }

        .boton-confirmar:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .boton-confirmar:active {
            background-color: #1e7e34;
            transform: translateY(0);
            box-shadow: 0 6px 6px rgba(0, 0, 0, 0.1);
        }

        .botones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        /* Botón de Cancelar */
        .cancel-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            transition: transform 0.2s;
        }

        .cancel-btn:hover {
            transform: scale(1.2);
        }

        .cancel-btn img {
            width: 20px;
            height: 20px;
        }

        /* Estilo para la vista previa de la imagen */
        .image-preview {
            display: none;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 50%;
            border: 2px solid #ccc;
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
        @media (max-width: 500px) {
            .registro-container {
                padding: 20px;
            }

            .botones {
                flex-direction: column;
                gap: 10px;
            }

            .botones button,
            .botones a {
                width: 100%;
                padding: 10px;
                font-size: 14px;
                margin: 0; 
            }

            .campo-verificacion input {
                padding: 10px;
                font-size: 14px;
            }

            .campo-verificacion button {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>
    <script>
        let codigoVerificacion; 

        function registrarUsuario(event) {
            event.preventDefault();

            const usuario = document.getElementById('usuario').value.trim();
            const numeroControl = document.getElementById('numeroControl').value.trim();
            const correo = document.getElementById('correo').value.trim();

            const errorCorreo = document.getElementById('errorCorreo');
            const errorNumeroControl = document.getElementById('errorNumeroControl');

            let valid = true;

            // Ocultar mensajes de error
            errorCorreo.style.display = 'none';
            errorNumeroControl.style.display = 'none';

            // Validación del dominio del correo
            const dominioValido = '@leon.tecnm.mx';
            if (!correo.endsWith(dominioValido)) {
                errorCorreo.textContent = `El correo debe ser institucional.`;
                errorCorreo.style.display = 'block';
                valid = false;
            }

            // Validación del Número de Control
            const regexNumeroControl = /^\d+$/; // Acepta solo números
            if (!regexNumeroControl.test(numeroControl)) {
                errorNumeroControl.textContent = "El Número de Control debe contener solo números.";
                errorNumeroControl.style.display = 'block';
                valid = false;
            }

            if (valid) {
                // Crear objeto de usuario
                const usuarioObj = {
                    usuario: usuario,
                    numeroControl: numeroControl,
                    correo: correo,
                    fechaRegistro: new Date().toISOString()
                };

                // Obtener usuarios existentes
                let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];

                // Verificar si el usuario ya está registrado
                const existeUsuario = usuarios.find(u => u.correo === correo);
                if (existeUsuario) {
                    alert("Este correo electrónico ya está registrado.");
                    return;
                }

                usuarios.push(usuarioObj);

                // Guardar en localStorage
                localStorage.setItem('usuarios', JSON.stringify(usuarios));

                // Generar código de verificación
                codigoVerificacion = generarCodigoVerificacion();

                // Simular envío de correo (En realidad, deberías enviar el correo desde el servidor)
                alert(`Código de verificación enviado a ${correo}: ${codigoVerificacion}`);

                // Mostrar campo para ingresar el código
                document.getElementById('campoVerificacion').style.display = 'block';
            }
        }

        // Genera un código de 6 dígitos
        function generarCodigoVerificacion() {
            return Math.floor(100000 + Math.random() * 900000).toString(); 
        }

        function verificarCodigo(event) {
            event.preventDefault();

            const codigoIngresado = document.getElementById('codigoIngresado').value.trim();
            const errorCodigo = document.getElementById('errorCodigo');

            // Ocultar mensaje de error
            errorCodigo.style.display = 'none';

            if (codigoIngresado === codigoVerificacion) {
                // Redirigir a password.html para establecer la contraseña
                window.location.href = "password.html";
            } else {
                errorCodigo.textContent = "El código ingresado es incorrecto.";
                errorCodigo.style.display = 'block';
            }
        }

        // VISTA PREVIA DE LA IMAGEN QUE SUBE EL USUARIO
        function mostrarVistaPrevia(input) {
            const preview = document.getElementById('preview_bici');
            const maxSize = 2 * 1024 * 1024; 

            if (input.files && input.files[0]) {
                if (input.files[0].size > maxSize) {
                    alert("El archivo es demasiado grande. El tamaño máximo es 2MB.");
                    input.value = ""; 
                    preview.style.display = 'none';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Asignar el event listener al botón de Cancelar
            const cancelBtn = document.querySelector('.cancel-btn');
            cancelBtn.addEventListener('click', cancelar);
        });

        // Función cancelar()
        function cancelar() {
            if (confirm("¿Estás seguro de que deseas cancelar el registro?")) {
                // Redirigir a la página de inicio o cualquier otra acción
                window.location.href = "{{ route('inicio.sesion'); }}";
            }
        }
    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <img src="{{ asset('images/tecnm.png') }}" alt="Logo TECNM" class="logo">
        <img src="{{ asset('images/itl.png') }}" alt="Logo ITL" class="logo2">
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="registro-container">
            <!-- Botón de Cancelar -->
            <button class="cancel-btn" aria-label="Cancelar">
                <img src="{{ asset('images/cancelar.svg') }}" alt="Cancelar" width="40" height="40">
            </button>

            <div class="titulo">Registro de Usuario</div>

            <!-- ***************************** FORMULARIOS EMPIEZA AQUI ***************************** -->

            <!--<form id="registroForm" onsubmit="registrarUsuario(event)">-->
            <form method="POST" action="/registro" enctype="multipart/form-data">
                
                @csrf

                <!-- Usuario -->
                <div class="form-group">
                    <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
                </div>

                <!-- Número de Control -->
                <div class="form-group">
                    <input type="text" id="numeroControl" name="numeroControl" placeholder="Ingresa tu Número de Control" required>
                    <div id="errorNumeroControl" class="error-message"></div>
                </div>

                <!-- Correo Electrónico -->
                <div class="form-group">
                    <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo electrónico institucional" required>
                    <div id="errorCorreo" class="error-message"></div>
                </div>

                <!-- Foto de Perfil (Opcional) -->
                <div class="form-group">
                    <label for="fotoPerfil">Foto de Perfil (Opcional):</label>
                    <input type="file" id="fotoPerfil" name="fotoPerfil" accept="image/*" onchange="mostrarVistaPrevia(this)" required>
                    <img id="preview_bici" class="image-preview" alt="Vista Previa de la Imagen">
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" id="contraseña1" name="contraseña1" placeholder="******" required>
                </div>

                <!-- Confirmar contraseña -->
                <div class="form-group">
                    <label for="contraseña">Confirmar contraseña:</label>
                    <input type="password" id="contraseña2" name="contraseña2" placeholder="******" required>
                </div>

                <!-- BOTON PARA ACEPTAR -->
                <div class="form-group campo-verificacion" id="campoVerificacion">
                    <button type="submit" class="boton boton-confirmar">Registrarse</button>
                </div>

                <!-- Botón para Verificar Correo 
                <div class="form-group">
                    <button type="button" class="boton boton-verificar" onclick="registrarUsuario(event)">Verificar Correo</button>
                </div>
                -->

                <!-- Campo para Ingresar el Código de Verificación 
                <div class="form-group campo-verificacion" id="campoVerificacion">
                    <input type="text" id="codigoIngresado" name="codigoIngresado" placeholder="Ingresa el código recibido en tu correo" required>
                    <div id="errorCodigo" class="error-message"></div>
                    <button type="button" class="boton boton-confirmar" onclick="verificarCodigo(event)">Confirmar Código</button>
                </div>
                -->

            </form>
        </div>
    </div>

</body>

</html>
