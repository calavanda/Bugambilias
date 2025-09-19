<?php
include 'conexion.php';

// Consulta para obtener la cantidad de adopciones registradas
$sql = "SELECT COUNT(*) as total FROM sales";
$result = $conn->query($sql);
$sales = $result->fetch_assoc();
$total_adopciones = $sales['total'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }
        .sidebar {
            height: 100vh;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #8C034E;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #FFB6C1;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background-color: #C71585;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .stats .stat {
            background-color: white;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
        }
        .users {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .users table {
            width: 100%;
            border-collapse: collapse;
        }
        .users th, .users td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .users th {
            background-color: #f2f2f2;
        }
        .users button {
            background-color: #C71585;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .users button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="/proyecto/php/admin.php">Todo</a>
        <a href="/proyecto/php/user.php">Usuarios</a>
        <a href="/proyecto/php/cat.php">Categorias</a>
        <a href="/proyecto/php/sales.php">Ventas</a>
        <a href="/proyecto/index.html">Salir</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Panel de Administración</h1>
        </div>

        <div class="stats">
    <div class="stat">
        <h2>Cantidad de adopciónes</h2>
        <p><?php echo $total_adopciones; ?></p>
    </div>
</div>

        <div class="users">
    <h2>Lista de Usuarios</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Total</th>
            <th>Id_plant</th>
            <th>Id_user</th>
            <th>Acciones</th>
        </tr>
        
        <?php
        // Consulta para obtener usuarios registrados
        $sql = "SELECT * FROM sales";
        $result = $conn->query($sql);

        // Mostrar usuarios en la tabla
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["dates"] . "</td>";
                echo "<td>" . $row["totals"] . "</td>";
                echo "<td>" . $row["id_plant"] . "</td>";
                echo "<td>" . $row["id_user"] . "</td>";
                echo "<td><button>Eliminar</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay donaciones registrados</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
