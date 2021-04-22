<?php
/*
1: "die()" will exit the script and show an error statement if something goes wrong with the "connect" or "select" functions.
2: A "mysqli_connect()" error usually means your username/password are wrong
3: A "mysqli_select_db()" error usually means the database does not exist.
*/

// localhost as a server
$servername = " ";
// Place the username for the mysqli database here
$dbUsername = " ";
// Place the password for the mysqli database here
$dbPassword = " ";
// Place the name for the mysqli database here
$dbName = " ";


// Create connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
