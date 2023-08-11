
<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../user/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>LibraTech</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<style>
    /*  import google fonts */
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&family=Varela+Round&display=swap');

*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: 'Varela Round', sans-serif;
}
body{
  background: #dfe9f5;
}
.container{
  display: flex;
}
nav{
  position: relative;
  top: 0;
  bottom: 0;
  height: 100vh;
  left: 0;
  background: #fff;
  width: 280px;
  overflow: hidden;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.logo{
  text-align: center;
  display: flex;
  margin: 10px 0 0 10px;
}
.logo img{
  width: 45px;
  height: 45px;
  border-radius: 50%;
}
.logo span{
  font-weight: bold;
  padding-left: 15px;
  font-size: 18px;
  text-transform: uppercase;
}
a{
  position: relative;
  color: rgb(85, 83, 83);
  font-size: 14px;
  display: table;
  width: 280px;
  padding: 10px;
}
nav .fas{
  position: relative;
  width: 70px;
  height: 40px;
  top: 14px;
  font-size: 20px;
  text-align: center;
}
.nav-item{
  position: relative;
  top: 12px;
  margin-left: 10px;
}
a:hover{
  background: #eee;
}
.logout{
  position: absolute;
  bottom: 0;
}

.main{
  position: relative;
  padding: 20px;
  width: 100%;
}
.main-top{
  display: flex;
  width: 100%;
}
.main-top i{
  position: absolute;
  right: 0;
  margin: 10px 30px;
  color: rgb(110, 109, 109);
  cursor: pointer;
}
.main-skills{
  display: flex;
  margin-top: 20px;
}
.main-skills .card{
  width: 25%;
  margin: 10px;
  background: #fff;
  text-align: center;
  border-radius: 20px;
  padding: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.main-skills .card h3{
  margin: 10px;
  text-transform: capitalize;
}
.main-skills .card p{
  font-size: 12px;
}
.main-skills .card button{
  background: orangered;
  color: #fff;
  padding: 7px 15px;
  border-radius: 10px;
  margin-top: 15px;
  cursor: pointer;
}
.main-skills .card button:hover{
  background: rgba(223, 70, 15, 0.856);
}
.main-skills .card i{
  font-size: 22px;
  padding: 10px;
}

/* Courses */
.main-course{
  margin-top:20px ;
  text-transform: capitalize;
}
.course-box{
  width: 100%;
  height: 300px;
  padding: 10px 10px 30px 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.course-box ul{
  list-style: none;
  display: flex;
}
.course-box ul li{
  margin: 10px;
  color: gray;
  cursor: pointer;
}
.course-box ul .active{
  color: #000;
  border-bottom: 1px solid #000;
}
.course-box .course{
  display: flex;
}
.box{
  width: 33%;
  padding: 10px;
  margin: 10px;
  border-radius: 10px;
  background: rgb(235, 233, 233);
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.box p{
  font-size: 12px;
  margin-top: 5px;
}
.box button{
  background: #000;
  color: #fff;
  padding: 7px 10px;
  border-radius: 10px;
  margin-top: 3rem;
  cursor: pointer;
}
.box button:hover{
  background: rgba(0, 0, 0, 0.842);
}
.box i{
  font-size: 7rem;
  float: right;
  margin: -20px 20px 20px 0;
}
.html{
  color: rgb(25, 94, 54);
}
.css{
  color: rgb(104, 179, 35);
}
.js{
  color: rgb(28, 98, 179);
}
  

</style>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="dashboard.php" class="logo">
          <img src="/lms/photos/logo.jpeg" alt="">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a href="#">
            <i class="fas fa-circle-user"></i>
          <span class="nav-item">
            <?php
            
             if (isset($_SESSION['username']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === "admin")if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === "admin") {
              $adminName = $_SESSION['admin_name'];
              
              echo $adminName;
             }



            ?>
           
          </span>
        </a></li>

        <li><a href="dashboard.php">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a></li>

        <li><a href="add_category.php">
          <i class="fas fa-book"></i>
          <span class="nav-item">Add Category</span>
        </a></li>
        <li><a href="add_books.php">
          <i class="fas fa-book"></i>
          <span class="nav-item">Add Books</span>
        </a></li>
        <li><a href="add_publisher.php">
            <i class="fas fa-book"></i>
          <span class="nav-item">Add Publisher</span>
        </a></li>
        <li><a href="return_book.php">
          <i class="fas fa-thumbs-up"></i>
          <span class="nav-item">Returned</span>
        </a></li>
        

        <li><a href="../user/logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1> Management</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
        <div class="card">
            <i class="fa-solid fa-book" style="color: #000000;"></i>
          <h3>Add Books</h3>
          <p>Add available books </p>
          <button onclick="window.location.href = 'add_books.php';">Add Books</button>
        </div>
        <div class="card">
            <i class="fa-solid fa-user" style="color: #000000;"></i>
          <h3>New Member Request</h3>
          <p>Member request list and information </p>
          <button onclick="window.location.href = 'new_members.php';">Show </button>
        </div>
        <div class="card">
            <i class="fa-solid fa-id-card" style="color: #05070a;"></i>
          <h3>Books Issued</h3>
          <p>Books Issued Information</p>
          <button onclick="window.location.href = 'book_issued.php';">Issued Books</button>
        </div>
        <div class="card">
            <i class="fa-solid fa-book-open-reader" style="color: #000000;"></i>
          <h3>Books Reserve</h3>
          <p>Books Reserve infromation</p>
          <button onclick="window.location.href = 'requested_book.php';">Books Reserve</button>
        </div>
      </div>

      <section class="main-course">
        <h1>Information</h1>
        <div class="course-box">
          
          <div class="course">
            <div class="box">
              <h3>Available Books</h3>
              <p>look for books available</p>
              <button onclick="window.location.href = 'show_books.php';">continue</button>
              <i class="fas fa-user-cog"></i>
            </div>
            <div class="box">
              <h3>Registered User</h3>
              <p>Look for registered users</p>
              <button onclick="window.location.href = 'user_details.php';">continue</button>
              <i class="fas fa-user"></i>
            </div>
            <div class="box">
              <h3>Fine</h3>
              <p>30% - progress</p>
              <button onclick="window.location.href = '';">continue</button>
              <img src="./fine.jpg" alt="">
            </div>
          </div>
        </div>
      </section>
   
    </section>
  </div>
</body>
</html>
