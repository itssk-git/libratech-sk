<?php
// include the connection file
include '../includes/connection.php';

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    // SQL query to update the status to 'rejected'
    $sql_update = "UPDATE borrowing SET status = 'rejected' WHERE borrowing_id = $request_id";

    if ($conn->query($sql_update) === TRUE) {
        // Redirect back to the previous page after the status is updated
        header('location:requested_book.php');
    } else {
        echo "Error updating request status: " . $conn->error;
    }
}
?>
