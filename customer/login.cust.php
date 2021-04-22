<?php
  // Here we check whether the user got to this page by clicking the proper login button.
  if (isset($_POST['login-submit'])) {

    // We include the connection script so we can use it later.
    // close the MySQLi connection
    require '../includes/dbconnect.php';

    // We grab all the data which we passed from the login form so we can use it later.
    $phone = $_POST['phone'];
    $password = $_POST['pwd'];

    // error handling to make sure we catch any errors made by the user.
    // We check for any empty inputs.
    if (empty($phone) || empty($password)) {
      header("Location: ../customer/login.php?error=emptyfields&phone=".$phone);
      exit();
    }
    // We check for an invalid phone number
    else if (!preg_match("/^[0-9]{11}$/", $phone)) {
      header("Location: ../customer/login.php?error=invalidphone=".$phone);
      exit();
    }
      else {
        // If we got to this point, it means the user didn't make an error
        // connect to the database using prepared statements
        $sql = "SELECT * FROM customers WHERE phoneCust=?;";
        // Here we initialize a new statement using the connection from the dbconnect.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../customer/login.php?error=sqlerror");
          exit();
        }
          else {
            // If there is no error then we continue the script!
            // Next we need to bind the type of parameters we expect to pass into the statement,
            // and bind the data from the user.
            mysqli_stmt_bind_param($stmt, "s", $phone);
            // Then we execute the prepared statement and send it to the database!
            mysqli_stmt_execute($stmt);
            // And we get the result from the statement.
            $result = mysqli_stmt_get_result($stmt);
            // Then we store the result into a variable.
            if ($row = mysqli_fetch_assoc($result)) {
                // Then we match the password from the database with the password the user submitted. The result is returned as a boolean.
                $pwdCheck = password_verify($password, $row['pwdCust']);
                // If they don't match then we create an error message!
                if ($pwdCheck == false) {
                  // If there is an error we send the user back to the login page.
                  header("Location:../customer/login.php?error=wrongpwd");
                  exit();
                }
                  // Then if they DO match, then we know it is the correct user that is trying to log in!
                  else if ($pwdCheck == true) {
                    session_start();
                    // And NOW we create the session variables.
                    $_SESSION['login'] = $row['idCust'];
                    $_SESSION['phone'] = $row['phoneCust'];

                    // Now the user logged in and
                    //we can now take them back to the welcome page!
                    header("Location: ../customer/welcome-page.php?login=success");
                    exit();
                  }
              }
                else {
                  header("Location: ../customer/login.php?error=wrongphonepwd");
                  exit();
                }
          }
      }
    // Then we close the prepared statement and the database connection!
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
  else {
    // If the user tries to access this page an inproper way, we send them back to the signup page.
    header("Location:../customer/login.php");
    exit();
  }
