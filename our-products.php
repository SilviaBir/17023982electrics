<?php
  // Products page
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  //print_r($_SESSION);
  // This title will appear in the h1 heading
  $title = "Check out our Products";
  // The current page.
  $page = "our-products";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TV and Refrigerators Page - Assessment 2020</title>
    <?php
      // Get the common head elements
      include "includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="/17023982electrics/css/our-products.css">
  </head>

  <body class="our-products">
    <?php
      // Get the navigation bar
      include "includes/template/navbar.php";
    ?>
    <?php
      // Get the header
      include "includes/template/header-pages.php";
    ?>
    <div class="container my-auto">
      <!-- Breadcrumb will help the user go back or on other pages of the website to ease the navigation -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php" class="text-info"><strong>Home</strong></a></li>
          <li class="breadcrumb-item active" aria-current="page"><strong>Our products</strong></li>
        </ol>
      </nav>
      <!-- End of Breadcrumb -->
      <!-- Cards with TV & Refrigerators Links-->
      <div class="card-deck mx-2">
        <div class="card">
          <a class="card1" href="tv.php">
            <img class="card-img" src="/17023982electrics/img/sized/TVProducts2.png" alt="Card image">
          </a>
        </div>
        <div class="card">
          <a class="card2" href="refrigerators.php">
           <img class="card-img" src="/17023982electrics/img/sized/RefProducts2.png" alt="Card image">
        </div>
      </div>
      <!-- End of Cards with TV & Refrigerators Area-->
    </div>
    <?php
      // Get the footer
      include "includes/template/footer.php";
    ?>
  </body>
</html>
