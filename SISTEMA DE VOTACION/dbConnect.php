<?php
$host = "localhost";
$port = 3310;
$user = "root";
$password = "";
$dbname = "voting";

// Conectar a la base de datos usando MySQLi
$conexion = mysqli_connect($host, $user, $password, $dbname, $port);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}
?>