<?php
  // Landing page - contains a css animation and links to products pages

  // start session
  // So we do not get a notice
  // Answer is from here: https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  // The current page
  if (!isset($page)) {
    $page = "index";
  }
  //description
  $description="Find the latest TVs and Refrigerators of the best brands in the world";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Landing Page - Assessment 2020</title>
    <!--css -->
    <link rel="stylesheet" href="/17023982electrics/css/home.css">
  </head>
  <body>
    <div>
        <!--Here is the animated banner from the start of the website, with links to main pages-->
        <div class="banner">
          <div class="banner-text">
            <div>
                <h1><a href="our-products.php" style="text-transform: uppercase;color: #fff; text-decoration: none;">Check out our latest Electronics</a></h1>
            </div>
            <div align="center">
                <h3 style="width:300px; font-size: 20px; background-color: rgba(0,0,0,0.5); padding: 10px; color: #eded64 ;text-decoration: none;"><?php echo $description;?></h1>
            </div>
            <div>
              <h3><a href="tv.php" style="font-size: 30px; background-color: rgba(0,0,0,0.5); padding: 10px; color: #fff; text-decoration: none;">TVs</a></h3>
              <h3><a href="refrigerators.php" style="font-size: 30px; background-color: rgba(0,0,0,0.5); padding: 10px; color: #fff; text-decoration: none;">Refrigerators</a></h3>
              <div class="old">
                   <hr />
                   <br />
                   <br />
                <a class="header-index-logo" href="our-products.php">
                  <img src="/17023982electrics/img/sized/logoF.png" alt="logo" style="height: 60px; width: 100px; background-color: white !important; ">
                </a>
              </div>
            </div>
          </div>
        </div>
        <!--End of the animated banner-->
      </div>
  </body>
</html>
