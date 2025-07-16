<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM rooms");
?>
<!DOCTYPE html>
<html>
<head><title>Room List</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header"><h1>🏨 Hotel Management System</h1></div>
<div class="nav">
    <a href="index.php">Room List</a>
    <a href="add_room.php">Add Room</a>
    <a href="booking.php">Book Room</a>
    <a href="admin_booking_list.php">All Bookings</a>
</div>
<div class="content">
<h2>Room List</h2>
<a href="add_room.php">Add New Room</a> | <a href="booking.php">Book a Room</a> | <a href="admin_booking_list.php">View Bookings</a>
<table border="1" cellpadding="10" cellspacing="0">
<tr><th>Room No</th><th>Type</th><th>Price</th><th>Status</th><th>Actions</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['type']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="edit_room.php?id=<?php echo $row['id']; ?>">Edit</a> |
<a href="delete_room.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php } ?>
</table>
</div></body></html>