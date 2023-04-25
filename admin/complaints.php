<div class="container-fluid">
        <h1 class="text-center" style="padding: 20px; font-weight:bold">Complaints Data</h1>
        <a class="nav-link" href="./csv/download_complaints.php" style="font-size: 20px; font-weight:bold;"><i class="fa-solid fa-file-arrow-down" aria-hidden="true"></i> CSV</a>
        
        <table id="table" class="table table-bordered text-center" style="width:100%; margin:auto; border-collapse:collapse;">
        <thead style="background-color: #61b0b7;">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Product No.</th>
            <th>Product Name</th>
            <th>Bought On</th>
            <th>Complain Date</th>
            <th>Complain Details</th>
            <th> Proposed Action/s </th>
            <th> Picture </th>
            <th> Status </th>
		        <th colspan="2">Actions</th>
        </tr>
</thead>
<tbody>
<?php
 
$sql = "SELECT * FROM complaints_table ORDER BY `complaints_table`.`com_id` DESC";
$result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)){
 
 
    $com_id = $row["com_id"];
    $status = $row["status"];
    $picture = $row['picture'];

        echo '<tr>
		<td data-label="First Name">' . $row["firstname"] . '</td>
		<td data-label="Last Name">' . $row["lastname"] . '</td>
		<td data-label="Email">' . $row["email"] . '</td>
		<td data-label="Phone Number">' . $row['phoneNum'] . '</td>
		<td data-label="Product Number">' . $row['proNo'] . '</td>
    <td data-label="Product Name">' . $row['proName'] . '</td>
    <td data-label="Bought On">' . $row['boughtOn'] . '</td>
    <td data-label="Commplaint Date">' . $row['comDate'] . '</td>
		<td data-label="Details">' . $row['details'] . '</td>
    <td data-label="Proposed Action/s">' . $row['actions'] . '</td>';

      ?>
        <td><a href="../pictures/<?php echo $picture ?>">view file</a></td>

      <?php
        if ($status == "Pending") {
          echo '
      <td style="background:lightgray;" data-label="Status">' . $status . '</td>
      ';
        }

        if ($status == "Done") {
          echo '
      <td style="background:green;" data-label="Status">' . $status . '</td>
      ';
        }

        echo '
		<td data-label="Actions">
    <form method ="post">
    <button class="btn btn-success">
    <a href="./approval/complaints_done.php?id=' . $com_id . '" class="text-light">Accept</a></button>
   </td>
   <td>
    <button class="btn btn-secondary">
    <a href="./approval/complaints_pending.php?id=' . $com_id . '" class="text-light">To Process</a></button>
   </td>
    </form> ';
      }
      ?>
  </table>
</div>