<?php
include '../includes/connection.php';
session_start();

if (isset($_GET['m_id'])) {
  $m_id = $_GET['m_id'];
  $sql = "DELETE FROM members WHERE member_id = '$m_id'";
  if ($conn->query($sql)) {
    $_SESSION['msg'] = 'Member Deleted Successfully';
    header('Location:../admin/user_details.php');
    exit();
  } else {
    $_SESSION['msg'] = 'Delete Failed';
    header('Location:../admin/user_details.php');
    exit();
  }
}

if (isset($_GET['b_id'])) {
  $b_id = $_GET['b_id'];
  $sql = "DELETE FROM books WHERE book_id = '$b_id'";
  if ($conn->query($sql)) {
    $_SESSION['msg'] = 'Book Deleted Successfully';
    header('Location:../admin/show_books.php');
    exit();
  } else {
    $_SESSION['msg'] = 'Delete Failed';
    header('Location:../admin/show_books.php');
    exit();
  }
}
?>
