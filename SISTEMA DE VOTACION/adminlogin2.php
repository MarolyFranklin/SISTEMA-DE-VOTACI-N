<?php
session_start(); // Iniciar la sesión

// Conexión a la base de datos
include('dbConnect.php');

// Obtener los datos del formulario de manera segura
$username = isset($_POST['username']) ? mysqli_real_escape_string($conexion, trim($_POST['username'])) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Verificar que los campos no estén vacíos
if(empty($username) || empty($password)) {
    echo '<script>alert("Por favor, completa todos los campos."); window.location="login.php";</script>';
    exit();
}

// Consulta SQL con parámetros preparados para evitar inyecciones SQL
$sql = "SELECT * FROM `admin` WHERE username=?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Verificar si la consulta devolvió resultados
if(mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);

    // Verificar la contraseña en texto plano
    if ($password === $data['password']) {
        // La contraseña es correcta, guardar los datos en la sesión
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];

        // Redirigir al usuario al área principal después del inicio de sesión
        header("Location: menuadmin.html");
        exit();
    } else {
        // Contraseña incorrecta
        echo '<script>alert("Contraseña incorrecta."); window.location="adminlogin.php";</script>';
    }
} else {
    // No se encontraron coincidencias con las credenciales proporcionadas
    echo '<script>alert("Credenciales inválidas."); window.location="adminlogin.php";</script>';
}

// Cerrar la conexión
mysqli_close($conexion);
?>
