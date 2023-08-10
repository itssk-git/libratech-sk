<?php
$host='localhost';
$user='root';
$password='';
$db='lms';
$conn=new mysqli("$host",$user,"$password","$db");
if($conn -> connect_error){
    die("Failed to connect". $conn->connect_error);
}

?>