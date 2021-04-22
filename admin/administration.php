<?php
//Administration page

//start session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//title
$title= "Welcome to administration page!";
//Database connection
require "../includes/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administrator Welcome Page - Assessment 2020</title>
    <?php
      // Get the common head elements
      include "../includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="/17023982electrics/css/our-furniture.css">
  </head>

  <body class="welcome-page">

    <?php
      // Get the header
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

    <section>
      <div align="center" id="mainWrapper">
        <div >
          <!--
          We can choose whether or not to show ANY content on our pages depending on
          if we are logged in or not- SESSION variables
          -->
          <?php
          if (!isset($_SESSION['loginadmin']) && (!isset($_SESSION['signupadmin']))) {
            echo '<p class="login-status text-success" align="center"><strong>You are logged out!</strong></p>';
          }
          else if (isset($_SESSION['loginadmin']) || (isset($_SESSION['signupadmin']))) {
            echo '<p class="login-status text-success" align="center"><strong>You are logged in!</strong></p>
             <div id="pageContent"><br />
               <div align="center">
                 <h3>What would you like to do today?</h3>
                 <div class="container d-flex col-md-8 p-5 text-danger" align="left">
                   <p>
                     <a href="inventory_list.php"><strong>Manage Inventory</strong></a>
                     <br />
                     <a href="orders_list.php"><strong>Manage Orders</strong></a>
                   </p>
                 </div>
               </div>
             </div>
            ';
          }
          ?>
        </div>
        <!--Error of user input handling - in URL-->
        <div class="loginerror text-danger" align="center">
          <?php
          // Here we create an error message if the user made an error trying to login
          // Login credentials: name/email and password
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="loginerror"><strong>Fill in all fields!</strong></p>';
            }
              else if ($_GET["error"] == "invaliduidmail") {
                echo '<p class="loginerror"><strong>Invalid username or e-mail!</strong></p>';
              }
                else if ($_GET["error"] == "wronguidpwd") {
                  echo '<p class="loginerror"><strong>Try again!</strong></p>';
                }
                  else if ($_GET["error"] == "wrongpwd") {
                    echo '<p class="loginerror"><strong>Please, insert the correct credentials!</strong></p>';
                  }
          }
          // Here we create a success message if the new user was created.
            else if (isset($_GET["signupadmin"])) {
              if ($_GET["signupadmin"] == "success") {
                echo '<p class="loginsuccess text-success"><strong>Login successful!</strong></p>';
              }
            }
          ?>
        </div>
      </div>
    </section>

    <?php
      // Get the footer
      include "../includes/template/footer.php";
    ?>

  </body>
</html>
