<?php
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

// Obtener el ID de la URL
$id = $_GET['id'];

// Consultar si el registro existe
$query = "SELECT * FROM userdata WHERE id = $id";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("No se encontró el registro para eliminar.");
}

// Eliminar el registro de la base de datos
$delete_query = "DELETE FROM userdata WHERE id = $id";

if (mysqli_query($conexion, $delete_query)) {
    echo "Registro eliminado correctamente.";
    header("Location: listado_votante.php"); // Redirigir al listado después de eliminar
    exit();
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
