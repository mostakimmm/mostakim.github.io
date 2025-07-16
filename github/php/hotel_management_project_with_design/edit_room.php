<?php
include 'config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM rooms WHERE id = $id");
$room = mysqli_fetch_assoc($result);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_no = $_POST['room_no'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $sql = "UPDATE rooms SET room_no='$room_no', type='$type', price='$price', status='$status' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Room</title>
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
<h2>Edit Room</h2>
<form method="POST">
Room No: <input type="text" name="room_no" value="<?php echo $room['room_no']; ?>" required><br><br>
Type: <input type="text" name="type" value="<?php echo $room['type']; ?>" required><br><br>
Price: <input type="text" name="price" value="<?php echo $room['price']; ?>" required><br><br>
Status:
<select name="status">
<option value="Available" <?php if($room['status']=='Available') echo 'selected'; ?>>Available</option>
<option value="Booked" <?php if($room['status']=='Booked') echo 'selected'; ?>>Booked</option>
</select><br><br>
<input type="submit" value="Update Room">
</form></div></body></html>