<?php
include 'connect.php';
 
 
//CSV Filename
$fname = 'List of Applicants.csv';
 
// Header Row Data: Array
$header = ["No.","First Name", "Last Name", "Email","Mobile Number", "Location", "isLookingForSpace", "Business Name", "Years", "Type of Business", "Message"];
 
// Selecting all authors query
$sql = "SELECT * FROM application_table";
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
    fputcsv($file, [$count++, $row['firstName'], $row['lastName'],$row['email'],  $row["contact_number"], $row["temporary_location"], $row["isLookingForSpace"]  ,  $row["business_name"] , $row["years"] , $row["typeOfBusiness"], $row["inputMessage"]   ]);
}
 
fseek($file,0);
 
// Add headers to download the file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$fname.'";');
 
// Read File 
fpassthru($file);
exit;