<!DOCTYPE html>
<html>

<head>
    <title>Bienvenido a Qwikly</title>
    <style>
        /* Estilos CSS para el diseño del correo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            background-color: #0dcaf0;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }

        h2 {
            margin-top: 0;
        }

        .content {
            padding: 10px;
        }

        .content p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Qwikly - Bienvenido {{$nombre}}</h2>
        </div>
        <div class="content text-center">
            <p>Felicidades <strong>{{ $nombre }}</strong> </p>
            <p>Ahora eres parte de Qwikly!</p>
            <p>Ya puede acceder a la plataforma con sus datos de acceso :</p>
            <p>Correo: <strong>{{ $correo }}</strong> </p>
            <p>Contraseña: <strong>{{ $contrasena }}</strong> </p>
            <p><a href="http://127.0.0.1:8000/login">Acceder a Qwikly</a></p>
            <p>Es importante que no compartas tus datos de acceso con nadie.</p>


        </div>
        <div class="footer">
            <p><strong>Copyright &copy; Qwikly 2023</strong></p>
        </div>
    </div>
</body>

</html>