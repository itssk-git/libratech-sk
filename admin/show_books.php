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

  .d-flex 
  {
    margin:10px 0;
    
  }

  
  .d-flex a
  {
    
    color:#088178;
    font-weight: 700px;
    font-size:20px;
    text-decoration:none;
  }
  .d-flex a:hover
  {
    
    color:hsl(180, 70%, 35%);
    
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

.button{
  height:30px;
  border-radius:20px;
  margin-left:5px;

}
  </style>
  <div class="main">
    <div class="container">
<div class=" d-flex justify-content-between" role="alert">
  <a href="show_books.php">All Books</a>
  <?php 
  if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
  }

  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
  <form class="d-flex" action="" method="GET">
    <input type="text" name="search_book" id="" placeholder="Search Books">
    <button class="button btn btn-success" name="search_btn"><i class="fas fa-search"></i></button>
  </form>
</div>


<?php
if (isset($_GET['search_btn'])) {
  $book = $_GET['search_book'];

  $sql = "SELECT * FROM books WHERE title LIKE '%$book%'";
  $result = $conn->query($sql);
}
else{
$select_books = "SELECT * FROM books";


$result = $conn->query($select_books);
}
if($result){


if ($result->num_rows > 0) {
    
    echo "<table class='table '>";
    echo "<tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Author</th>
           
            <th>Quantity Available</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>";

    $sn=1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$sn."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['author']."</td>";
      
        echo "<td>".$row['quantity_available']."</td>";
        echo "<td>".$row['category']."</td>";
       
        echo "<td>
        <a href='add_books.php?b_id=".$row['book_id']."' class='btn btn-success'>Edit</a>
      </td>";
      echo "<td>
      <a href='delete_button.php?b_id=".$row['book_id']."' onclick=\"return confirm('Are you sure you want to delete this book?');\" class='btn btn-danger'>Delete</a>
  </td>";
        
        
        echo "</tr>";
        $sn++;
    }

    
    echo "</table>";
} else {
    echo "No books found.";
}
}



?>
</div>
  </div>





