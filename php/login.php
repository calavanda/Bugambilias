<?php

include ('conexion.php');

if(isset($_POST["btnregistrarx"]))
{
    $name = $_POST["txtuser"];
    $psswd = $_POST["txtpsswd"];
    $email = $_POST["txtemail"];

    $queryusuario = mysqli_query($conn,"SELECT * FROM users WHERE name = '$name'");
    $nr = mysqli_num_rows($queryusuario);

    if ($nr == 0)
    {
        $psswd_fuerte = password_hash($psswd, PASSWORD_BCRYPT);
        $queryregistrar = "INSERT INTO users (name,email,psswd) VALUES ('$name','$email','$psswd_fuerte')";

        if (mysqli_query($conn,$queryregistrar))
        {
            echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activación de Cuenta</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.678);
            border: 2px solid #00a896;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 800px;
        }
        .card img {
            width: 150px;
            height: 150px;
        }
        .card h1 {
            font-size: 36px;
            margin: 30px 0 10px 0;
            color: #000000;
        }
        .card p {
            font-size: 24px;
            color: #000000;
            /*bold*/
            font-weight: bold;
        }

        .log-button {
            background-color: #00a896;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 20px;
        }

        /* Agregamos el video como fondo */
        .video-fondo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
</head>
<body>
    <video class="video-fondo" autoplay loop muted>
        <source src="/proyecto/img/regis-exitoso.mp4" type="video/mp4">
    </video>
    <div class="card">
        <img src="/proyecto/img/validar.png" alt="Checkmark">
        <h1>Hola!,</h1>
        <p>Su cuenta en Fundación Bugambilia ha sido activada con éxito</p>
<div class="log-button">
                <a href="/proyecto/registro.html">Regresar</a>
        </div>
        </div>
</body>
</html>
';}
else{
    echo "Error: ".$queryregistrar."<br>".mysql_error($conn);
    }
                }
                else{
                    echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activación de Cuenta</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.678);
            border: 2px solid #00a896;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 800px;
        }
        .card img {
            width: 150px;
            height: 150px;
        }
        .card h1 {
            font-size: 36px;
            margin: 30px 0 10px 0;
            color: #000000;
        }
        .card p {
            font-size: 24px;
            color: #000000;
            /*bold*/
            font-weight: bold;
        }

        .log-button a{
            background-color: #00a896;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 20px;
        }

        /* Agregamos el video como fondo */
        .video-fondo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
</head>
<body>
    <video class="video-fondo" autoplay loop muted>
        <source src="/proyecto/img/regis-exitoso.mp4" type="video/mp4">
    </video>
    <div class="card">
        <img src="/proyecto/img/no-valido.png" alt="Checkmark">
        <h1>Lo siento!,</h1>
        <p>No puedes registrar a este usuario porque ya existe.</p>
        <div class="log-button">
                <a href="/proyecto/registro.html">Regresar</a>
        </div>
        </div>
</body>
</html>
';}
            }
            
?>