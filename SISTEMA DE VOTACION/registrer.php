<?php
// Incluir la conexión a la base de datos
include('dbConnect.php');

// Obtener los datos del formulario
$username = $_POST['username'];
$ident = $_POST['ident'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$std = $_POST['std'];
$std1 = $_POST['std1'];

// Verificar si las contraseñas coinciden
if ($password != $cpassword) {
    echo '<script>
    alert("La contraseña no coincide");
    window.location="registro.php";
    </script>';
    exit;
}

// Encriptar la contraseña antes de almacenarla
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Consulta SQL usando MySQLi
$sql = "INSERT INTO userdata (username, ident, password, standard, standard1, status) 
        VALUES (?, ?, ?, ?, ?, 0)";

// Preparar la consulta
if ($stmt = mysqli_prepare($conexion, $sql)) {
    // Enlazar los parámetros a la consulta
    mysqli_stmt_bind_param($stmt, "sssss", $username, $ident, $hashed_password, $std, $std1);

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>
        alert("Registro Exitoso");
        window.location="registro.php"; // Redirigir a la página de login
        </script>';
    } else {
        echo '<script>
        alert("Error en el registro: ' . mysqli_error($conexion) . '");
        window.location="registro.php";
        </script>';
    }

    // Cerrar la sentencia
    mysqli_stmt_close($stmt);
} else {
    echo '<script>
    alert("Error en la preparación de la consulta: ' . mysqli_error($conexion) . '");
    window.location="registro.php";
    </script>';
}

// Cerrar la conexión
mysqli_close($conexion);
?>
