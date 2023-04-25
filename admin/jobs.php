<div class="container-fluid">
  <h1 class="text-center" style="padding: 20px; font-weight:bold">Job Applications</h1>
  <a class="nav-link" href="./csv/download_job.php" style="font-size: 20px; font-weight:bold; float:right;">
  <i class="fa-solid fa-file-arrow-down" aria-hidden="true"></i> CSV</a>
  
        <table id="table" class="table table-stripped table-bordered dataTable responsive display nowrap no-footer dtr-inline collapsed printTable darkBG" role="grid" cellspacing="0" style="width:100%">
        <thead style="background-color: #61b0b7">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Location</th>
            <th>Applying For</th>
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
 
$sql = "SELECT * FROM job_table ORDER BY `job_table`.`job_id` DESC";
$result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)){
 
 
    $job_id = $row["job_id"];
    $status = $row["status"];
    $file_content = $row["file"];

    echo '<tr>
		<td data-label="First name">'. $row["firstname"] . '</td>
		<td data-label="Last name">' . $row["lastname"] . '</td>
		<td data-label="Email">' . $row["email"] . '</td>
		<td data-label="Phone Number">' . $row['phoneNum'] . '</td>
		<td data-label="Address">' . $row['address']. '</td>
    <td data-label="Applying For">' . $row['position']. '</td>
    <td data-label="Interview Date/s">' . $row['interview']. '</td>
		<td data-label="Job Title">' . $row['jobTitle'] . '</td>
		<td data-label="Company Name">' . $row['comName'] .'</td>
		<td data-label="Company Address">'. $row['comAddress'] .'</td>';
?>
        <td data-label="Resume"> <a href="../files/<?php echo $file_content?>">view file</a></td>
    <?php
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
    <a href="./approval/job_done.php?id='.$job_id.'" class="text-light">Accept</a></button>
   </td>
   <td>
    <button class="btn btn-secondary">
    <a href="./approval/job_pending.php?id='.$job_id.'" class="text-light">To Process</a></button>
   </td>
    </form> ';}
?>
      </table>
  </div>
