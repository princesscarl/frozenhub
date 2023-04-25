<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frozenhub";
$tablename = "job_table";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}
//CSV Filename
$fname = 'List of Job Applicants.csv';
 
// Header Row Data: Array
$header = ["No.","First Name", "Last Name", "Email","Mobile Number", "Address", "Position(Applying For)", "Interview Date", "Job Title", "Company Name", "Company Address"];
 
// Selecting all authors query
$sql = "SELECT * FROM job_table";
$result = $conn->query($sql);
 
if($result->num_rows <= 0){
    echo "<script> alert('No data has fetched.'); </script>";
    exit;
}
 
//Open a File
$file = fopen("php://memory","w");
 
// Attach Header
fputcsv($file, $header,',');
 
 
// Loop the authors and put it into the CSV file
$count = 1;
while ($row = mysqli_fetch_assoc($result)){
    fputcsv($file, [$count++, $row['firstname'], $row['lastname'],$row['email'],  $row["phoneNum"], $row["address"], $row["position"]  ,  $row["interview"] , $row["jobTitle"] , $row["comName"], $row["comAddress"]   ]);
}
 
fseek($file,0);
 
// Add headers to download the file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$fname.'";');
 
// Read File 
fpassthru($file);
exit;