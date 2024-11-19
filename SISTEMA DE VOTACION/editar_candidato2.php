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

    // Obtener los datos actuales del candidato
    $query = "SELECT * FROM candidatos_prof WHERE id = $id";
    $result = mysqli_query($conexion, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        die("Candidato no encontrado.");
    }

    $candidato = mysqli_fetch_assoc($result);
} else {
    die("ID no especificado.");
}

// Procesar la actualización al enviar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $carrera = mysqli_real_escape_string($conexion, $_POST['carrera']);

    // Actualizar los datos en la base de datos (sin modificar total_votos)
    $updateQuery = "UPDATE candidatos_prof 
                    SET nombre = '$nombre', correo = '$correo', descripcion = '$descripcion', carrera = '$carrera' 
                    WHERE id = $id";

    if (mysqli_query($conexion, $updateQuery)) {
        echo "<script>alert('Candidato actualizado con éxito.'); window.location.href = 'listado_candidato1.php';</script>";
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>
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

// Consultar todos los registros de la tabla 'candidatos_est'
$query = "SELECT * FROM candidatos_prof";
$result = mysqli_query($conexion, $query);

if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
   <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
</head>
<body>
<div class="container-fluid" id="cont-3">
<header id="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <img src="img/Logo-FET-q5sdgaqv2nb2ekiucs8911k2e5eu12ktkoocilrpr6.png" alt="Logo de la Universidad" width="150" height="90">
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon" style="color: white;"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
   <ul class="navbar-nav ml-auto animate__animated animate__bounceInDown" style="padding-right: 50px;">

   
     <li class="nav-item" >
     <a class="nav-link" href="index.html" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px; text-transform: capitalize; padding: 20px;">Salir</a>

     </li>
   
   </ul>
 </div>
</nav>
</header>
<script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>
<br>
<br>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Candidato</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Editar Candidato</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($candidato['nombre']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($candidato['correo']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($candidato['descripcion']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="carrera" class="form-label">Carrera</label>
                    <select id="carrera" name="carrera" class="form-select" required>
                        <option value="Ingeniería de Software" <?php if ($candidato['carrera'] == 'Ingeniería de Software') echo 'selected'; ?>>Ingeniería de Software</option>
                        <option value="Ingeniería Eléctrica" <?php if ($candidato['carrera'] == 'Ingeniería Eléctrica') echo 'selected'; ?>>Ingeniería Eléctrica</option>
                        <option value="Ingeniería de Alimentos" <?php if ($candidato['carrera'] == 'Ingeniería de Alimentos') echo 'selected'; ?>>Ingeniería de Alimentos</option>
                        <option value="Ingeniería Ambiental" <?php if ($candidato['carrera'] == 'Ingeniería Ambiental') echo 'selected'; ?>>Ingeniería Ambiental</option>
                        <option value="Salud y Seguridad en el Trabajo" <?php if ($candidato['carrera'] == 'Salud y Seguridad en el Trabajo') echo 'selected'; ?>>Salud y Seguridad en el Trabajo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="total_votos" class="form-label">Total Votos</label>
                    <input type="number" class="form-control" id="total_votos" value="<?php echo $candidato['total_votos']; ?>" disabled>
                </div>

                <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conexion);
?>
