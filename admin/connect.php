<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frozenhub";
$tablename = "application_table";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}
?>