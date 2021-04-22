<?php
 //action.php
 session_start();
 require '../17023982electrics/includes/dbconnect.php';
 if(isset($_POST["product_id"]))
 {
      $order_table = '';
      $message = '';
      //adding an item in the cart
      if($_POST["action"] == "add")
      {
           if(isset($_SESSION["electricsawt"]))
           {
                $is_available = 0;
                foreach($_SESSION["electricsawt"] as $keys => $values)
                {
                     if($_SESSION["electricsawt"][$keys]['product_id'] == $_POST["product_id"])
                     {
                          $is_available++;
                          $_SESSION["electricsawt"][$keys]['product_quantity'] = $_SESSION["electricsawt"][$keys]['product_quantity'] + $_POST["product_quantity"];
                     }
                }
                if($is_available < 1)
                {
                     $item_array = array(
                          'product_id'               =>     $_POST["product_id"],
                          'product_name'               =>     $_POST["product_name"],
                          'product_image'               =>     $_POST["product_image"],
                          'product_price'               =>     $_POST["product_price"]

                     );
                     $_SESSION["electricsawt"][] = $item_array;
                }
           }
           else
           {
                $item_array = array(
                     'product_id'               =>     $_POST["product_id"],
                     'product_name'               =>     $_POST["product_name"],
                     'product_image'               =>     $_POST["product_image"],
                     'product_price'               =>     $_POST["product_price"]

                );
                $_SESSION["electricsawt"][] = $item_array;
           }
      }
      //remove the item in the cart
      if($_POST["action"] == "remove")
      {
           foreach($_SESSION["electricsawt"] as $keys => $values)
           {
                if($values["product_id"] == $_POST["product_id"])
                {
                     unset($_SESSION["electricsawt"][$keys]);
                     $message = '<label class="text-success">Product Removed</label>';
                }
           }
      }
      //place the order
      if(!empty($_SESSION["electricsawt"]))
      {
           foreach($_SESSION["electricsawt"] as $keys => $values)
           {
                $order_table .= '
                     <tr>
                          <td>'.$values["product_name"].'</td>
                          <td>'.$values["product_image"].'</td>
                          <td align="right">£ '.$values["product_price"].'</td>
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'">Remove</button></td>
                     </tr>
                ';
           }
           $order_table .= '
                <tr>
                     <td colspan="5" align="center">
                          <form method="post" action="order-table.php">
                               <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />
                          </form>
                     </td>
                </tr>
           ';
      }
      $order_table .= '</table>';
      $output = array(
           'order_table'     =>     $order_table,
           'cart_item'          =>     count($_SESSION["electricsawt"])
      );
      echo json_encode($output);
 }
 ?>
