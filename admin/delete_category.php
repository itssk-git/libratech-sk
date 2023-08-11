<?php
session_start();
include '../includes/connection.php';

if (isset($_GET['b_id'])) {
    $categoryId = $_GET['b_id'];

    // Perform the database deletion for the category
    $sql = "DELETE FROM category WHERE category_id = '$categoryId'";
    if ($conn->query($sql)) {
        // Category deleted successfully
        header("Location: /lms/admin/add_category.php"); // Redirect to the appropriate page after deletion
        exit();
    } else {
        echo "Error deleting category: " . $conn->error;
        exit();
    }
} else {
    // Handle other cases or show an error message
}
$conn->close();
?>
