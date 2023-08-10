<style>
    .main-container{
        margin:0px;
        background-image: url(photos/bg.jpeg);
        background-position: bottom 0% right 100%;
       
        
    
    background-repeat: no-repeat;
    background-size: cover;

        
    }
.container {
    width: 100%; /* Set the width to 100vw to cover the viewport width */
    height:100vh;
    
    
    display: flex;
    align-items: center; /* Center the content vertically */
    justify-content: center; /* Center the content horizontally */
}

.mybuttons {
    display: flex; /* Add this to center the buttons horizontally */
}

a button {
    width: 150px;
    height: 50px;
    margin: 25vh 10px 10px 10px;
    border-radius: 15px;
    border:none;
    
    color: black;
    transition: 0.7s ease-in-out;
    background-color: #088178;
}

a button:hover {
    background-color: hsl(180, 70%, 35%);
    
    color: white;
}
</style>



<div>
    <?php include 'includes/header.php'; ?>

    <?php
if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] === "admin") {
      
      header("Location: /lms/admin/dashboard.php");
      exit();
    } else {
    
      header("Location: /lms/pages/books.php");
      exit();
    }
  } 
  ?>


    <div class="main-container">

    <div class="container">

    <div class="mybuttons"></div>
<a href="user/login.php"><button>Log In</button></a>

<a href="user/registration.php"><button>Sign Up</button></a>
    
</div>
</div>

    <?php include 'includes/footer.php'; ?>
</div>

