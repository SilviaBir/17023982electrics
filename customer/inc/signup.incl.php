<?php
  // Here we check whether the user got to this page by clicking the proper signup button.

  if (isset($_POST['submit-signup'])) {

    //Database connection
    require '../../includes/dbconnect.php';

    // We grab all the data which we passed from the signup form so we can use it later.
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // error handling to make sure we catch any errors made by the user.
    // We check for any empty inputs.
    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
      header("Location: ../../customer/signup.php?error=emptyfields&name=".$name."&phone=".$phone."&email=".$email);
      exit();
    }
    // We check for an invalid name AND invalid email.
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $name) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../../customer/signup.php?error=invalidname&email");
      exit();
    }
    // We check for an invalid name. In this case ONLY letters and numbers.
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
      header("Location: ../../customer/signup.php?error=invalidname&email=".$email);
      exit();
    }
    // We check for an invalid email.
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../../customer/signup.php?error=invalidemail&name=".$name);
      exit();
    }
    else {

      // If we got to this point, it means the user didn't make an error
      // connect to the database using prepared statements
      $sql = "SELECT phoneCust FROM customers WHERE phoneCust=?;";
      // We create a prepared statement.
      $stmt = mysqli_stmt_init($conn);
      // Then we prepare our SQL statement AND check if there are any errors with it.
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        // If there is an error we send the user back to the signup page.
        header("Location: ../../customer/signup.php.php?error=sqlerror");
        exit();
      }
      else {
        // Next we need to bind the type of parameters we expect to pass into the statement,
        // and bind the data from the user.
        mysqli_stmt_bind_param($stmt, "s", $phone);
        // Then we execute the prepared statement and send it to the database!
        mysqli_stmt_execute($stmt);
        // Then we store the result from the statement.
        mysqli_stmt_store_result($stmt);
        // Then we get the number of result we received from our statement. This tells us whether the username already exists or not!
        $resultCount = mysqli_stmt_num_rows($stmt);
        // Then we close the prepared statement!
        mysqli_stmt_close($stmt);
        // Here we check if the username exists.
        if ($resultCount > 0) {
          header("Location: ../../customer/signup.php.php?error=usertaken&phone=".$phone);
          exit();
        }
        else {
          // If we got to this point, it means the user didn't make an error

          $sql = "INSERT INTO customers (nameCust, phoneCust, emailCust, pwdCust) VALUES (?, ?, ?, ?);";
          // Here we initialize a new statement using the connection from the dbconnect file.
          $stmt = mysqli_stmt_init($conn);
          // Then we prepare our SQL statement AND check if there are any errors with it.
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            // If there is an error we send the user back to the signup page.
            header("Location: ../../customer/signup.php.php?error=sqlerror");
            exit();
          }
          else {

            // If there is no error then we continue the script
            // The hashing method
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            // bind the type of parameters we expect to pass into the statement,
            // and bind the data from the user.
            mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $email, $hashedPwd);
            // Then we execute the prepared statement and send it to the database
            mysqli_stmt_execute($stmt);
            //start a new session
            session_start();
            // And NOW we create the session variables.
            $_SESSION["signup"] = $row['idCust'];
            $_SESSION['name'] = $row['nameCust'];
            $_SESSION['phone'] = $row['phoneCust'];
            $_SESSION['email'] = $row['emailCust'];
            //$_SESSION['login'] = $row['idCust'];
            //echo "Session variables are set.";

            // end the user back to the signup page with a success message
            header("Location: ../../customer/welcome-page.php?signup=success");
            exit();
          }
        }
      }
    }
    // Then we close the prepared statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }
    else {
      // If the user tries to access this page an inproper way, we send them back to the signup page.
      header("Location: ../../customer/signup.php?errorsignup");
      exit();
    }

 //    if (!empty($name) || !empty($email) || !empty($phone) || !empty($password)) {
 //        //check if phone is unique
 //        $sql = "SELECT phoneCust FROM customers WHERE phoneCust=?;";
 //        // We create a prepared statement.
 //        $stmt = mysqli_stmt_init($conn);
 //        // Then we prepare our SQL statement AND check if there are any errors with it.
 //        if (!mysqli_stmt_prepare($stmt, $sql)) {
 //          // If there is an error we send the user back to the signup page.
 //          header("Location: ../../customer/signup.php?error=sqlerror");
 //          exit();
 //        }
 //        else {
 //          mysqli_stmt_bind_param($stmt, "s", $phone);
 //          // Then we execute the prepared statement and send it to the database!
 //          mysqli_stmt_execute($stmt);
 //          // Then we store the result from the statement.
 //          mysqli_stmt_store_result($stmt);
 //          // Then we get the number of result we received from our statement. This tells us whether the name already exists or not!
 //          $resultCount = mysqli_stmt_num_rows($stmt);
 //          // Then we close the prepared statement!
 //          mysqli_stmt_close($stmt);
 //          // Here we check if the name exists.
 //          if ($resultCount > 0) {
 //            header("Location: ../../customer/signup.php?error=usertaken&phone=".$phone);
 //            exit();
 //          }
 //          else {
 //
 //            // If we got to this point, it means the user didn't make an error
 //            // connect to the database using prepared statements
 //           $sql = "INSERT INTO customers (nameCust, phoneCust, emailCust, pwdCust) VALUES (?, ?, ?, ?);";
 //            // Here we initialize a new statement using the connection from the dbconnect.php file.
 //            $stmt = mysqli_stmt_init($conn);
 //            // Then we prepare our SQL statement AND check if there are any errors with it.
 //            if (!mysqli_stmt_prepare($stmt, $sql)) {
 //              // If there is an error we send the user back to the signup page.
 //              header("Location: ../../customer/signup.php?error=sqlerror");
 //              exit();
 //            }
 //            else {
 //
 //              // If there is no error then we continue the script!
 //
 //              // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
 //              // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!
 //              $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
 //
 //              // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
 //              mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $email, $hashedPwd);
 //              // Then we execute the prepared statement and send it to the database!
 //              // This means the user is now registered! :)
 //              mysqli_stmt_execute($stmt);
 //              // Lastly we send the user back to the signup page with a success message!
 //              header("Location: ../../customer/welcome-page.php?signup=success");
 //              exit();
 //            }
 //          }
 //        }
 //      } else {
 //        header("Location: ../../customer/signup.php?emptyfields");
 //        exit();
 //      }
 //
 //      mysqli_stmt_close($stmt);
 //      // Close connection
 //      mysqli_close($conn);
 // }
 //   else {
 //   // If the user tries to access this page an inproper way, we send them back to the signup page.
 //   header("Location: ../../customer/signup.php?errorsignup");
 //   exit();
 //   }



?>
