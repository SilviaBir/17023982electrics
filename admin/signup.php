<?php
  //Signup admin page

  //start session
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  //error handling
  error_reporting(E_ALL ^ E_NOTICE);
  //title
  $title = "Please authenticate to access your account!";
  //page
  $admin= "admin-signup";
  //database connect
  require "../includes/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Signup Page - Assessment 2020</title>
    <?php
      // Get the common head elements (links, scripts, meta etc.)
      include "../includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="../17023982electrics/css/our-furniture.css">
  </head>

  <body class="admin-signup">
    <?php
      // Get the navigation
      include "../includes/template/navbar-admin.php";
    ?>
    <!--Title -->
    <div class="container my-auto">
      <div class="row pt-3">
        <div class="col-lg-12 text-center">
          <h4>
            <strong><?php echo $title;?></strong>
          </h4>
          <hr>
        </div>
      </div>
    </div>

    <!--Administrator registration form Section -->
    <section class="signup-form bg-light pb-5">
      <div class="container">
        <div class="row pb-3">
          <!--REGISTER-->
          <div class="col-md-5"  style="display: block; margin: auto;">
            <div class="card-register2 " data-wow-delay="0.3s">
              <?php
                include "inc/register-form.php";
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
