<?php
include '../includes/connection.php';
?>
<?php include_once 'header.php'; ?>
<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['user_type']) || $_SESSION['user_type'] !== "admin") {
  header("Location: ../user/login.php");
  exit();
}
?>

<style>
  body {
    font-family: 'Varela Round', sans-serif !important;
    background-color: whitesmoke;
  }

  .btn {
    --bs-btn-padding-x: 0.75rem;
    --bs-btn-padding-y: 0.375rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 0.7rem;
    --bs-btn-font-weight: 400;
    --bs-btn-line-height: 5.5px;
  }

  .alert {
    height: 15px;
  }

  table {
    margin: 10px 0px 10px;
  }

  .container {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  tr {
    height: 50px;
  }

  td, th {
    text-align: center;
  }

  input {
    text-align: center;
    border: 0.2px solid grey;
    border-radius: 15px;
  }
</style>

<div class="main">
  <div class="container">
    <?php
    $select_query = "SELECT books.title, books.author, members.name, borrowing.status, borrowing.reserve_date, borrowing.borrowing_id
    FROM books
    JOIN borrowing ON books.book_id = borrowing.book_id
    JOIN members ON borrowing.member_id = members.member_id
    WHERE borrowing.status = 'pending';";

    $result = $conn->query($select_query);

    if ($result) {
      if ($result->num_rows > 0) {
        if (isset($_SESSION['message'])) {
          echo "<p style='color: red;'>";
          echo $_SESSION['message'];
          echo "</p>";
          unset($_SESSION['message']); // Clear the session message after displaying
        }

        echo "<h2>Book Borrowing Requests</h2>";
        echo "<table class='table '>";
        echo "<tr>
                <th>S.N</th>
                <th>Member Name</th>
                <th>Title</th>
                <th>Author</th>
                <th>Reserve Date</th>
                <th>Status</th>
                <th></th>
                <th></th>
              </tr>";

        $sn = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $sn . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['title'] . "</td>";
          echo "<td>" . $row['author'] . "</td>";
          echo "<td>" . $row['reserve_date'] . "</td>";
          echo "<td>" . $row['status'] . "</td>";
          echo "<td>
                <a href='approve.php?request_id=" . $row['borrowing_id'] . "' class='btn btn-success'>Approve</a>
              </td>";
          echo "<td>
                <a href='reject.php?request_id=" . $row['borrowing_id'] . "' onclick=\"return confirm('Are you sure you want to reject?');\" class='btn btn-danger'>Reject</a>
              </td>";
          echo "</tr>";
          $sn++;
        }

        echo "</table>";
      } else {
        echo "No book borrowing requests found.";
      }
    }
    ?>
  </div>
</div>