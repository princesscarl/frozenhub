<div class="container-fluid">
  <h1 class="text-center" style="padding: 20px; font-weight:bold">Inquiries</h1>
  <a class="nav-link" href="./csv/download_inquiries.php" style="font-size: 20px; font-weight:bold; float:right;">
  <i class="fa-solid fa-file-arrow-down" aria-hidden="true"></i> CSV</a>
  

        <table id="table" class="table table-bordered text-center" style="width:100%; margin:auto; border-collapse:collapse;">
        <thead style="background-color: #61b0b7;">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Location</th>
            <th>Existing/Looking</th>
            <th>Business Name</th>
            <th>Years in Business</th>
            <th>Type of Business</th>
            <th>Message</th>
            <th>Status</th>
		        <th colspan="2">Actions</th>
        </tr>
</thead>
<tbody>
<?php
 
$sql = "SELECT * FROM application_table ORDER BY `application_table`.`application_id` DESC";
$result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)){
 
 
    $application_id = $row["application_id"];
    $status = $row["status"];
    echo '<tr>
		<td data-label="First name">'. $row["firstName"] . '</td>
		<td data-label="Last name">' . $row["lastName"] . '</td>
		<td data-label="Email">' . $row["email"] . '</td>
		<td data-label="Phone Number">' . $row["contact_number"] . '</td>
		<td data-label="Location">' . $row["temporary_location"] . '</td>
		<td data-label="Existing/Looking">' . $row["isLookingForSpace"] . '</td>
		<td data-label="Business Name">' . $row["business_name"] .'</td>
		<td data-label="Year/s in Business">' . $row["years"] . '</td>
		<td data-label="Type of Business">'. $row["typeOfBusiness"] .'</td>
    <td data-label="Message">'. $row["inputMessage"] .'</td>';
    
    if ($status == "Pending"){
      echo '
      <td style="background:lightgray;" data-label="Status">'.$status.'</td>
      ';
    }
 
    if ($status == "Done"){
      echo '
      <td style="background:green;" data-label="Status">'.$status.'</td>
      ';
    }
 
    echo'
		<td data-label="Actions">
    <form method ="post">
    <button class="btn btn-success">
    <a href="./approval/inquiry_done.php?id='.$application_id.'" class="text-light">Accept</a></button>
   </td>
   <td>
    <button class="btn btn-secondary">
    <a href="./approval/inquiry_pending.php?id='.$application_id.'" class="text-light">To Process</a></button>
   </td>
    </form> ';}
?>
      </table>
  </div>
