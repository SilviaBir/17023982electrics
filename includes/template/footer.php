<?php
  // These elements should appear on the bottom of all of the front end pages
?>
<!-- Bootstrap/css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<footer>
  <div class="footerlinks" style="
    text-align: center;
    margin-bottom:10px;
    padding-top: 10px;
    ">
     <div class="footer-pic"
        style="
        text-align: center;
        margin-bottom:20px;
        padding-top: 10px;
        border-top: 1px solid #e3e7e9;
        margin-top: 10px;
        ">
        <a href="">
          <img src="/17023982electrics/img/sized/LogoF.png"
          class="img-footer"
          style="height:60px; width: 100px;"/>
        </a>
      </div>
      <!-- footer inspired from https://www.worldometers.info/ -->
      <div class="footerlinks-menu" style="
        text-align: center;
        margin-bottom:10px;
        color: red;
        ">
        <a href="/about/">about</a> |
        <a href="/faq/">faq</a> |
        <a href="/contact/">contact</a>
      </div>
    </div>
    <div>
      <ul class="list-inline text-center socialbuttons" >
        <li>
          <a href="/newsletter-subscribe/"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Newsletter">
            <i class="fa fa-bullhorn fa-round" style="color: orange;"></i>
          </a>
        </li>
        <li>
          <a href="https://twitter.com/"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Twitter">
            <i class="fa fa-twitter fa-round" style="color: #40d1f5;"></i>
          </a>
        </li>
        <li>
          <a href="https://www.facebook.com/" data-toggle="tooltip" data-placement="bottom" title="Facebook">
            <i class="fa fa-facebook fa-round" style="color: blue;"></i>
          </a>
        </li>
      </ul>
    </div>

    <!--Press and hold ALT key and type 0169 for copyright symbol -->
    <div class="copy">
        © Copyright FurnitureFirst.com - All rights reserved -
      <a href="/disclaimer/">Disclaimer & Privacy Policy</a> |
      <!-- Logout to access Admin area for login/signup-->
      <?php
      if (!isset($_SESSION['signup']) && (!isset($_SESSION['login']))) {
        echo '
          <a href="/17023982electrics/admin/administration.php"><strong>Admin</strong></a>
        ';
        }
        else if (isset($_SESSION['signup']) || (isset($_SESSION['login']))) {
          echo '
          <a class="nav-link" href="/17023982electrics/logout-cust.php">Logout</a>
          ';
        }
      ?>

    </div>
</footer>
