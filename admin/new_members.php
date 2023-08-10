<?php
include '../includes/connection.php';
?>

<?php include_once 'header.php'; 
?>
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




  

<?php

  $select_users = "SELECT * FROM members where approved=0";


  $result = $conn->query($select_users);


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
            <th>UserType</th>
            <th>Approve</th>
            <th>Reject</th>
            
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
        echo "<td>".$row['type']."</td>";
        echo "<td>
        <a href='approve_members.php?m_id=".$row['member_id']."' class='btn btn-success'>Approve</a>
      </td>";
      echo "<td>
      <a href='reject_member.php?m_id=".$row['member_id']."' onclick=\"return confirm('Are you sure you want to reject this user?');\" class='btn btn-danger'>Reject</a>
  </td>";
  
        

        
        echo "</tr>";
        $sn++;
    }

    
    echo "</table>";
} else {
    echo "No new member request found.";
}
}



?>
</div>
</div>
