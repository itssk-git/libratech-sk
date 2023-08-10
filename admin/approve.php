<?php
include '../includes/connection.php';
session_start();

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    // First, check if the quantity_available is greater than 0 in the books table
    $sql_check_quantity = "SELECT book_id FROM books WHERE book_id IN (SELECT book_id FROM borrowing WHERE borrowing_id = $request_id) AND quantity_available > 0";
    $result_check_quantity = $conn->query($sql_check_quantity);

    if ($result_check_quantity->num_rows > 0) {
        $sql_update = "UPDATE borrowing SET status = 'approved' WHERE borrowing_id = $request_id";

        if ($conn->query($sql_update) === TRUE) {
            $sql_request = "SELECT book_id, member_id FROM borrowing WHERE borrowing_id = $request_id";
            $result_request = $conn->query($sql_request);

            if ($result_request->num_rows > 0) {
                $row = $result_request->fetch_assoc();
                $book_id = $row['book_id'];
                $member_id = $row['member_id'];

                // Get the current date and time
                $issue_date = date('Y-m-d H:i:s');

                // Add 30 days to the issue date
                $due_date = date('Y-m-d H:i:s', strtotime($issue_date . ' +30 days'));

                // Convert issue_date and due_date to the appropriate format for the database
                $issue_date_db = (new DateTime($issue_date))->format('Y-m-d H:i:s');
                $due_date_db = (new DateTime($due_date))->format('Y-m-d H:i:s');

                // Insert the record into the issue table
                $sql_issue = "INSERT INTO issue (book_id, member_id, issue_date, status, duedate, borrowing_id)
                             VALUES ('$book_id', '$member_id', '$issue_date_db', 'issued', '$due_date_db', '$request_id')";

                if ($conn->query($sql_issue) === TRUE) {
                    // After inserting into issue table, update the books table to decrement quantity_available by 1
                    $sql_update_quantity = "UPDATE books SET quantity_available = quantity_available - 1 WHERE book_id = $book_id";
                    if ($conn->query($sql_update_quantity) === TRUE) {
                        header('location:requested_book.php');
                    } else {
                        echo "Error updating quantity_available in books table: " . $conn->error;
                    }
                } else {
                    echo "Error inserting record into issue table: " . $conn->error;
                }
            } else {
                echo "Invalid request_id or request not found.";
            }
        } else {
            echo "Error updating request status: " . $conn->error;
        }
    } else {
        // Quantity not available, set session message and redirect
        $_SESSION['message'] = 'The book is currently not available in stock.';
        header('location:requested_book.php');
    }
}
?>
