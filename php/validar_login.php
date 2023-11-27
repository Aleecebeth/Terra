<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $conexion = mysqli_connect("localhost", "root", "", "bdlogin");

    if (!$conexion) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    $consulta = "SELECT * FROM login WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        echo "Inicio de sesion exitoso: <a href='../html/inicio.html'>Bienvenido a Terra</a>";
    } else {
        echo "Nombre de usuario o contraseña incorrectos";
    }

    mysqli_close($conexion);
}
?>