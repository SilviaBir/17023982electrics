<?php
  //Login

  //start session
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  //title
  $title = "Please authenticate to view your account";

  //page
  $page = "login";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <?php
      // Get the common head elements
      include "../includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="../17029832electrics/css/our-products.css">

  </head>
  <body class="login">
    <?php
      // Get the header
      include "../includes/template/navbar.php";
    ?>
    <!-- title -->
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

    <!--Login Customer form-->
    <section class="customer-login-form bg-light pt-5">
      <div class="container">
        <div class="row pb-5">
          <div class="col-md-5" style="display: block; margin: auto;">
            <div class="card-register1 wow fadeInRight" data-wow-delay="0.3s">
              <div class="card-body">
                <!--Header-->
                <div class="text-center">
                  <h3 class="white-text">Login:</h3>
                  <hr class="hr-light">
                </div>
                <!--Form for registering-->
                <form class="md-form" action="login.cust.php" method="post">
                  <div class="md-form">
                    <?php
                    // We check username.
                    if (!empty($_GET["phone"])) {
                      echo '<input type="text" id="phone" class="white-text form-control" name="phone" value="'.$_GET["phone"].'">';
                    }
                    else {
                      echo '<input type="text" id="phone" class="white-text form-control" name="phone">';
                    }
                    ?>
                    <label for="phone" class="active">Your phone number</label>
                    <br/>
                    </br/>
                    </div>
                    <div class="md-form">
                      <input type="password" id="pass1" class="white-text form-control" name="pwd">
                      <label for="pass1">Your password</label>
                    </div>
                    <div class="text-center mt-2">
                      <button type="login-submit" class="btn btn-success mb-3" name="login-submit">Login</button>
                    </div>
                  </form>
                  <hr class="hr-light mb-3 mt-4">
              </div>
            </div>
          </div>
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
