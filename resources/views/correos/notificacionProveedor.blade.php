<!DOCTYPE html>
<html>

<head>
    <title>Tienes un nuevo Mensaje</title>
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
            <h2>Qwikly - Mensaje</h2>
        </div>
        <div class="content text-center">
            <p>Hola <strong>{{ $nombre }}</strong> </p>
            <p>De parte de la administración de Qwikly</p>
            <p><strong>Mensaje : </strong> </p>
            <p> {{$mensaje}} </p>

            <p>Puedes ingresar a la plataforma desde el siguiente vinculo.</p>
            <p><a href="http://127.0.0.1:8000/login">Acceder a Qwikly</a></p>
            


        </div>
        <div class="footer">
            <p><strong>Copyright &copy; Qwikly 2023</strong></p>
        </div>
    </div>
</body>

</html>