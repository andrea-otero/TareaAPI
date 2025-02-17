<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo de API en PHP</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 20px; }
        table { width: 80%; margin: auto; border-collapse: collapse; margin-bottom: 40px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>

    <h2>Usuarios</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <?php
            <!-- Se obtienen los datos de api.php -->
            $datos = json_decode(file_get_contents('api.php'), true);
            <!-- Se recorre el arreglo de usuarios y se muestra cada uno en una fila de la tabla -->
            foreach ($datos["usuarios"] as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['firstname'] . " " . $usuario['lastname'] . "</td>";
                echo "<td>" . $usuario['email'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <h2>Productos</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php
            <!-- Se recorre el arreglo de productos -->
            foreach ($datos["productos"] as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['name'] . "</td>";
                echo "<td>$" . $producto['price'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <h2>Direcciones</h2>
    <table>
        <tr>
            <th>Calle</th>
            <th>Ciudad</th>
            <th>País</th>
        </tr>
        <?php
            <!-- Se recorre el arreglo de direcciones -->
            foreach ($datos["direcciones"] as $direccion) {
                echo "<tr>";
                echo "<td>" . $direccion['street'] . "</td>";
                echo "<td>" . $direccion['city'] . "</td>";
                echo "<td>" . $direccion['country'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

</body>
</html>