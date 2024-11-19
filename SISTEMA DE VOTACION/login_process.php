<?php
session_start(); // Iniciar la sesión

// Conexión a la base de datos
include('dbConnect.php');

// Obtener los datos del formulario de manera segura
$username = isset($_POST['username']) ? mysqli_real_escape_string($conexion, trim($_POST['username'])) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$std = isset($_POST['std']) ? mysqli_real_escape_string($conexion, $_POST['std']) : '';
$std1 = isset($_POST['std1']) ? mysqli_real_escape_string($conexion, $_POST['std1']) : '';

// Verificar que los campos no estén vacíos
if(empty($username) || empty($password) || empty($std) || empty($std1)) {
    echo '<script>alert("Por favor, completa todos los campos."); window.location="login.php";</script>';
    exit();
}

// Consulta SQL con parámetros preparados para evitar inyecciones SQL
$sql = "SELECT * FROM `userdata` WHERE username=? AND standard=? AND standard1=?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $username, $std, $std1);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Verificar si la consulta devolvió resultados
if(mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);

    // Verificar la contraseña cifrada
    if(password_verify($password, $data['password'])) {
        // La contraseña es correcta, guardar los datos en la sesión
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        // Redirigir según el rol (Estudiante/Profesor) y carrera
        if($data['standard'] === "Estudiante") {
            switch($data['standard1']) {
                case "Ingeniería de Software":
                    header("Location: estudiante_software.php");
                    exit();
                case "Ingeniería Eléctrica":
                    header("Location: estudiante_electrica.php");
                    exit();
                    case "Ingeniería de Alimentos":
                        header("Location: estudiante_alimentos.php");
                        exit();
                    case "Ingeniería Ambiental":
                        header("Location: estudiante_ambiental.php");
                        exit();
                        case "Salud y Seguridad en el Trabajo":
                            header("Location: estudiante_saludyseg.php");
                            exit();
                    
                
            }
        } elseif($data['standard'] === "Profesor") {
            switch($data['standard1']) {
                case "Ingeniería de Software":
                    header("Location: profesor_software.php");
                    exit();
                case "Ingeniería Eléctrica":
                    header("Location: profesor_electrica.php");
                    exit();
                    case "Ingeniería de Alimentos":
                        header("Location: profesor_alimentos.php");
                        exit();
                    case "Ingeniería Ambiental":
                        header("Location: profesor_ambiental.php");
                        exit();
                        case "Salud y Seguridad en el Trabajo":
                            header("Location: profesor_saludyseg.php");
                            exit();
                    
            }
        }
    } else {
        // Contraseña incorrecta
        echo '<script>alert("Contraseña incorrecta."); window.location="login.php";</script>';
    }
} else {
    // No se encontraron coincidencias con las credenciales proporcionadas
    echo '<script>alert("Credenciales inválidas."); window.location="login.php";</script>';
}

// Cerrar la conexión
mysqli_close($conexion);
?>
 