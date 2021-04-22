<?php
  //file for admin's navigation area

  // start session so we do not get a notice
  // Answer is from here: https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($page)) {
    $page = "navbar-admin";
  }
?>
<!-- From the bootstrap examples/css -->
<link rel="stylesheet" href="/17023982electrics/css/our-products.css">

<!-- Navigation for the front end -->
<nav class="navbar navbar-expand-lg navbar-light bg-light scrolling-navbar">
  <div class="container">

      <a class="header-index-logo" href="/17023982electrics/logout-admin.php">
        <img src="/17023982electrics/img/sized/logoF.png" alt="logo" style="height: 60px; width: 100px">
      </a>
    <!-- collapsable navbar -->
    <button class="navbar-toggler order-first"
    type="button"
    data-toggle="collapse"
    data-target="#links"
    aria-controls="navbarResponsive"
    aria-expanded="false"
    aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>

    <button class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#account"
      aria-controls="navbarResponsive"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fa fa-user"></i>
    </button>

    <!--Account List -->
    <div class="collapse navbar-collapse" id="account">

      <?php
      if (!isset($_SESSION['loginadmin']) && (!isset($_SESSION['signupadmin']))) {
        echo '
        <form class="form-inline my-2 my-lg-0 ml-auto" action="../admin/inc/login.inc.php" method="post">
          <input class="form-control mr-sm-2" type="text" name="mailuid" placeholder="E-mail/Username">
          <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login-submit">Login</button>
        </form>
        <form class="form-inline my-2 my-lg-0 ml-auto" action="../admin/inc/signup.inc.php" method="post">
          <button class="btn btn-outline-danger my- 2 my-sm-0" type="submit" name="signup">Signup</button>
        </form>
        ';
      }
        else if (isset($_SESSION['loginadmin']) || (isset($_SESSION['signupadmin']))) {
          echo '
          <form class="form-inline my-2 my-lg-0 ml-auto" action="/17023982electrics/logout-admin.php" method="post">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout-submit">Logout</button>
          </form>
          ';
        }
      ?>
    </div>
  </div>
</nav>
<!-- End navigation -->
