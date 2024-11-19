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
    <title>Listado de Candidatos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f4f6f9;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 85%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            padding: 8px 15px;
            margin: 5px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #f39c12;
            color: white;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            .btn {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <h2>Listado de Candidatos</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Descripción</th>
                <th>Carrera</th>
                <th>Total Votos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mostrar los registros de la base de datos
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['correo'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['carrera'] . "</td>";
                echo "<td>" . $row['total_votos'] . "</td>";
                echo "<td>
                        <button class='btn edit-btn' onclick='editCandidate(" . $row['id'] . ")'>Editar</button>
                        <button class='btn delete-btn' onclick='deleteCandidate(" . $row['id'] . ")'>Eliminar</button>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function editCandidate(id) {
            // Redirigir a la página de edición
            window.location.href = `editar_candidato2.php?id=${id}`;
        }

        function deleteCandidate(id) {
            // Confirmación antes de eliminar
            if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
                window.location.href = `eliminar_candidato2.php?id=${id}`;
            }
        }
    </script>

</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conexion);
?>
