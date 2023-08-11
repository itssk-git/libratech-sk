<?php
session_start();
include '../includes/connection.php';

if (isset($_GET['b_id'])) {
    $publisherId = $_GET['b_id'];

    // Perform the database deletion for the category
    $sql = "DELETE FROM publisher WHERE publisher_id = '$publisherId'";
    if ($conn->query($sql)) {
        // Category deleted successfully
        header("Location: /lms/admin/add_publisher.php"); // Redirect to the appropriate page after deletion
        exit();
    } else {
        echo "Error deleting publisher: " . $conn->error;
        exit();
    }
} else {
    // Handle other cases or show an error message
}
$conn->close();
?>
