<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $room_id = $_POST['room_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    mysqli_query($conn, "INSERT INTO customers (name, email, phone) VALUES ('$name', '$email', '$phone')");
    $customer_id = mysqli_insert_id($conn);
    mysqli_query($conn, "INSERT INTO bookings (customer_id, room_id, check_in, check_out) VALUES ('$customer_id', '$room_id', '$check_in', '$check_out')");
    mysqli_query($conn, "UPDATE rooms SET status='Booked' WHERE id='$room_id'");
    echo "<h3>✅ Room booked successfully!</h3><a href='index.php'>Back to Room List</a>";
    exit;
}
$rooms = mysqli_query($conn, "SELECT * FROM rooms WHERE status='Available'");
?>
<h2>Room Booking</h2>
<form method="POST">
Name: <input type="text" name="name" required><br><br>
Email: <input type="email" name="email" required><br><br>
Phone: <input type="text" name="phone" required><br><br>
Room:
<select name="room_id" required>
<?php while($room = mysqli_fetch_assoc($rooms)) { ?>
<option value="<?= $room['id']; ?>"><?= $room['room_no']; ?> (<?= $room['type']; ?>) - ৳<?= $room['price']; ?></option>
<?php } ?>
</select><br><br>
Check-in: <input type="date" name="check_in" required><br><br>
Check-out: <input type="date" name="check_out" required><br><br>
<input type="submit" value="Book Now">
</form>