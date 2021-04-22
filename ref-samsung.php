<?php
  //database connection
  include 'includes/dbconnect.php';

  //check how many producst of this kind are in the database
  $productSamsungCount = $_POST['productSamsungCount'];
  //query the database for all the LG products in TV catogory
  $query = "SELECT * FROM products WHERE productCategory='refrigerators' AND productType='Samsung' LIMIT $productSamsungCount";
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
  } else{
    echo "There are no products!";
  }
?>
