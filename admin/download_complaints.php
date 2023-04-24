<?php
include 'connect.php';
 
 
//CSV Filename
$fname = 'List of Customer Complaints.csv';
 
// Header Row Data: Array
$header = ["No.","First Name", "Last Name", "Email","Mobile Number", "Product Number", "Complaint Date", "Product Name", "Bought On", "Details", "Actions"];
 
// Selecting all authors query
$sql = "SELECT * FROM complaints_table";
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
    fputcsv($file, [$count++, $row['firstName'], $row['lastName'],$row['email'],  $row["phoneNum"], $row["proNo"], $row["comDate"]  ,  $row["proName"] , $row["boughtOn"] , $row["details"], $row["actions"]   ]);
}
 
fseek($file,0);
 
// Add headers to download the file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$fname.'";');
 
// Read File 
fpassthru($file);
exit;