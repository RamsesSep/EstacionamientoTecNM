<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/person.svg') }}">
    <title>Perfil de Usuario</title>
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
        .sidebar .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar.active {
            left: 0;
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
            /*padding: 15px 20px;
            display: absolute;
            align-items: center;
            transition: background 0.3s;*/
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
            fill: white;
            width: 20px;
            height: 20px;
        }

        /* Contenido Principal */
        .content {
            margin-top: 60px; 
            margin-left: 250px; 
            padding: 20px;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        .sidebar.active ~ .content {
            margin-left: 250px;
        }

        /* Estilos del Contenedor de Perfil */
        .perfil-container {
            background-color: #2c3e50; 
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
        }

        .perfil-container .titulo {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
            color: #e0e0e0;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #e0e0e0;
        }

        input[type="text"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 12px 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e0e0e0;
            color: #333;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="file"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        .image-preview {
            margin: 10px auto; 
            display: none;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px; 
            border: 2px solid #ccc;
        }

        /* Estilos para los mensajes de éxito y error */
        #mensaje {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 4px;
            display: none;
            font-size: 16px;
            text-align: center;
        }

        .mensaje-exito {
            background-color: #4CAF50;
            color: white;
        }

        .mensaje-error {
            background-color: #f44336; 
            color: white;
        }

        /* Botones Reemplazados por Botones con Íconos */
        .buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        /* Estilos para los botones de íconos */
        .icon {
            background: none; 
            border: none;   
            padding: 0;      
            cursor: pointer;  
            transition: transform 0.2s ease, opacity 0.2s ease; 
            outline: none;   
        }

        .icon img {
            width: 30px; 
            height: 30px;
            display: block; 
        }

        .icon:hover img {
            transform: scale(1.1); 
            opacity: 0.8; 
        }

        .icon:focus img {
            box-shadow: 0 0 0 2px #2980b9; 
            border-radius: 4px;       
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
                margin-left: 0; 
            }
        }

        @media (max-width: 600px) {
            .perfil-container {
                padding: 20px;
            }

            .buttons {
                justify-content: flex-end; 
                flex-direction: column;    
                gap: 10px;
            }

            .icon {
                width: 40px;
                height: 40px;
                margin-left: 0;
                margin-bottom: 10px; 
            }

            .icon:last-child {
                margin-bottom: 0; 
            }

            .image-preview {
                max-width: 100px;
                max-height: 100px;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.querySelector(".toggle-btn");
            const sidebar = document.querySelector(".sidebar");
            const content = document.querySelector(".content");

            // Función para abrir/ocultar el menú lateral
            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("active");

                // Ajustar el margen del contenido según el estado del sidebar en escritorio
                if (window.innerWidth > 768) {
                    if (sidebar.classList.contains("active")) {
                        content.style.marginLeft = "250px";
                    } else {
                        content.style.marginLeft = "0";
                    }
                }
            });

            // Ajustar el estado del sidebar al redimensionar la ventana
            window.addEventListener("resize", () => {
                if (window.innerWidth > 768) {
                    sidebar.classList.add("active");
                    content.style.marginLeft = "250px";
                } else {
                    sidebar.classList.remove("active");
                    content.style.marginLeft = "0";
                }
            });

            // Inicializar el estado del sidebar basado en el tamaño de la ventana al cargar
            if (window.innerWidth > 768) {
                sidebar.classList.add("active");
                content.style.marginLeft = "250px";
            } else {
                sidebar.classList.remove("active");
                content.style.marginLeft = "0";
            }

            // Mostrar la foto de perfil si existe
            let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];
            let usuarioActual = usuarios.length > 0 ? usuarios[usuarios.length - 1] : null;

            const fotoPerfil = document.getElementById('fotoPerfil');
            if (usuarioActual && usuarioActual.fotoPerfil) {
                fotoPerfil.src = usuarioActual.fotoPerfil;
                fotoPerfil.style.display = 'block';
            }

            const nombreUsuarioInput = document.getElementById('nombreUsuario');
            if (usuarioActual && usuarioActual.usuario) {
                nombreUsuarioInput.value = usuarioActual.usuario;
            }
        });

        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                localStorage.clear();
                window.location.href = "{{ route('inicio.sesion') }}";
            }
        }

        function mostrarVistaPrevia(input) {
            const preview = document.getElementById('previewPerfil');
            const maxSize = 2 * 1024 * 1024;

            if (input.files && input.files[0]) {
                if (input.files[0].size > maxSize) {
                    mostrarMensaje("El archivo es demasiado grande. El tamaño máximo es 2MB.", "error");
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

        function mostrarMensaje(mensaje, tipo) {
            const mensajeDiv = document.getElementById('mensaje');
            mensajeDiv.textContent = mensaje;
            if (tipo === "exito") {
                mensajeDiv.className = 'mensaje-exito';
            } else if (tipo === "error") {
                mensajeDiv.className = 'mensaje-error';
            }
            mensajeDiv.style.display = 'block';

            // Ocultar el mensaje después de 5 segundos
            setTimeout(() => {
                mensajeDiv.style.display = 'none';
            }, 5000);
        }

        function actualizarPerfil(event) {
            event.preventDefault();

            let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];
            let usuarioActual = usuarios.length > 0 ? usuarios[usuarios.length - 1] : null;

            // Obtener los valores del formulario
            const nuevoNombre = document.getElementById('nombreUsuario').value.trim();
            const fotoInput = document.getElementById('nuevoFotoPerfil');
            const nuevaFoto = fotoInput.files[0];
            const contrasenaActualInput = document.getElementById('contrasenaActual');
            const contrasenaActual = contrasenaActualInput.value;
            const nuevaContrasenaInput = document.getElementById('nuevaContrasena');
            const nuevaContrasena = nuevaContrasenaInput.value;
            const confirmarContrasenaInput = document.getElementById('confirmarContrasena');
            const confirmarContrasena = confirmarContrasenaInput.value;

            // Mensajes de error
            const errorNombre = document.getElementById('errorNombre');
            const errorContrasena = document.getElementById('errorContrasena');
            const errorConfirmarContrasena = document.getElementById('errorConfirmarContrasena');

            let valid = true;

            // Ocultar mensajes de error
            errorNombre.style.display = 'none';
            errorContrasena.style.display = 'none';
            errorConfirmarContrasena.style.display = 'none';

            if (!valid) {
                mostrarMensaje("Actualización fallida. Por favor, corrige los errores.", "error");
                return;
            }

            // Actualizar la foto de perfil si se seleccionó una nueva
            if (nuevaFoto) {
                const maxSize = 2 * 1024 * 1024; // 2MB
                if (nuevaFoto.size > maxSize) {
                    mostrarMensaje("El archivo de la nueva foto es demasiado grande. El tamaño máximo es 2MB.", "error");
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    usuarioActual.fotoPerfil = e.target.result;

                    // Actualizar en localStorage
                    usuarios[usuarios.length - 1] = usuarioActual;
                    localStorage.setItem('usuarios', JSON.stringify(usuarios));

                    mostrarMensaje("Perfil actualizado con éxito.", "exito");
                    window.location.reload(); 
                };
                reader.readAsDataURL(nuevaFoto);
            } else {
                // Si no se actualiza la foto, solo guardar el nombre y contraseña
                usuarios[usuarios.length - 1] = usuarioActual;
                localStorage.setItem('usuarios', JSON.stringify(usuarios));

                mostrarMensaje("Perfil actualizado con éxito.", "exito");
                window.location.reload(); // Recargar la página para mostrar los cambios
            }
        }

        // Funciones para manejar los íconos
        function submitForm() {
            document.getElementById('perfilForm').submit();
        }

        function resetForm() {
            document.getElementById('perfilForm').reset();
        }

        // Función para manejar eventos de teclado (Enter) en los botones
        function handleKeyPress(event, action) {
            if (event.key === 'Enter' || event.keyCode === 13) {
                action();
            }
        }
    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <button class="toggle-btn" aria-label="Abrir menú">
            <img src="{{ asset('images/Menu.svg') }}" width="30" height="30" alt="Menú">
        </button>
        <img src="{{ asset('images/tecnm.png') }}" alt="Logo TECNM" class="logo">
        <img src="{{ asset('images/itl.png') }}" alt="Logo ITL" class="logo2">
    </div>

    <!-- Menú Lateral  -->
    <div class="sidebar active">
        <div class="logo">Perfil</div>
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
            <!--<li onclick="window.location.href='Menu.html'">-->
            <li>
                <a href="{{ route('menu.autos') }}">
                    <img src="{{ asset('images/Home.svg') }}" width="20" height="20" alt="Menú" style="margin-right: 10px;">
                    <span>Regresar al Menú</span>
                </a>
            </li>
            <li class="salir" onclick="salir()">
                <img src="{{ asset('images/power.svg') }}" width="20" height="20" alt="Salir" style="margin-right: 10px;">
                <span>Cerrar sesión</span>
            </li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="perfil-container">
            <div class="titulo">Perfil de Usuario</div>

            <!-- Div para mensajes -->
            <div id="mensaje"></div>

                <!-- Foto de Perfil -->
                <div class="form-group">
                    <label for="nuevoFotoPerfil">Foto de Perfil:</label>
                    <input type="file" id="nuevoFotoPerfil" name="nuevoFotoPerfil" accept="image/*" onchange="mostrarVistaPrevia(this)">
                    <img id="previewPerfil" class="image-preview" alt="Vista Previa de la Foto de Perfil">
                </div>

                <!-- Íconos para Eliminar y Guardar -->
                <div class="buttons">
                    <!-- Botón de Eliminar -->
                    <button 
                        type="button"
                        class="icon reset-icon" 
                        title="Eliminar" 
                        onclick="resetForm()"
                        aria-label="Eliminar"
                        onkeypress="handleKeyPress(event, resetForm)"
                    >
                        <img src="{{ asset('images/delete.svg') }}" alt="Eliminar">
                    </button>

                    <!-- Botón de Guardar -->
                    <button 
                        type="button"
                        class="icon submit-icon" 
                        title="Guardar" 
                        onclick="submitForm()"
                        aria-label="Guardar"
                        onkeypress="handleKeyPress(event, submitForm)"
                    >
                        <img src="{{ asset('images/Save.svg') }}" alt="Guardar">
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
