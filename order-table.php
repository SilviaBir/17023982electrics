<?php
 //This php file is used to insert data into database and to check the functionality by extracting the data in a table
 //Final pages do not reveal this table (echo '<script>window.location.href="order-table.php"</script>';)

 session_start();
 //print_r($_SESSION);
 // Database connection
 require 'includes/dbconnect.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Order Table</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>

 <body>
   <div class="container" style="width:800px;">
     <?php
     // Inserting data into "orders" and "order_details" MySQL tables
     //and retreiving data from two joined MySQL tables: "customers" and "order_details"
     if(isset($_POST["place_order"])) {
       // using the correct customer ID according with the corresponding session variables : login or signup
       if (isset($_SESSION['login'])) {
         foreach($_SESSION["electricsawt"] as $keys => $values) {
           $insert_order = "
           INSERT INTO orders(customer_id)
           VALUES('".$_SESSION["login"]."');
           ";
          }
        }
         else if (isset($_SESSION['signup'])) {
           foreach($_SESSION["electricsawt"] as $keys => $values) {
             $insert_order = "
             INSERT INTO orders(customer_id)
             VALUES('".$_SESSION["signup"]."');
             ";
           }
         }
      //using the correct order number according with the corresponding session variable.
       $order_id = "";
       if(mysqli_query($conn, $insert_order)) {
            $order_id = mysqli_insert_id($conn);
            $customer_id = mysqli_insert_id($conn);
       }
       $_SESSION["order_id"] = $order_id;
       $order_details = "";
       foreach($_SESSION["electricsawt"] as $keys => $values) {
         $order_details .= "
         INSERT INTO order_details(order_id, product_name, product_price)
         VALUES('".$order_id."', '".$values["product_name"]."', '".$values["product_price"]."');
         ";
       }
       if(mysqli_multi_query($conn, $order_details)) {
         unset($_SESSION["electricsawt"]);
         echo '<script>alert("You have successfully placed an order...Thank you")</script>';
         //echo '<script>window.location.href="order-table.php"</script>';
         echo '<script>window.location.href="cart.php"</script>';
       }
     }

     //code (table) which helped me to check the functionality
     if(isset($_SESSION["order_id"])) {
       $order_details = '';
       $total = 0;
       $query = '
       SELECT * FROM orders
       INNER JOIN order_details
       ON order_details.order_id = orders.order_id
       INNER JOIN customers
       ON customers.idCust = orders.customer_id
       WHERE orders.order_id = "'.$_SESSION["order_id"].'"
       ';
       $result = mysqli_query($conn, $query);
       while($row = mysqli_fetch_array($result)) {
         $order_details .= "
           <tr>
             <td>".$row["order_id"]."</td>
             <td>".$row["product_name"]."</td>
             <td>£".$row["product_price"]."</td>
             <td>".$row["idCust"]."</td>
             <td>".$row["nameCust"]."</td>
             <td>".$row["phoneCust"]."</td>
             <td>".$row["emailCust"]."</td>
           </tr>
         ";
       }
       echo '
       <h3 align="center">Order Summary for Order No.'.$_SESSION["order_id"].'</h3>
       <div class="table-responsive">
         <table class="table">
           <tr>
             <td>
               <table class="table table-bordered">
                   <tr>
                     <th width="10%">Order No</th>
                     <th width="20%">Product Name</th>
                     <th width="10%">Price</th>
                     <th width="10%">ID Cust</th>
                     <th width="10%">Customer Name</th>
                     <th width="20%">Customer Phone Number</th>
                     <th width="20%">Customer Email</th>
                   </tr>
                 '.$order_details.'
               </table>
             </td>
           </tr>
         </table>
       </div>
       ';
     }
     ?>
   </div>
  </body>
 </html>
