<?php
include 'conexion.php';

// Obtiene el ID de la categoría a eliminar
$name = $_POST['name'];

// Elimina las donaciones asociadas al usuario
$sql = "DELETE FROM donations WHERE name = (SELECT name FROM users WHERE name = '$name')";
if ($conn->query($sql) === TRUE) {
    // Elimina el usuario
    $sql = "DELETE FROM users WHERE name = '$name'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario eliminado con éxito');</script>";
        echo "<script>window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario: " . $conn->error . "');</script>";
        echo "<script>window.location.href='admin.php';</script>";
    }
} else {
    echo "<script>alert('Error al eliminar las donaciones: " . $conn->error . "');</script>";
    echo "<script>window.location.href='admin.php';</script>";
}

$conn->close();
?>