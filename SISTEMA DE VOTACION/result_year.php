<?php
include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
.btn-special-2 {
    padding: 12px 24px;
    background-color: white;
    color: hsl(243, 80%, 62%);
    border-radius: 6px;
    border: 2px hsl(243, 80%, 62%) solid;
    transition: transform 250ms ease-in-out;
}

.btn-special-2:hover {
    transform: scale(1.10);
}

.btn-special-2:active {
    transform: scale(.9);
}
#footersection{
    margin-top:80px;
}
.h2_3{
    margin-top:30px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2_3"> Selecciona la Carrera</h2>
            <a href="validation.php"><button style="margin-top:30px;" class="btn-special-2">Ingenieria de Software</button></a>
            </div>
            <div class="col-md-12">
            <a href="validation_2.php"><button style="margin-top:30px;" class="btn-special-2">Ingenieria Electrica</button></a>
            </div>
            <div class="col-md-12">
            <a href="validation_3.php"><button style="margin-top:30px; " class="btn-special-2">Ingenieria de Alimentos</button></a>
            </div>
            <div class="col-md-12">
            <a href="validation_4.php"><button style="margin-top:30px; " class="btn-special-2">Ingenieria Ambiental</button></a>
            </div>
            <div class="col-md-12">
            <a href="validation_5.php"><button style="margin-top:30px; " class="btn-special-2">Salud y Seguridad en el Trabajo</button></a>
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
    
</body>

</html>
