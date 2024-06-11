<?php

$dsn = "mysql:host=localhost;dbname=mysolar;charset=utf8";
$user="root";
$pass="";
$db="mysolar";
try{


$con=new PDO ($dsn,$user,$pass);

}
catch(PDOException $error){
    echo $error->getMessage();
}
?>