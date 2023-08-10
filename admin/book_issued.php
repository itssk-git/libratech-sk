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
    $select_query = "SELECT issue.duedate, books.title, books.author, members.member_id, members.name, issue.status, issue.issue_date, issue.issue_id
    FROM books
    JOIN issue ON books.book_id = issue.book_id
    JOIN members ON issue.member_id = members.member_id
    WHERE issue.status = 'issued';";

    $result = $conn->query($select_query);

    if ($result) {
      if ($result->num_rows > 0) {
        echo "<h2>Book Issued</h2>";
        echo "<table class='table '>";
        echo "<tr>
                <th>S.N</th>
                <th>Member Name</th>
                <th>Member Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Issued Date</th>
                <th>Due Date</th>
                <th>Status</th>
              </tr>";

        $sn = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $sn . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['member_id'] . "</td>";
          echo "<td>" . $row['title'] . "</td>";
          echo "<td>" . $row['author'] . "</td>";
          echo "<td>" . $row['issue_date'] . "</td>";
          echo "<td>" . $row['duedate'] . "</td>";
          echo "<td>" . $row['status'] . "</td>";
          echo "</tr>";
          $sn++;
        }

        echo "</table>";
      } else {
        echo "No book issued found.";
      }
    }
    ?>
  </div>
</div>
