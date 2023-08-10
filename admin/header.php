



  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&family=Varela+Round&display=swap');
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Varela Round', sans-serif;

    

.header
{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 80px;
    background: #F2EEE3;
    box-shadow: rgb(200, 192, 192) 0px 1px 4px ;
    position: sticky;
    width: 100%;
    z-index: 999;
   
   
    top: 0%;
    left: 0;
}

.logo
{
    width: 60px;
    height: 60px;
}

.navBar 
{
    display: flex;
   
    justify-content: space-between;
}

.navBar li
{
    list-style: none;
    padding: 0px 20px ;
    position: relative;

}


.navBar li a
{
    text-decoration: none;
    color: black;
    font-weight: 600;
    font-size: 16px;
    transition: 0.4s;
}

.navBar li a:hover,
.navBar li a.activ
{
    color: #088178;
    
}


.navBar li a::after
{
    content: "";
    width: 0;
    height: 4px;
    background-color: #088178;
    position: absolute;
    bottom: -4px;
    left: 20px;
    transition: 1s ;

}
.navBar li a:hover::after
{
width: 50%;
}
}

img
{
    height: 30px;
    width: 50px;
    background-size: cover;

}

.left
{
    display: flex;
}

.mainDash
{
    width: 80vw;
    display: flex;
    justify-content: space-between;
}
.fas
{
    margin: 4px;
    width: 20px;
    height: 20px;
}

    </style>
</head>

<section class="header">



        <ul class="navBar">
          
            <div class="mainDash">

            <div class="left">
               
                <li><a href="/lms/admin/dashboard.php" class="activ">  <i class="fas fa-user-circle"></i>Admin Dashboard</a></li>
            </div>
            <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
        
        // Check if the session variables are set and have the desired values
        if (isset($_SESSION['username']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === "admin") {
          $userName = $_SESSION['admin_name'];
        
          // Display the welcome message with the username
         
        }
      ?>

            <li><h3><?php echo "Welcome, " . $userName;?></h3></li>
    
             <div class="right">
            <li><a href='../user/logout.php' class="logout-button"  >Logout <i class="fas fa-sign-out-alt"></i></a> </li>
             </div>
            
        </div>
        </ul>

    </section>

</body>
</html>
<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['user_type']) || $_SESSION['user_type'] !== "admin") {
  header("Location: ../user/login.php");
  exit();
}
?>