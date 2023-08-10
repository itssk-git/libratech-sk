
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
  <a href="user_details.php">All Users</a>
  <?php 
  if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']); }
    
    
    if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']); }
  ?>
  <form class="d-flex" action="" method="GET">
    <input type="text" name="search_user" id="" placeholder="Search Users">
    <button class="button btn btn-success" name="search_btn"><i class="fas fa-search"></i></button>
  </form>
</div>
  

<?php

if (isset($_GET['search_btn'])) {
  $user = $_GET['search_user'];

  $sql = "SELECT * FROM members WHERE `name` LIKE '%$user%' AND approved = 1 AND type='user'";

  $result = $conn->query($sql);
}
else{
  $select_users = "SELECT * FROM members WHERE  approved=1 AND type='user'";


  $result = $conn->query($select_users);
}

if($result){


if ($result->num_rows > 0) {

    
    echo "<table class='table'>";
    echo "<tr>
            <th>SN</th>
            <th>Username</th>
           
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            
            <th>Join Date</th>
            
            <th>Edit</th>
            <th>Delete</th>
            
          </tr>";

    $sn=1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$sn."</td>";
        echo "<td>".$row['username']."</td>";
        
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['contact_number']."</td>";
        
        echo "<td>".$row['join_date']."</td>";
      
        echo "<td>
        <a href='../user/registration.php?m_id=".$row['member_id']."' class='btn btn-success'>Edit</a>
      </td>";
      echo "<td>
      <a href='../admin/delete_button.php?m_id=".$row['member_id']."' onclick=\"return confirm('Are you sure you want to delete this user?');\" class='btn btn-danger'>Delete</a>
  </td>";
  
        

        
        echo "</tr>";
        $sn++;
    }

    
    echo "</table>";
} else {
    echo "No users found.";
}
}



?>
</div>
</div>



