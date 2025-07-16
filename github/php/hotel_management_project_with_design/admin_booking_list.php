<?php
include 'config.php';
$sql = "SELECT b.id, c.name, r.room_no, b.check_in, b.check_out FROM bookings b JOIN customers c ON b.customer_id = c.id JOIN rooms r ON b.room_id = r.id";
$result = mysqli_query($conn, $sql);
?>
<h2>All Bookings</h2>
<table border="1" cellpadding="10">
<tr><th>ID</th><th>Customer</th><th>Room No</th><th>Check-In</th><th>Check-Out</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['room_no']; ?></td>
<td><?= $row['check_in']; ?></td>
<td><?= $row['check_out']; ?></td>
</tr>
<?php } ?>
</table>