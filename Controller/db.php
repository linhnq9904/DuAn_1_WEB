<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "du_an_1";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Kết nối Database không thành công".$e->getMessage();
}
?>