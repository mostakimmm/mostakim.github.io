<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_no = $_POST['room_no'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $sql = "INSERT INTO rooms (room_no, type, price, status) VALUES ('$room_no', '$type', '$price', '$status')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Room</title>
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
<h2>Add Room</h2>
<form method="POST">
Room No: <input type="text" name="room_no" required><br><br>
Type: <input type="text" name="type" required><br><br>
Price: <input type="text" name="price" required><br><br>
Status:
<select name="status">
<option value="Available">Available</option>
<option value="Booked">Booked</option>
</select><br><br>
<input type="submit" value="Add Room">
</form></div></body></html>