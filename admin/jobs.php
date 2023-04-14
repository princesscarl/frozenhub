<div class="container-fluid">
        <table id="table" class="table table-bordered text-center" style="width:100%; margin:auto; border-collapse:collapse;">
 
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Location</th>
            <th>Time of Interview</th>
            <th>Job Title</th>
            <th>Company Name</th>
            <th>Company Address</th>
            <th> File </th>
            <th>Status</th>
		        <th colspan="2">Actions</th>
        </tr>
</thead>
<tbody>
<?php
 
$sql = "SELECT * FROM job_table";
$result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)){
 
 
    $job_id = $row["job_id"];
    $status = $row["status"];
    $file_content = $row["file"];

    echo '<tr>
		<td>'. $row["firstname"] . '</td>
		<td>' . $row["lastname"] . '</td>
		<td>' . $row["email"] . '</td>
		<td>' . $row['phoneNum'] . '</td>
		<td>' . $row['address']. '</td>
        <td>' . $row['interview']. '</td>
		<td>' . $row['jobTitle'] . '</td>
		<td>' . $row['comName'] .'</td>
		<td>'. $row['comAddress'] .'</td>';
?>
        <td> <a href="../files/<?php echo $file_content?>">view file</a></td>
    <?php
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
    <a href="./approval/jobs_done.php?id='.$job_id.'" class="text-light">Accept</a></button>
   </td>
   <td>
    <button class="btn btn-secondary">
    <a href="pending.php?id='.$job_id.'" class="text-light">To Process</a></button>
   </td>
    </form> ';}
?>
      </table>
  </div>
