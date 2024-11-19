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

// Consultar los datos de la persona a editar
$query = "SELECT * FROM userdata WHERE id = $id";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Error al obtener los datos: " . mysqli_error($conexion));
}

// Si se envió el formulario, actualizar los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $ident = $_POST['ident'];
    $standard = $_POST['standard'];
    $status = $_POST['status'];

    $update_query = "UPDATE userdata SET username = '$username', ident = '$ident', standard = '$standard', status = '$status' WHERE id = $id";

    if (mysqli_query($conexion, $update_query)) {
        echo "<div class='success-message'>Datos actualizados correctamente.</div>";
        header("Location: listado_votante.php"); // Redirigir al listado después de actualizar
        exit();
    } else {
        echo "<div class='error-message'>Error al actualizar los datos: " . mysqli_error($conexion) . "</div>";
    }
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

     <li class="nav-item">
       <a class="nav-link" href="result.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Resultados</a>
     </li>
   
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f4f6f9;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .error-message {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<br>
<br>
    <h2>Editar Votante</h2>

    <form method="POST">
        <label for="username">Nombre:</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required>

        <label for="ident">Identificación:</label>
        <input type="text" name="ident" value="<?php echo $row['ident']; ?>" required>

        <label for="standard">Rol:</label>
        <select name="standard" required>
            <option value="Estudiante" <?php echo ($row['standard'] == 'Estudiante') ? 'selected' : ''; ?>>Estudiante</option>
            <option value="Profesor" <?php echo ($row['standard'] == 'Profesor') ? 'selected' : ''; ?>>Profesor</option>
        </select>

        <label for="status">Estado:</label>
        <select name="status" required>
            <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Votó</option>
            <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>No Votó</option>
        </select>

        <input type="submit" value="Actualizar">
    </form>

</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conexion);
?>
