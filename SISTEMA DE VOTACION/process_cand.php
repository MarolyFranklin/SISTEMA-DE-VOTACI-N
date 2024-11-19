<?php
$name = $_REQUEST['txtName'];
$email = $_REQUEST['txtEmail'];
$descripcion = $_REQUEST['txtDescripcion'];
$branch = $_REQUEST['txtbranch'];

// Conexión a la base de datos
$host = "localhost";
$port = 3310;
$user = "root";
$password = "";
$dbname = "voting";

$conexion = mysqli_connect($host, $user, $password, $dbname, $port);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Consulta SQL para insertar el nuevo candidato
$sql = "INSERT INTO candidatos_est (nombre, correo, descripcion, carrera,  total_votos) VALUES (?, ?, ?, ?, 0)";

// Preparar la consulta
$stmt = mysqli_prepare($conexion, $sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $descripcion, $branch);

    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
} else {
    echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);

// Redirigir a la página de estado
header('Location: pending.php');
exit();
?>
