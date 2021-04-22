<?php
  //Single product page

  // This title will appear in the h1 heading
  $title = "Explore our latest products";
  // The current page.
  $page = "single-product";
  //database connection
  require 'includes/dbconnect.php';
  //query the database for the product chosen by the customer
  $result;
  // check the GET request if param
  if(isset($_GET['productId'])) {
    // using the mysqli_real_escape_string to protect our database
    $id = mysqli_real_escape_string($conn, $_GET['productId']);
    // make sql
    $sql = "SELECT* FROM products WHERE productId = $id";
    // get the query result
    $result = mysqli_query($conn, $sql);
    // fetch result in array format
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    //print_r($row);
  }
 ?>
 <!DOCTYPE html>
 <html lang="" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Product Page | Assessment 2020</title>
     <?php
       // Get the common head elements
       include "includes/template/head.php";
     ?>
     <!-- css -->
     <link rel="stylesheet" href="/17023982electrics/css/our-products.css">
   </head>
   <body>
     <?php
       // Get the navigation bar
       include "includes/template/navbar.php";
     ?>
     <?php
       // Get the header
       include "includes/template/header-pages.php";
     ?>
     <div class="container my-auto">
       <!-- Breadcrumb helps the user go back or on other pages of the website to ease the navigation -->
       <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php" class="text-info"><strong>Home</strong></a></li>
          <li class="breadcrumb-item"><a href="our-products.php"class="text-info"><strong>Our products</strong></a></li>
          <li class="breadcrumb-item"><a href="tv.php"class="text-info"><strong>TV</strong></a></li>
          <li class="breadcrumb-item"><a href="refrigerators.php"class="text-info"><strong>REFRIGERATORS</strong></a></li>
         </ol>
       </nav>
       <!-- End of Breadcrumb-->
       <!-- Single product section -->
       <section class="single-product">
         <div class="container" id="products">
           <div class="row pb-2">
             <div class="col-md-5">
               <!-- button that sends the user to the previous page -->
                <input type="button" value="< Go Back" style="border: none;" class="btn btn-warning" onclick="history.back(-1)" />
             </div>
             <!-- Name of the product-->
             <div class="col-md-12">
               <h2 class="text-center p-3"><strong><?php echo htmlspecialchars($row['productName']); ?></strong></h2>
             </div>
             <!-- Price/Add Button/Product Image -->
             <div class="col-md-5" style="display: block; margin: auto;">
                 <div>
                   <!-- Price-->
                   <p class="text-left">
                     <strong><?php echo htmlspecialchars($row['productPrice']);?> GBP</strong>
                   </p>
                   <!-- Add to cart Button-->
                   <div align="right">
                     <a href="cart.php">
                       <input type="button" name="add_to_cart" id="<?php echo htmlspecialchars($row["productId"]); ?>" style="margin-top:5px; border:none;" class="btn btn-success add_to_cart" value="Add to cart" />
                     </a>
                   </div>
                 </div>
                 <!-- Image of the product-->
                 <div class="product-image" style=" no-repeat center center/cover; ">
                   <img src="products_images/<?php echo htmlspecialchars($row["productImg"]); ?>" class="img-responsive"/><br />
                 </div>
                 <!-- Current database data transfered to the cart-->
                 <input type="hidden" name="hidden_name" id="name<?php echo htmlspecialchars($row["productId"]); ?>" value="<?php echo htmlspecialchars($row["productName"]); ?>" />
                 <input type="hidden" name="hidden_price" id="image<?php echo htmlspecialchars($row["productId"]); ?>" value="<?php echo htmlspecialchars($row["productImg"]); ?>" />
                 <input type="hidden" name="hidden_price" id="price<?php echo htmlspecialchars($row["productId"]); ?>" value="<?php echo htmlspecialchars($row["productPrice"]); ?>" />
             </div>
           </div>
         </div>
       </section>
       <!-- End single product section -->
     </div>
   </body>
 </html>
 <!-- Ajax script used to load data without refreshing the page | informs the user accordingly-->
 <script>
 $(document).ready(function(data){
      $('.add_to_cart').click(function(){
           var product_id = $(this).attr("id");
           var product_name = $('#name'+product_id).val();
           var product_image = $('#image'+product_id).val();
           var product_price = $('#price'+product_id).val();
           var action = "add";
           if(product_id > 0)
           {
                $.ajax({
                     url:"action.php",
                     method:"POST",
                     dataType:"json",
                     data:{
                          product_id:product_id,
                          product_name:product_name,
                          product_image:product_image,
                          product_price:product_price,
                          action:action
                     },
                     success:function(data)
                     {
                          $('#order_table').html(data.order_table);
                          $('.badge').text(data.cart_item);
                          alert("Product has been Added into Cart");
                     }
                });
           }
           else
           {
                alert("Add this item to your cart")
           }
      });
 });
 </script>
