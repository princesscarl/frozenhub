<div class="container-fluid">
        <table id="table" class="table table-bordered text-center" style="width:100%; margin:auto; border-collapse:collapse;">
 
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
		<td>'. $row["firstname"] . '</td>
		<td>' . $row["lastname"] . '</td>
		<td>' . $row["email"] . '</td>
		<td>' . $row['phoneNum'] . '</td>
		<td>' . $row['proNo']. '</td>
    <td>' . $row['proName'] . '</td>
    <td>' .$row['boughtOn']. '</td>
    <td>' . $row['comDate']. '</td>
		<td>' . $row['details'] .'</td>';
    
?>
        <td><a href="../pictures/<?php echo $picture?>">view file</a></td>

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
    <a href="./approval/complaints_done.php?id='.$com_id.'" class="text-light">Accept</a></button>
   </td>
   <td>
    <button class="btn btn-secondary">
    <a href="./approval/complaints_pending.php?id='.$com_id.'" class="text-light">To Process</a></button>
   </td>
    </form> ';}
?>
      </table>
  </div>
