<?php include("header.html"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Cambiar el color del título "Sistema de Votación" */
        h1.text-center {
            color: #006400; /* Verde oscuro */
        }
        /* Cambiar el fondo del contenedor del formulario a blanco */
        .login-container {
            background-color: white; /* Fondo blanco para el área de login */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Sombra para darle mejor apariencia */
        }
    </style>
</head>
<body class="bg-dark">
    <h1 class="text-center">Sistema de Votación</h1>
    <div class="container">
        <div class="login-container w-50 m-auto">
            <h2 class="text-center">Login admin</h2>
            <form action="adminlogin2.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Ingresa tu nombre" required>
                </div>
               
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" required>
                </div>
                <button type="submit" class="btn btn-dark w-100">Ingresar</button>
                </form>
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
</body>
</html>
