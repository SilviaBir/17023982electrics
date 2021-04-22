<?php
  //Customer's Welcome page

  //start session
  session_start();
  //title
  $title= "Welcome to your account!";
  //Database connection
  require "../includes/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Welcome Page - Assessment 2020</title>
    <?php
      // Get the common head elements
      include "../includes/template/head.php";
    ?>
    <!-- css-->
    <link rel="stylesheet" href="17023982electrics/css/our-products.css">
  </head>

  <body class="welcome-page">
    <?php
      // Get the header
      include "../includes/template/navbar.php";
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
    <!--Confirmation notification if logged in or not -->
    <section>
      <div align="center" id="mainWrapper">
        <div >
          <!-- Session variables -->
          <?php
          if (!isset($_SESSION['signup']) && (!isset($_SESSION['login']))) {
            echo '<p class="login-status text-success" align="center"><strong>You are logged out!</strong></p>';
          }
          else if (isset($_SESSION['signup']) || (isset($_SESSION['login']))) {
            echo '<p class="login-status text-success" align="center"><strong>You are logged in!</strong></p>';
          }
          ?>
        </div>

        <!--Customer's options: check products or the basket-->
        <div id="pageContent"><br />
          <div align="center">
            <h3>What would you like to do today?</h3>
            <div class="container d-flex col-md-8 p-5 text-danger" align="left">
              <p>
                <!-- view your basket-->
                <a href="../cart.php"><strong>View my basket</strong></a>
                <br />
                <!-- explore the products-->
                <a href="../our-products.php"><strong>View products</strong></a>
              </p>
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
