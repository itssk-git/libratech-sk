<?php
include '../includes/connection.php';

$borrowing_id = $_GET['b_id'];

$sql = "UPDATE borrowing SET status = 'cancelled' WHERE borrowing_id = $borrowing_id";

if ($conn->query($sql)) {
    header('location: user_profile.php');
}
?>
