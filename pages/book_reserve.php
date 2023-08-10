<?php
include '../includes/connection.php';
session_start();

// Check if the member has at least one issued book or one pending request
$sql_check_existing = "SELECT COUNT(*) AS count FROM (SELECT 1 AS count FROM borrowing WHERE member_id = $_SESSION[user_id] AND status = 'approved' 
UNION ALL 
SELECT 1 AS count FROM borrowing WHERE member_id = $_SESSION[user_id] AND status = 'pending') AS subquery";

$result_check_existing = $conn->query($sql_check_existing);
if ($result_check_existing) {
    $row_count = $result_check_existing->fetch_assoc();
    if ($row_count['count'] > 0) {
        $_SESSION['message2'] = 'You already have an issued book or pending request. Cannot reserve another book.';
        header('location:books.php');
        exit();
    }
}

if (isset($_GET['book_id'])) {
    $id = $_GET['book_id'];
    $user_id = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Kathmandu');
    $currentDate = date('Y-m-d H:i:s');

    
    $sql = "INSERT INTO borrowing (member_id, book_id, reserve_date, status) VALUES ('$user_id', '$id', '$currentDate', 'pending')";
    if ($conn->query($sql)) {
        $_SESSION['message1'] = 'Book reserved successfully!';
        header('location:books.php');
        exit();
    } else {
        echo "Error inserting record: " . $conn->error;
    }
} else {
    echo "Not Inserted";
}
?>
