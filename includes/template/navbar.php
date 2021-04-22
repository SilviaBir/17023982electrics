<?php
  //file for website navigation area

  //start session
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($page)) {
    $page = "our-products";
  }
?>

<!-- Bootstrap/css/fontawesome-->
<link rel="stylesheet" href="/17023982electrics/css/our-products.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

<!-- Navigation for the front end-->
<nav class="navbar navbar-expand-lg navbar-light bg-light scrolling-navbar">
  <div class="container">
    <a class="header-logo" href="/17023982electrics/index.php">
      <img src="/17023982electrics/img/sized/logoF.png" alt="logo" style="height: 60px; width: 100px;">
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
    <!--Links List -->
    <div class="collapse navbar-collapse" id="links">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if ($page == "home") echo 'active';?> ">
          <a class="nav-link" href="/17023982electrics/index.php"><strong>Home</strong></a>
        </li>
        <li class="nav-item <?php if ($page == "our-products") echo 'active';?> ">
          <a class="nav-link" href="/17023982electrics/our-products.php"><strong>Our Products</strong></a>
        </li>
        <!-- Dropdown list-->
        <div class="dropdown">
          <button class="btn"
          type="button"
          id="dropdownMenu1"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="true">
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li <?php if ($page == "tv") echo 'active';?>>
              <a href="/17023982electrics/tv.php"><strong>TV</strong></a>
            </li>
            <li <?php if ($page == "refrigerators") echo 'active';?>>
              <a href="/17023982electrics/refrigerators.php"><strong>Refrigerators</strong></a>
            </li>
          </ul>
        </div>
        <!-- Dropdown list-->
      </ul>
    </div>
    <!--End Links List -->
    <!--Account List -->
    <div class="collapse navbar-collapse" id="account">
      <ul class="navbar-nav ml-auto">
        <!-- Buttons according with the session the user is in -->
        <?php
        if (!isset($_SESSION['signup']) && (!isset($_SESSION['login']))) {
          echo '
            <a class="nav-link" href="/17023982electrics/customer/login.php">Login</a>
            <a class="nav-link" href="/17023982electrics/customer/signup.php">Sign up</a>
            <a class="nav-link d-none d-lg-inline-block">|</a>

          ';
          }
          else if (isset($_SESSION['signup']) || (isset($_SESSION['login']))) {
            echo '
            <a class="nav-link" href="/17023982electrics/logout-cust.php">Logout</a>
            <a class="nav-link d-none d-lg-inline-block">|</a>

            <a class="nav-link text-success" href="/17023982electrics/customer/welcome-page.php">My Page</a>
            ';
          }
        ?>
        <!-- fontawsome shopping cart button that shows the number of items of the same type which are placed in the cart-->
            <a href="/17023982electrics/cart.php">
                <button class="btn btn-light"  type="button" id="ref" style="background-color: none;">
                    <span><i class="fas fa-shopping-cart"></i></span>
                    <span class="badge badge-danger"><?php if(isset($_SESSION["electricsawt"])) { echo count($_SESSION["electricsawt"]); } else { echo '0';}?></span>
                </button>
            </a>
      </ul>
    </div>
  </div>
</nav>
<!-- End navigation -->
