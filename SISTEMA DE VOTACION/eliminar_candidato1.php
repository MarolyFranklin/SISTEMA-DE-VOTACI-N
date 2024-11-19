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

// Verificar si se recibió el ID del candidato
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Eliminar el registro de la base de datos
    $deleteQuery = "DELETE FROM candidatos_est WHERE id = $id";

    if (mysqli_query($conexion, $deleteQuery)) {
        echo "<script>alert('Candidato eliminado con éxito.'); window.location.href = 'listado_candidato1.php';</script>";
    } else {
        echo "Error al eliminar: " . mysqli_error($conexion);
    }
} else {
    die("ID no especificado.");
}

// Cerrar la conexión
mysqli_close($conexion);
?>
