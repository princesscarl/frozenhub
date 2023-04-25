<div class="container-fluid">
    <h1 class="text-center" style="padding: 20px; font-weight:bold">Feedbacks</h1>
        <table id="table" class="table table-bordered text-center" style="width:100%; margin:auto; border-collapse:collapse;">
        <thead style="background-color: #61b0b7;">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Product Name</th>
            <th>Rating</th>
            <th>Feedback</th>
            <th>Picture</th>
        </tr>
</thead>
<tbody>
<?php
 
$sql = "SELECT * FROM feedback_table ORDER BY `feedback_table`.`feed_id` DESC";
$result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)){
 
 
    $feed_id = $row["feed_id"];
    $picture = $row['picture'];

    echo '<tr>
		<td data-label="First name">'. $row["firstName"] . '</td>
		<td data-label="Last Name">' . $row["lastName"] . '</td>
		<td data-label="Email">' . $row["email"] . '</td>
		<td data-label="Phone Number">' . $row["phone"] . '</td>
        <td data-label="Product Name">' . $row["proName"] . '</td>
		<td data-label="Ratings">' . $row["ratings"] . '</td>
		<td data-label="Feedback">' . $row["feedback"] . '</td>';
}
?>

        <td data-label="Pictures"> <a href="../pictures/<?php echo $picture?>">view file</a></td>
      </table>
  </div>
