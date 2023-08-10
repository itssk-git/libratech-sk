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
    
   
    
    body{
    font-family: 'Varela Round', sans-serif !important;
  }
  .btn {
    --bs-btn-padding-x: 0.75rem;
    --bs-btn-padding-y: 0.375rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 0.7rem;
    --bs-btn-font-weight: 400;
    --bs-btn-line-height: 5.5px;
  }
  .alert{
    height:15px;
  }
  table{
   margin:10px 0px 10px
  }
  body{
    background-color:whitesmoke;
  }
 
  .container
  {
     display:flex;
     flex-direction:column;
     justify-content:space-between;
  }

  

  

  tr{
    
    height:50px;
  }
  td, th {
  text-align: center;

}
input{
  text-align: center;
  border:0.2px solid grey;
  border-radius:15px;
}



  </style>
  <div class="main">
    <div class="container">
      <p style="color:red;">
        <?php
        if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      
      }
        

        ?>
      </p>


      <?php


$select_query = "SELECT issue.duedate, issue.issue_id, books.title, books.author, members.member_id, members.name, issue.status, issue.issue_date
FROM books
JOIN borrowing ON books.book_id = borrowing.book_id
JOIN issue ON borrowing.borrowing_id = issue.borrowing_id
JOIN members ON borrowing.member_id = members.member_id
WHERE issue.status = 'issued'
ORDER BY members.name ASC";

$result = $conn->query($select_query);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<h2>Book Issued</h2>";
        echo "<table class='table'>";
        echo "<tr>
                <th>S.N</th>
                <th>Member Name</th>
                <th>Member Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Issued Date</th>
                <th>Due Date</th>
                <th>Fine</th>
                <th>Return</th>
              </tr>";

        $sn = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$sn."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['member_id']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['author']."</td>";
            echo "<td>".$row['issue_date']."</td>";
            echo "<td>".$row['duedate']."</td>";
            $currentTimestamp = time();
            $dueTimestamp = strtotime($row['duedate']);
            
            if ($currentTimestamp > $dueTimestamp) {
                $timeDifference = $currentTimestamp - $dueTimestamp;
                $daysDifference = floor($timeDifference / (60 * 60 * 24));
                $fine = 100 * $daysDifference;
            } else {
                $fine = 0;
            }
            

            echo "<td";
            if ($fine > 0) {
                echo " style='color:red;'";
            }
            echo ">";
            if ($fine > 0) {
                echo $fine;
            } else {
                echo "<span style='color:green;'>No fines</span>";
            }
            echo "</td>";

            echo "<td>";
            if ($fine > 0) {
                echo "<a href='return.php?return_id=".$row['issue_id']."' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to return?\");'>Return</a>";
            } else {
                echo "<a href='return.php?return_id=".$row['issue_id']."' class='btn btn-success' onclick='return confirm(\"Are you sure you want to return?\");'>Return</a>";
            }
            echo "</td>";

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



