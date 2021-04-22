<?php
  //The page where all the TV brands will appear

  // This title will appear in the h1 heading
  $title = "Explore our latest TV by Brand";
  // The current page.
  $page = "tv";
  //connect to the MySQL database
  include 'includes/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TV Page - Assessment 2020</title>
    <?php
      // Get the common head elements
      include "includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="/17023982electrics/css/our-products.css">
    <!-- ajax scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src= "ajax.js"></script>
  </head>
  <body class="tv">
    <?php
      // Get the navigation bar
      include "includes/template/navbar.php";
    ?>
    <?php
      // Get the header
      include "includes/template/header-pages.php";
    ?>
    <div class="container my-auto">
      <!-- Breadcrumb helps the user to navigate on other pages of the website -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="index.php" class="text-info"><strong>Home</strong></a></li>
         <li class="breadcrumb-item"><a href="our-products.php"class="text-info"><strong>Our products</strong></a></li>
         <li class="breadcrumb-item active" aria-current="page"><strong>TV</strong></li>
        </ol>
      </nav>
      <!-- End of Breadcrumb -->

      <!-- pressing this button, loads the data from the database by using a AJAX request -->
      <!-- with each press, a new product will be displayed -->
      <button id="LG" name="show-products" style="background-image: url('img/LG-Logo1.jpg'); background-size: cover; border: none; outline:none; width: 180px; height: 70px;"></button>
      <!-- Types of LG products in TV catogory-->
      <br />
      <div class="container">
       <div id="lgtv" class="row pb-2">
          <?php
          //query the database for all the LG products in TV category
          $query = "SELECT * FROM products WHERE productCategory='tv' AND productType='LG' LIMIT 0";
          $result = mysqli_query($conn, $query);
           if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result))
             {
             ?>
             <!-- Bootstrap cards- to display the products -->
             <div class="col-sm-4 d-flex align-items-start pb-6">
                <div class="card w-100 product-card" align="center">
                  <!-- htmlspecialchars- converts special characters to HTML entities- used to prevent cross site scripting- XSS-->
                  <div class="product-image" style=" no-repeat center center/cover; ">
                    <img src="products_images/<?php echo htmlspecialchars($row["productImg"]); ?>" alt="<?php echo $row["alt_tag"]; ?>" class="img-responsive"/><br />
                  </div>
                  <div class="card-body">
                    <h4 class="text-info"><a href="product.php?productId=<?php echo htmlspecialchars($row["productId"]); ?>"><?php echo $row["productName"]; ?></a></h4>
                    <h4 class="text-danger" style="font-size: 14px"><strong><?php echo htmlspecialchars($row["productPrice"]); ?> GBP</strong></h4>
                   <button id="remove" >Remove</button>
                  </div>
                </div>
             </div>
             <?php
             }
           }
          ?>
        </div>
       </div>
      <!-- End LG products list section -->

      <!-- pressing this button, loads the data from the database by using a AJAX request -->
      <!-- with each press, a new product will be displayed -->
      <button id="Samsung" name="show-products" style="background-image: url('img/Samsung-Logo1.jpg'); background-size: cover; outline:none; border: none; width: 180px; height: 70px;"></button>
      <br />
      <!-- Types of Samsung products in TV category-->
      <div class="container">
       <div id="samsungtv" class="row pb-2">
          <?php
          //query the database for all the Samsung products in TV category
          $query = "SELECT * FROM products WHERE productCategory='tv' AND productType='Samsung' LIMIT 0";
          $result = mysqli_query($conn, $query);
           if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result))
             {
             ?>
             <!-- Bootstrap cards- to display all the products -->
             <div class="col-sm-4 d-flex align-items-stretch pb-6">
                <div class="card w-100 product-card" align="center">
                  <!-- htmlspecialchars- converts special characters to HTML entities- used to prevent cross site scripting- XSS-->
                  <div class="product-image" style=" no-repeat center center/cover; ">
                    <img src="products_images/<?php echo htmlspecialchars($row["productImg"]); ?>" class="img-responsive"/><br />
                  </div>
                  <div class="card-body">
                    <h4 class="text-info"><a href="product.php?productId=<?php echo htmlspecialchars($row["productId"]); ?>"><?php echo $row["productName"]; ?></a></h4>
                    <h4 class="text-danger" style="font-size: 14px"><strong><?php echo htmlspecialchars($row["productPrice"]); ?> GBP</strong></h4>
                  </div>
                </div>
             </div>
             <?php
             }
           }
          ?>
        </div>
       </div>
      <!-- End Samsung products list section -->

      <!-- pressing this button, loads the data from the database by using a AJAX request -->
      <!-- with each press, a new product will be displayed -->
      <button id="Sony" name="show-products" style="background-image: url('img/Sony-Logo1.jpg'); background-size: cover;  outline:none; border: none; width: 180px; height: 70px;"></button>
      <!-- Types of Sony products in TV category-->
      <br />
      <div class="container">
        <div id="sonytv" class="row pb-2">
           <?php
           //query the database for all the Sony products in TV catogory
           $query = "SELECT * FROM products WHERE productCategory='tv' AND productType='Sony' LIMIT 0";
           $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result))
              {
              ?>
              <!-- Bootstrap cards- to display all the products -->
              <div class="col-sm-4 d-flex align-items-stretch pb-6">
                 <div class="card w-100 product-card" align="center">
                   <!-- htmlspecialchars- converts special characters to HTML entities- used to prevent cross site scripting- XSS-->
                   <div class="product-image" style=" no-repeat center center/cover; ">
                     <img src="products_images/<?php echo htmlspecialchars($row["productImg"]); ?>" class="img-responsive"/><br />
                   </div>
                   <div class="card-body">
                     <h4 class="text-info"><a href="product.php?productId=<?php echo htmlspecialchars($row["productId"]); ?>"><?php echo $row["productName"]; ?></a></h4>
                     <h4 class="text-danger" style="font-size: 14px"><strong><?php echo htmlspecialchars($row["productPrice"]); ?> GBP</strong></h4>
                   </div>
                 </div>
              </div>
              <?php
              }
            }
           ?>
         </div>
        </div>
        <!-- End Sony products list section -->
        <!-- Refresh the page <button type="cancel" onclick="javascript:window.location='tv.php';">Cancel</button> -->

        <div class="container ">
          <!-- The "Go to top" button is helping the user to go straight on top of the page-->
          <button onclick="topFunction()" id="myBtn" title="Go to top"><strong>^</strong></button>
        </div>
          <script>
            //https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
            //Get the button
            var mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
              } else {
                mybutton.style.display = "none";
              }
            }

            // When the user clicks on the button, scroll to the top of the page
            function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
            }
          </script>
    </div>
    <?php
      // Get the footer
      include "includes/template/footer.php";
    ?>
  </body>
</html>
