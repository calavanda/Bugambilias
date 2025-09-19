<?php
include 'conexion.php';

// Obtiene el ID de la categoría a eliminar
$ncategory = $_POST['ncategory'];

// Prepara la consulta para eliminar la categoría
$sql = "DELETE FROM categories WHERE ncategory = '$ncategory'";

// Ejecuta la consulta
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Categoría eliminada con éxito');</script>";
    echo "<script>window.location.href='admin.php';</script>";
} else {
    echo "<script>alert('Error al eliminar categoría: " . $conn->error . "');</script>";
    echo "<script>window.location.href='admin.php';</script>";
}

$conn->close();
?>