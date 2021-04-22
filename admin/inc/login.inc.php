<?php
  // Here we check whether the user got to this page by clicking the proper login button.
  if (isset($_POST['login-submit'])) {

    // We include the connection script so we can use it later.
    // close the MySQLi connection
    include '../../includes/dbconnect.php';

    // We grab all the data which we passed from the signup form so we can use it later.
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    // error handling to make sure we catch any errors made by the user.
    // We check for any empty inputs.
    if (empty($mailuid) || empty($password)) {
      header("Location: ../administration.php?error=emptyfields&mailuid=".$mailuid);
      exit();
    }
      else {

        // If we got to this point, it means the user didn't make an error
        // connect to the database using prepared statements
        $sql = "SELECT * FROM admin WHERE nameAdmin=? OR emailAdmin=?;";
        // Here we initialize a new statement using the connection from the dbconnect.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the login page.
          header("Location: ../administration.php?error=sqlerror");
          exit();
        }
          else {
            // If there is no error then we continue the script
            // Next we need to bind the type of parameters we expect to pass into the statement,
            // and bind the data from the user.
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            // Then we execute the prepared statement and send it to the database!
            mysqli_stmt_execute($stmt);

            // And we get the result from the statement.
            $result = mysqli_stmt_get_result($stmt);
            // Then we store the result into a variable.
            if ($row = mysqli_fetch_assoc($result)) {
                // Then we match the password from the database with the password the user submitted.
                // The result is returned as a boolean.
                //The password_verify() function takes a plain password and the hashed string as its two arguments. It returns true if the hash matches the specified password.
                //https://www.sitepoint.com/hashing-passwords-php-5-5-password-hashing-api/#:~:text=password_verify(),-Now%20that%20you&text=Remember%20that%20you%20store%20the,hash%20matches%20the%20specified%20password.
                $pwdCheck = password_verify($password, $row['pwdAdmin']);
                // If they don't match then we create an error message!
                if ($pwdCheck == false) {
                  // If there is an error we send the user back to the login page.
                  header("Location:../administration.php?error=wrongpwd");
                  exit();
                }
                  // Then if they DO match, then we know it is the correct user that is trying to log in!
                  else if ($pwdCheck == true) {

                    session_start();
                    // we create the session variables.
                    $_SESSION['loginadmin'] = $row['idAdmin'];
                    $_SESSION['uid'] = $row['nameAdmin'];
                    $_SESSION['email'] = $row['emailAdmin'];
                    // Now the user is  logged in and
                    //we can now take them back to the administration page
                    header("Location: ../administration.php?login=success");
                    exit();
                  }
              }
                else {
                  header("Location: ../admin/administration.php?error=wronguidpwd");
                  exit();
                }
          }
      }
    // Then we close the prepared statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
  else {
    // If the user tries to access this page an inproper way, we send them back to the login page.
    header("Location:../admin/administration.php");
    exit();
  }
