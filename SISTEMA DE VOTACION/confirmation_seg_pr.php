<?php
session_start(); // Iniciar la sesión
if (!isset($_SESSION['id']) || $_SESSION['status'] == 1) {
    die("El usuario ya ha votado."); // Verificar si el usuario está logueado y si no ha votado
}

// Incluir la conexión a la base de datos
include("dbConnect.php");

// Obtener el ID del candidato desde la URL
$candidato_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Verificar que el ID del candidato es válido
if ($candidato_id > 0) {
    // Actualizar el conteo de votos del candidato
    $sql = "UPDATE candidatos_est SET total_votos = total_votos + 1 WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $candidato_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Cambiar el estado del usuario a 1 (ya votó)
    $sql = "UPDATE userdata SET status = 1 WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>alert('Gracias por tu voto!'); window.location='profesor_saludyseg.php';</script>";
} else {
    echo "<script>alert('Candidato no válido.'); window.location='profesor_saludyseg.php';</script>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>