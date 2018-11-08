<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "noteApp";
$conn = new mysqli($servername, $username, $password, $dbname   );
mysqli_set_charset($conn,"utf8");