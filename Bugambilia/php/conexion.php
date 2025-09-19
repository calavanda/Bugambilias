<?php
$conn = new mysqli("localhost","root","","Bugambilia");

if ($conn->connect_error) {
    echo "No hay conexion: (" . $conn->connect_errno . ") " . $conn->connect_error;
    }
?>