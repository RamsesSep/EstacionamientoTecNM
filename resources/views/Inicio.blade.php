<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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
            height: 80px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 1001;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        /* --- Estilos del Formulario de Inicio de Sesión --- */

        .login-container {
            background-color: #2c3e50;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 90%;
            color: #ecf0f1; 
        }

        .login-container .titulo {
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

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
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

        .boton-login {
            background-color: #4CAF50;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .boton-login:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .boton-login:active {
            background-color: #3e8e41;
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .boton-registrarse {
            background-color: #2980b9;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .boton-registrarse:hover {
            background-color: #0015ff;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .boton-registrarse:active {
            background-color: #cca800;
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para el enlace "¿Has olvidado la contraseña?" */
        .olvidaste-contrasena {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007BFF; 
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .olvidaste-contrasena:hover {
            color: #0015ff; 
            text-decoration: underline;
        }

        .logo {
            width: 150px; 
            height: auto; 
            margin-right: 20px; 
        }
        .logo2 {
            width: 60px;
            height: auto;
        }

        /* Responsividad */
        @media (max-width: 500px) {
            .login-container {
                padding: 20px;
            }

            .botones {
                flex-direction: column;
            }

            .botones button,
            .botones a {
                width: 100%;
                margin-bottom: 10px;
            }

            .botones a {
                margin-bottom: 0;
            }

            .olvidaste-contrasena {
                font-size: 12px;
            }
        }
    </style>
    <script>
        // Función para manejar el inicio de sesión
        function iniciarSesion(event) {
            event.preventDefault();
            const usuario = document.getElementById('usuario').value.trim();
            const contrasena = document.getElementById('contrasena').value;

            // Obtener usuarios registrados desde localStorage
            let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];

            // Buscar usuario por nombre de usuario
            const usuarioEncontrado = usuarios.find(u => u.usuario === usuario);

            if (usuarioEncontrado) {
                if (usuarioEncontrado.contrasena === contrasena) {
                    alert("Inicio de Sesión exitoso.");
                    window.location.href = "Menu.html"; 
                } else {
                    alert("Contraseña incorrecta.");
                }
            } else {
                alert("Usuario no encontrado.");
            }
        }

        // Función para salir 
        function salir() {
            if (confirm("¿Estás seguro de que deseas salir?")) {
                window.location.href = "Inicio.html";
            }
        }
    </script>
</head>

<body>

    <!-- Barra de Encabezado -->
    <div class="header">
        <img src="{{ asset('images/tecnm.png') }}" alt="Logo" class="logo">
        <img src="{{ asset('images/itl.png')}}" alt="Logo" class="logo2">
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="login-container">
            <div class="titulo">Inicio de Sesión</div>
            <form id="loginForm" onsubmit="iniciarSesion(event)">
                <!-- Usuario -->
                <div class="form-group">
                    <label for="usuario"></label>
                    <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="contrasena"></label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
                </div>

                <!-- Enlace para restablecer contraseña -->
                <a href="{{ route('recuperar.contraseña'); }}" class="olvidaste-contrasena">¿Has olvidado la contraseña?</a>

                <!-- Botones -->
                <div class="botones">
                    <a href="{{ route('registro.usuario'); }}" class="boton-registrarse">Registrarse</a>
                    <button type="submit" class="boton-login">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
