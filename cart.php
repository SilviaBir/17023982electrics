<?php
  //Cart Page

  // Connect to the mysqli database
  require 'includes/dbconnect.php';

  // This title will appear in the h1 heading
  $title = "View your cart";
  // The current page.
  $page = "cart";
?>

<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>First Electrics Customer Cart - Assessement 2020</title>
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

  <div id="cart" class="container">
    <div>
      <!-- back to the previous page button -->
       <input type="button" value="< Go Back" style="border: none;" class="btn btn-info" onclick="history.back(-1)" />
    </div>
    <br>
    <!-- Table of products -->
    <div class="table-responsive" id="order_table">
      <table class="table table-bordered">
        <tr>
          <th width="25%">Product Name</th>
          <th width="40%">Image</th>
          <th width="20%">Price</th>
          <th width="15%">Action</th>
        </tr>
        <?php
        if(!empty($_SESSION["electricsawt"])) {
          $total = 0;
          foreach($_SESSION["electricsawt"] as $keys => $values)
        {
        ?>
        <tr>
          <td><?php echo htmlspecialchars($values["product_name"]); ?></td>
          <td align="center">
            <div class="p-image" style=" width: 160px; height: 160px; padding: 0px;" align="center">
              <img src="products_images/<?php echo htmlspecialchars($values["product_image"]); ?>" alt="<?php echo $row["alt_tag"]; ?>" class="img-responsive"/>
            </div>
          </td>
          <td align="right">£ <?php echo htmlspecialchars($values["product_price"]); ?></td>
          <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo htmlspecialchars($values["product_id"]); ?>">Remove</button></td>
        </tr>
        <?php
        }
        ?>
        <tr>
          <td colspan="5" align="center">
            <form method="post" action="order-table.php">
              <!-- Placing the order only if logged in-->

                 <?php
                 if (!isset($_SESSION['signup']) && !isset($_SESSION['login'])) {
                   echo '
                     <a class="btn btn-warning" href="/17023982electrics/customer/login.php">Log in to place an order</a>
                   ';
                   }
                   else if (isset($_SESSION['signup']) || isset($_SESSION['login'])) {
                     echo '
                     <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />
                     ';
                   }
                 ?>

            </form>
          </td>
        </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>
  <!-- Ajax script for deleting items in the cart and to place an order-->
  <script>
  $(document).ready(function(data){

       $(document).on('click', '.delete', function(){
            var product_id = $(this).attr("id");
            var action = "remove";
            if(confirm("Are you sure you want to remove this product?"))
            {
                 $.ajax({
                      url:"action.php",
                      method:"POST",
                      dataType:"json",
                      data:{product_id:product_id, action:action},
                      success:function(data){
                           $('#order_table').html(data.order_table);
                           $('.badge').text(data.cart_item);
                      }
                 });
            }
            else
            {
                 return false;
            }
       });
  });
  </script>
  <?php
    // Get the footer
    include "includes/template/footer.php";
  ?>
</body>

</html>
