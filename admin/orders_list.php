<?php
  //Administration: view all orders

  //start session
  session_start();
  // title
  $title = "Manage Orders";
  // The current page.
  $page = "orders";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Orders-Admin - Assessment 2020</title>

    <?php
      // Get the common head elements
      include "../includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="../17023982electrics/css/our-furniture.css">
  </head>

  <body class="orders">
    <?php
      // Get the header
      include "../includes/template/navbar-admin.php";
    ?>
    <!--Title -->
    <div class="container my-auto">
      <div class="row pt-3">
        <div class="col-lg-12 text-center">
          <h4>
            <strong><?php echo $title;?></strong>
          </h4>
          <hr>
        </div>
      </div>
    </div>

    <!--Fast navigation to other pages-->
    <div class="container d-flex col-md-10">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="../admin/administration.php" class="text-success"><strong>Administration</strong></a></li>
         <li class="breadcrumb-item active" aria-current="page"><strong>Orders</strong></li>
        </ol>
      </nav>
    </div>
    <!--Orders table -->
    <div class="container">
      <div class="table-responsive">
        <br />
        <h5 class="center" align="center">The list of all orders</h5>
        <br />
        <table class="table">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Customer Name</th>
              <th>Customer Phone</th>
              <th>Customer Email</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
     </div>
    </div>
    <?php
      // Get the footer
      include "../includes/template/footer.php";
    ?>
  </body>
</html>
  <script type="text/javascript">
  $(document).ready(function(){

  	fetch_data();

  	function fetch_data()
  	{
  		$.ajax({
  			url:"work-orders/fetch-orders.php",
  			success:function(data)
  			{
  				$('tbody').html(data);
  			}
  		})
  	}
  });
  </script>
