<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establecer Contraseña</title>
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
            margin-top: 60px; 
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            height: calc(100vh - 60px);
        }

        /* --- Estilos del Formulario Establecer Contraseña --- */

        .password-container {
            background-color: #2c3e50;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 90%;
            color: #ecf0f1; 
        }

        .password-container .titulo {
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

        input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e0e0e0;
            color: #333;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="password"]:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
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

        .botones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .botones button,
        .botones a {
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Botón de Guardar */
        .boton-guardar {
            background-color: #007BFF; 
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .boton-guardar:hover {
            background-color: #0015ff;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .boton-guardar:active {
            background-color: #0015ff;
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Botón de Cancelar */
        .boton-cancelar {
            background-color: #f44336; 
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .boton-cancelar:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .boton-cancelar:active {
            background-color: #b71c1c;
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            .password-container {
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
            }
        }
    </style>
    <script>
        // Función para manejar el establecimiento de contraseña
        function establecerContrasena(event) {
            event.preventDefault();

            const contrasena = document.getElementById('contrasena').value;
            const confirmarContrasena = document.getElementById('confirmarContrasena').value;

            const errorContrasena = document.getElementById('errorContrasena');
            const errorConfirmarContrasena = document.getElementById('errorConfirmarContrasena');

            let valid = true;

            // Ocultar mensajes de error
            errorContrasena.style.display = 'none';
            errorConfirmarContrasena.style.display = 'none';

            // Validación de contraseñas coincidentes
            if (contrasena !== confirmarContrasena) {
                errorConfirmarContrasena.textContent = "Las contraseñas no coinciden.";
                errorConfirmarContrasena.style.display = 'block';
                valid = false;
            }

            // Validación de longitud mínima de contraseña
            if (contrasena.length < 6) {
                errorContrasena.textContent = "La contraseña debe tener al menos 6 caracteres.";
                errorContrasena.style.display = 'block';
                valid = false;
            }


            if (valid) {
                // Obtener usuarios existentes
                let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];

                // Asignar la contraseña al último usuario registrado
                if (usuarios.length === 0) {
                    alert("No hay usuarios registrados.");
                    return;
                }

                // Buscar el usuario sin contraseña (el que acaba de registrarse)
                const usuarioSinContrasena = usuarios.find(u => !u.contrasena);

                if (!usuarioSinContrasena) {
                    alert("No se encontró un usuario para establecer la contraseña.");
                    return;
                }

                // Asignar la contraseña al usuario
                usuarioSinContrasena.contrasena = contrasena;

                // Guardar en localStorage
                localStorage.setItem('usuarios', JSON.stringify(usuarios));

                alert("Contraseña establecida con éxito.");
                window.location.href = "Inicio.html"; // Redirigir al menú principal
            }
        }

        // Función para manejar la navegación desde el encabezado (opcional)
        function irInicio() {
            window.location.href = "Inicio.html";
        }
    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <img src="tecnm.png" alt="Logo TECNM" class="logo">
        <img src="itl.png" alt="Logo ITL" class="logo2">
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="password-container">
            <div class="titulo">Establecer Contraseña</div>
            <form id="passwordForm" onsubmit="establecerContrasena(event)">
                <!-- Contraseña -->
                <div class="form-group">
                    <label for="contrasena"></label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
                    <div id="errorContrasena" class="error-message"></div>
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group">
                    <label for="confirmarContrasena"></label>
                    <input type="password" id="confirmarContrasena" name="confirmarContrasena" placeholder="Confirma tu contraseña" required>
                    <div id="errorConfirmarContrasena" class="error-message"></div>
                </div>

                <!-- Botones -->
                <div class="botones">
                    <a href="Inicio.html" class="boton-cancelar">Cancelar</a>
                    <button type="submit" class="boton-guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
