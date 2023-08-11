<?php
require_once '../includes/connection.php';

$sql = "SELECT b.*, c.name AS category_name, p.name AS publisher_name
        FROM books AS b
      JOIN category AS c ON b.category_id = c.category_id
         JOIN publisher AS p ON b.publisher_id = p.publisher_id
        WHERE b.quantity_available > 0 
        ORDER BY b.book_id LIMIT 4";

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
