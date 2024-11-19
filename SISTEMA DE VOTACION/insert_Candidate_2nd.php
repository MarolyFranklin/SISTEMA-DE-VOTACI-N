<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
      .td-1{
          text-align: center;
          padding-top: 20px;
        
      }
      table{
        margin:auto;
      }
     
    </style>
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
    


        <section id="center">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 style="padding-top: 20px;">Inscripción de Candidatos</h1>
                <p style="padding-top: 20px;">Docentes</p>
                <form action="process_cand_2.php" method="post">
                    <table>
                        <tr>
                            <td class="td-1">Nombre :</td>
                            <td class="td-1"><input required type="text" style="text-align: left;" name="txtName" autofocus></td>
                        </tr>
                        <tr>
                            <td class="td-1">Correo Electrónico :</td>
                            <td class="td-1"><input required type="email" style="text-align: left;" name="txtEmail"></td>
                        </tr>
                        <tr>
                        <td class="td-1">Descripcion :</td>
                            <td class="td-1"><input required type="descripcion" style="text-align: left;" name="txtDescripcion" autofocus></td>
                        </tr>
                        <tr>
                            <td class="td-1">Carrera :</td>
                            <td>
                                <select name="txtbranch" required>
                                    <option value="">Selecciona una carrera</option>
                                    <option>Ingeniería de Software</option>
                                    <option>Ingeniería Eléctrica</option>
                                    <option>Ingeniería de Alimentos</option>
                                    <option>Ingeniería Ambiental</option>
                                    <option>Salud y Seguridad en el Trabajo</option>
                                </select>
                            </td>
                        </tr>
                       
                        <tr>
                            <td class="td-2" style="padding-top: 20px; padding-bottom: 40px;">
                                <button class="magnifyBtn" name="Submit">Enviar</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-md-6" style="padding-top: 50px;">
                <img src="img/8.svg" alt="Ilustración de inscripción" />
            </div>
        </div>
    </div>
</section>

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
                        
                    </ul>
      </div>
    </div>
  </div>
</div>
</section>

  
   
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>  
    <!-- <script src="js/aos.js"></script>
    <script>
     AOS.init();
    </script> -->
</body>
</html>