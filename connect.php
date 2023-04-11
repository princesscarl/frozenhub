<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "frozenhub";
// $tablename = "application";


// $conn = new mysqli($servername, $username, $password, $dbname);

// if (!$conn) 
// {
//   die("Connection failed: " . $conn);
// }


$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

?>