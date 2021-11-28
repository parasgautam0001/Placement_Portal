<?php
$server="localhost";
$port="3306";
$user="paras";
$pwd="1234";
$database="plcmtportal";
try{
    $conn = new PDO("mysql:host=$server;port=$port_no,dbname=$database",$user,$pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed !" .$e->getMessage();
}
?>