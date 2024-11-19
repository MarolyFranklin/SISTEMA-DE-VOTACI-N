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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    <h1 class="text-center p-3">Sistema de Votación</h1>
    <div class="container">
        <div class="login-container w-50 m-auto">
            <h2 class="text-center">Regístrar Estudiantes y Maestros</h2>
            <form action="registrer.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Ingresa tu nombre" required="required" name="username" oninput="validateUsername(this)">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="ident" placeholder="Ingresa tu número de ID" required="required" maxlength="10" minlength="10">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" required="required">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="cpassword" placeholder="Confirma tu contraseña" required="required">
                </div>
                <div class="mb-3">
                    <select name="std" class="form-select" required>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Profesor">Profesor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select name="std1" class="form-select" required>
                        <option value="Ingeniería de Software">Ingeniería de Software</option>
                        <option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
                        <option value="Ingeniería de Alimentos">Ingeniería de Alimentos</option>
                        <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                        <option value="Salud y Seguridad en el Trabajo">Salud y Seguridad en el Trabajo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark w-100">Registrar</button>
            </form>
        </div>
    </div>

    <script>
        function validateUsername(input) {
            const regex = /^[A-Za-z]+$/; // Solo letras
            if (!regex.test(input.value)) {
                input.setCustomValidity("Solo se permiten letras.");
            } else {
                input.setCustomValidity(""); // Restablecer el mensaje de error
            }
        }
    </script>

</body>
</html>
