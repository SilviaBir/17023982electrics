<?php
  //Signup customer

  //start session
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  //title
  $title = "Customer registration- please authenticate";
  //page
  $page = "signup";
  //database connection
  require "../includes/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Signup Page - Assessment 2020</title>
    <?php
      // Get the common head elements (links, scripts, meta etc.)
      include "../includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="../css/our-products.css">
    <!-- React libraries -->
    <script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src= "https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

  </head>

  <body class="signup">
    <?php
      // Get the navigation
      include "../includes/template/navbar.php";
    ?>
    <!--Title -->
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4>
            <strong><?php echo $title;?></strong>
          </h4>
          <hr>
        </div>
      </div>
    </div>

    <!--Customer registration form Section -->
    <section class="signup-form bg-light pb-5">
      <div class="container">
        <div class="row pb-5">
          <!--REGISTER-->
          <div class="col-md-5" style="display: block; margin: auto;">
            <div class="card-register2 wow fadeInRight" data-wow-delay="0.3s">
                <?php
                  //react form for registration
                  require "inc/signup-form.php"
                 ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      // Get the footer
      include "../includes/template/footer.php";
    ?>
  </body>
</html>
