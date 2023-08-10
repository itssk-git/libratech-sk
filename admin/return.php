<?php
session_start();
include '../includes/connection.php';

$return_id = $_GET['return_id'];

$sql_get_details = "SELECT issue.book_id, issue.member_id, issue.duedate, borrowing.borrowing_id FROM issue
                    JOIN borrowing ON issue.borrowing_id = borrowing.borrowing_id
                    WHERE issue.issue_id = '$return_id' AND borrowing.status = 'approved'";

$result = $conn->query($sql_get_details);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $book_id = $row['book_id'];
    $member_id = $row['member_id'];
    $dueDate = $row['duedate'];

    $currentTimestamp = time(); // Get the current timestamp
$dueTimestamp = strtotime($dueDate); // Convert due date to timestamp

$fine = max(0, floor(($currentTimestamp - $dueTimestamp) / (60 * 60 * 24)) * 100);

    // Insert into fine table if fine is applicable
    if ($fine > 0) {
        $kathmandu_tz = new DateTimeZone('Asia/Kathmandu');
        $return_date = (new DateTime('now', $kathmandu_tz))->format('Y-m-d');
        
        $sql_insert_fine = "INSERT INTO fine (member_id, amount, paid_status, fine_date) VALUES ('$member_id', '$fine', 1, '$return_date')";
        if (!$conn->query($sql_insert_fine)) {
            echo "Error inserting into fine table: " . $conn->error;
            exit();
        }
    }

    // Update borrowing table to mark as returned
    $sql_update_borrowing = "UPDATE borrowing SET status = 'returned', return_date = '$return_date' WHERE borrowing_id = '".$row['borrowing_id']."'";
    if (!$conn->query($sql_update_borrowing)) {
        echo "Error updating borrowing status: " . $conn->error;
        exit();
    }

    // Update books table to increment quantity_available
    $sql_update_books = "UPDATE books SET quantity_available = quantity_available + 1 WHERE book_id = '$book_id'";
    if (!$conn->query($sql_update_books)) {
        echo "Error updating quantity available: " . $conn->error;
        exit();
    }

    // Update issue table to mark as returned
    $sql_update_issue = "UPDATE issue SET status = 'returned' WHERE issue_id = '$return_id'";
    if (!$conn->query($sql_update_issue)) {
        echo "Error updating issue status: " . $conn->error;
        exit();
    }

    header("Location: return_book.php");
    exit();
}

$conn->close();
?>
