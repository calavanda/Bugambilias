<?php

    include ('conexion.php');
    $name = $_POST["txtuser"];
    $email = $_POST["txtemail"];
    $psswd = $_POST["txtpsswd"];
    session_start();
    $_SESSION['user']=$name;

    $conexion = mysqli_connect("localhost","root","","Bugambilia");

    $consulta = "SELECT * FROM login WHERE user ='$name' and psswd='$psswd'";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_fetch_array($resultado);
        if($filas['id_rol']==1){
            header("Location: admin.php");
        }
        else if($filas['id_rol']==2){
            header("Location: /proyecto/usuario/index.html");
        }
        else {
            header("Location: /proyecto/usuario/index.html");
        }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>