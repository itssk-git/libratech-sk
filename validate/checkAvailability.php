<?php
include '../includes/connection.php';

if (!empty($_POST['user_name'])) {
    $username = $_POST['user_name'];

    $query = "SELECT * FROM members WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }
}




if (!empty($_POST['a_email'])) {
    $email = $_POST['a_email'];

    $query = "SELECT * FROM members WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }
}




if (!empty($_POST['a_contact'])) {
    $contact = $_POST['a_contact'];

    $query = "SELECT * FROM members WHERE contact_number = '$contact'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }
}
?>