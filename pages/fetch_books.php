<?php
require_once '../includes/connection.php';

$sql = "SELECT * FROM books WHERE quantity_available > 0 
ORDER BY book_id LIMIT 4";
$result = $conn->query($sql);

$books = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert the blob data to base64 encoding for use in the <img> tag
        $base64Image = base64_encode($row['photo']);
        // Add the base64 encoded image data to the $row array
        $row['photo'] = 'data:image/jpeg;base64,' . $base64Image;
        $books[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($books);
?>
