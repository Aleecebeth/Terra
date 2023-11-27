<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $conexion = mysqli_connect("localhost", "root", "", "bdlogin");

    if (!$conexion) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    $consulta = "INSERT INTO login (usuario, contraseña) VALUES ('$usuario', '$contraseña')";

    if (mysqli_query($conexion, $consulta)) {
        echo "Registro exitoso. <a href='../html/index.html'>Iniciar sesión</a>";
    } else {
        echo "Error al guardar los datos: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>