<?php
include 'conexion.php';

// Obtiene los datos del formulario
$ncategory = $_POST['ncategory'];
$descriptionc = $_POST['descriptionc'];

// Prepara la consulta para insertar los datos
$sql = "INSERT INTO categories (ncategory, descriptionc) VALUES ('$ncategory', '$descriptionc')";

// Ejecuta la consulta
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Categoría agregada con éxito');</script>";
    echo "<script>window.location.href='categorias.php';</script>";
} else {
    echo "<script>alert('Error al agregar categoría: " . $conn->error . "');</script>";
    echo "<script>window.location.href='categorias.php';</script>";
}

$conn->close();
?>