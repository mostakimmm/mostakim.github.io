<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM rooms WHERE id = $id");
header("Location: index.php");
?>