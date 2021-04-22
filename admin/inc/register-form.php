<?php
  //The form for admin signup

  //database connect
  require "../includes/dbconnect.php"
?>

<!--Form-->
<div class="card-body">
  <!--Header-->
  <div class="text-center">
    <h3 class="white-text">Register:</h3>
    <hr class="hr-light">
  </div>
  <?php
  // Here we create an error message if the user made an error trying to sign up.
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfields") {
      echo '<p class="signuperror">Fill in all fields!</p>';
    }
    else if ($_GET["error"] == "invaliduidmail") {
      echo '<p class="signuperror">Invalid username and e-mail!</p>';
    }
    else if ($_GET["error"] == "invaliduid") {
      echo '<p class="signuperror">Invalid username!</p>';
    }
    else if ($_GET["error"] == "invalidmail") {
      echo '<p class="signuperror">Invalid e-mail!</p>';
    }
    else if ($_GET["error"] == "passwordcheck") {
      echo '<p class="signuperror">Your passwords do not match!</p>';
    }
    else if ($_GET["error"] == "usertaken") {
      echo '<p class="signuperror">Username is already taken!</p>';
    }
  }
  // Here we create a success message if the new user was created.
  else if (isset($_GET["signup"])) {
    if ($_GET["signup"] == "success") {
      echo '<p class="signupsuccess">Signup successful!</p>';
    }
  }
  ?>
  <!-- Signup admin form -->
  <form class="md-form1"
        action="inc/signup.inc.php"
        method="post">

    <div class="md-form1">
      <?php
      // We check username.
      if (!empty($_GET["uid"])) {
        echo '<input type="text" id="form1" class="form-control" name="uid" value="'.$_GET["uid"].'">';
      }
      else {
        echo '<input type="text" id="form1" class="form-control" name="uid">';
      }
      ?>
      <label for="form1" class="active">Your name</label>
    </div>
    <br />
    <div class="md-form1">
    <?php
    // We check mail.
      if (!empty($_GET["mail"])) {
        echo '<input type="text" id="form2" class="form-control" name="mail" value="'.$_GET["mail"].'">';
      }
      else {
        echo '<input type="text" id="form2" class="form-control" name="mail">';
      }
    ?>
      <label for="form3" class="active">Your email</label>
    </div>
    <br />
    <div class="md-form1">
      <input type="password" id="form3" class="form-control" name="pwd">
      <label for="form4">Your password</label>
    </div>
    <br />
    <div class="md-form1">
      <input type="password" id="form4" class="form-control" name="pwd-repeat">
      <label for="form5">Re-write the password</label>
    </div>

    <div class="text-center mt-4">
      <button class="btn btn-info" type="submit" name="signup-submit">Sign up</button>
    </div>

  </form>

  <hr class="hr-light mb-3 mt-4">
  <!--End of the Form for registering-->
 </div>
