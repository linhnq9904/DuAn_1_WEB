<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "du_an_1";

$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
