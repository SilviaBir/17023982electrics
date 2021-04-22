<?php
  //header- used for titles and errors

  //start session
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  // Script Error Reporting
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<!-- Header for the front end -->
<header class="view text-center d-flex text-dark pb-5">
  <div class="container my-auto">
    <div class="row">
      <!-- display each page's title -->
      <div class="col-lg-10 mx-auto">
        <h2 class="text-uppercase">
          <strong><?php echo $title;?></strong>
        </h2>
        <hr>
      </div>
    </div>
  </div>
</header>
<!-- End header -->
