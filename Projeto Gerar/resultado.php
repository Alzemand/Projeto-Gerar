<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Projeto Gerar</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="index.php#intro" class="scrollto"><img src="img/pg-logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php#intro">Início</a></li>
          <li><a href="index.php#about">Sobre Nós</a></li>
          <li><a href="index.php#services">Serviços</a></li>
          <li><a href="index.php#portfolio">Portfólio</a></li>
          <li><a href="index.php#team">Time</a></li>
          <li><a href="index.php#contact">Contato</a></li>
          <li><a href="error.php">Área do aluno</a></li>
          <li><a href="certificado.php">Validar Certificado</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!-- Certificado  -->
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <br><br><br><br>
      </div>
      <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <br><br><br><br>
        <form method="POST" action="resultado.php">
          <div class="form-row">
            <div class="col-12 col-md-9 mb-2 mb-md-0">
              <input type="text" class="form-control" id="firstName" name="certificado" placeholder="Número do certificado" value="" required>
            </div>
            <div class="col-12 col-md-3">
              <button type="submit" class="btn btn-primary">Verificar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <br><br><br><br>

<?php

    $servername = "localhost";
    $username = "projeto";
    $password = "toor";
    $database = "projeto";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $numero = $_POST["certificado"];

    $sql = "SELECT * FROM certificado WHERE numero = $numero;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "
            <div id='valido' class='container'>
              <div class='alert alert-success alert-certificado centro'>
                  <h4>Certificado Válido!</h4>
                  <br class='clear'>
                  Atestamos que o certificado número: <b class='res-codigo'>" . $row['numero'] . "</b>
                  é válido, referente ao curso de <b class='res-codigo'>" . $row['treinamento'] . "</b> feito por <b
                  class='res-codigo'>". $row['nome'] . ".
              </div>
            </div>";

            
        }
    } else {
        echo "
        <div id='valido' class='container'>
          <div class='alert alert-danger alert-certificado centro'>
              <h4>Certificado inválido!</h4>
              <br class='clear'>
              O certificado informado não foi encontrado no sistema. Certificados novos podem levar até <b class='res-codigo'>24 horas</b> para serem registrados no nosso validador, 
              qualquer dúvida entre em contato.

              
              </div>
      </div>";
    }
    $conn->close();
?>



<div style="height: 300px;">

</div>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>PROJETO GERAR</h3>
            <p></p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><a href="#">Início</a></li>
              <li><a href="#">Sobre Nós</a></li>
              <li><a href="#">Serviços</a></li>
              <li><a href="#">Termos e condições</a></li>
              <li><a href="#">Política de privacidade</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contato</h4>
            <p>
              <strong>Telefone:</strong> +55 22 99621 4664 <br>
              <strong>E-mail:</strong> comercial@munozconsultoria.com.br<br>
            </p>

            <div class="social-links">
              <!-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> -->
              <a href="https://www.facebook.com/projetogerarmacae/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/projeto_gerar/" class="instagram"><i class="fa fa-instagram"></i></a>
              <!-- <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a> -->
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Feito por <a href="https://alzemand.guithub.io/">Edilson Alzemand</a>
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
        Tecnologia <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
