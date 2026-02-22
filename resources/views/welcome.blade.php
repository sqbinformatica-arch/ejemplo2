<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }

        .login-btn {
            background-color: #4e73df;
            color: white;
        }

        .register-btn {
            background-color: #858796;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Iniciar Sesión</h2>

        <form id="loginForm">
            <div class="input-group">
                <label>Usuario</label>
                <input type="text" required>
            </div>

            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" required>
            </div>

            <button type="submit" class="btn login-btn">Log In</button>
        </form>

        <a href="registro.html" class="btn register-btn">Registrar Usuario</a>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            
            
            window.location.href = "ofertas.html"; 
        });
    </script>

</body>
</html>
