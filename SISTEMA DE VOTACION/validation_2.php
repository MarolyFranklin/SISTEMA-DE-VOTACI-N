<?php

// Conectar a la base de datos usando MySQLi
$host = "localhost";
$port = 3310;
$user = "root";
$password = "";
$dbname = "voting";

$conexion = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Consultar candidatos de Ingeniería de Software de la tabla `candidatos_est`
$sql_est = "SELECT nombre, total_votos FROM candidatos_est WHERE carrera = 'Ingeniería Electrica'";
$result_est = mysqli_query($conexion, $sql_est);

// Consultar otros candidatos de la tabla `candidatos_prof`
$sql_prof = "SELECT nombre, total_votos FROM candidatos_prof WHERE carrera = 'Ingeniería Electrica'";
$result_prof = mysqli_query($conexion, $sql_prof);

include ("header.html")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Candidatos - Ingenieria Electrica</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .card-5 {
            border: 2px black solid;
            padding: 30px;
            margin-top: 5%;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        #footersection {
            margin-top: 18%;
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Resultados de Ingeniería de Software -->
            <div class="card-5">
                <h2><strong>Resultados de Estudiantes de Ingeniería Electrica</strong></h2>
                <hr>
                <?php while ($row = mysqli_fetch_assoc($result_est)) { ?>
                    <strong><?php echo $row['nombre']; ?> = <?php echo $row['total_votos']; ?></strong><br>
                    <div class='progress'>
                        <div class='progress-bar progress-bar-striped bg-success progress-bar-animated' role='progressbar' 
                             aria-valuenow="<?php echo $row['total_votos']; ?>" aria-valuemin="0" aria-valuemax="1000" 
                             style='width: <?php echo $row['total_votos']; ?>%'>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Resultados de Otros Candidatos -->
            <div class="card-5">
                <h2><strong>Resultados de Docentes de Ingenieria Electrica</strong></h2>
                <hr>
                <?php while ($row = mysqli_fetch_assoc($result_prof)) { ?>
                    <strong><?php echo $row['nombre']; ?> = <?php echo $row['total_votos']; ?></strong><br>
                    <div class='progress'>
                        <div class='progress-bar progress-bar-striped bg-info progress-bar-animated' role='progressbar' 
                             aria-valuenow="<?php echo $row['total_votos']; ?>" aria-valuemin="0" aria-valuemax="1000" 
                             style='width: <?php echo $row['total_votos']; ?>%'>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <br>
            <br>

        </div>
    </div>
</div>

<section>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <hr>
      <div class="Footer">
        <ul style="display: flex;">
        
        </ul>
      </div>
    </div>
    <div class="col-md-6">
      <hr>
      <div class="social-icon">
        <ul >
                        <li>
                            <a href="https://www.facebook.com/YoSoyFet?locale=es_LA">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.fet.edu.co/">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/fetneiva?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                              <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                          <a href="adminlogin.php">
                            <i class="fa fa-users"></i>
                          </a>
                      </li>
                    </ul>
      </div>
    </div>
  </div>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
// Cerrar la conexión
mysqli_close($conexion);
?>
