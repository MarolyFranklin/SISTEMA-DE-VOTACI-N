<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatos - Ingenieria de Software/title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navbar -->
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
 <ul class="navbar-nav ml-auto animate_animated animate_bounceInDown" style="padding-right: 50px;">
   
   <li class="nav-item" >
     <a class="nav-link" href="index.html"  style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Salir</a>
   </li>
 
 </ul>
</div>
</nav>

  <!-- Main Content -->
  <div class="container">
      <h1 class="text-center" style="margin-top: 20px;">Candidatos - Ingenieria de Software</h1>
      <br>
      <br>
      <div class="row">

      <?php
session_start(); // Iniciar la sesión
if (!isset($_SESSION['id'])) {
    die("No hay usuario logueado."); // Verificar si el usuario está logueado
}

// Incluir la conexión a la base de datos
include("dbConnect.php");

// Verificar si el usuario ya ha votado
$userId = $_SESSION['id'];
$sql = "SELECT status FROM userdata WHERE id = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $userStatus);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Consulta SQL para obtener solo los candidatos de "Ingeniería de Software"
$sql = "SELECT * FROM candidatos_prof WHERE carrera = 'Ingenieria de Software'";
$result = mysqli_query($conexion, $sql);

// Mostrar mensaje si el usuario ya votó
if ($userStatus == 1) {
    echo "<p class='text-center'>Ya has votado. Gracias por participar.</p>";
} else {
    // Verificar si hay resultados
    if (mysqli_num_rows($result) > 0) {
        // Mostrar cada candidato en una tarjeta
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-md-3' style='margin-bottom: 30px;'>";
            echo "    <div class='card' style='width: 18rem;'>";
            echo "        <img class='card-img-top' src='img/9.svg' alt='Imagen de Candidato' height='250px'>";
            echo "        <div class='card-body'>";
            echo "            <h5 class='card-title'>" . htmlspecialchars($row['nombre']) . "</h5>";
            echo "            <p class='card-text'>Correo: " . htmlspecialchars($row['correo']) . "</p>";
            echo "            <p class='card-text'>Teléfono: " . htmlspecialchars($row['telefono']) . "</p>";      
            echo "            <a href='confirmation_sof_pr.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-primary'>Votar</a>";
            echo "        </div>";
            echo "    </div>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-center'>No se encontraron candidatos de Ingenieria de Software.</p>";
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!-- Resto de tu HTML aquí -->


<!-- Resto de tu HTML aquí -->
</div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>Sistema de Votacion - Todos los derechos reservados &copy; 2024</p>
    </footer>

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>