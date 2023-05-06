<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// import SQL file
$sql_file = file_get_contents('supermarket.sql');
mysqli_multi_query($conn, $sql_file);

// continue with your PHP code
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ...
?>
