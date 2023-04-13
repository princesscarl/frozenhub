<div class="container-fluid">
        <table id="table" class="table table-bordered text-center" style="width:100%; margin:auto; border-collapse:collapse;">
 
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
 
$sql = "SELECT * FROM application_table";
$result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)){
 
 
    $application_id = $row["application_id"];
    $status = $row["status"];
    echo '<tr>
		<td>'. $row["firstName"] . '</td>
		<td>' . $row["lastName"] . '</td>
		<td>' . $row["email"] . '</td>
		<td>' . $row["contact_number"] . '</td>
		<td>' . $row["temporary_location"] . '</td>
		<td>' . $row["isLookingForSpace"] . '</td>
		<td>' . $row["business_name"] .'</td>
		<td>' . $row["years"] . '</td>
		<td>'. $row["typeOfBusiness"] .'</td>
    <td>'. $row["inputMessage"] .'</td>';
    
    if ($status == "Pending"){
      echo '
      <td style="background:lightgray;">'.$status.'</td>
      ';
    }
 
    if ($status == "Done"){
      echo '
      <td style="background:green;">'.$status.'</td>
      ';
    }
 
    echo'
		<td>
    <form method ="post">
    <button class="btn btn-success">
    <a href="done.php?id='.$application_id.'" class="text-light">Accept</a></button>
   </td>
   <td>
    <button class="btn btn-secondary">
    <a href="pending.php?id='.$application_id.'" class="text-light">To Process</a></button>
   </td>
    </form> ';}
?>
      </table>
  </div>
