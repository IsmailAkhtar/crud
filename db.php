<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "crud";
//connection
$conn =mysqli_connect($host, $user, $password, $db);

if($conn){

}else{
    echo"Failed";
}



?>