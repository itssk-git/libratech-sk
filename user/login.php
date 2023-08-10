


<?php
    include '../includes/header.php';
?>

<?php

if(isset($_SESSION['username'])){
    if($_SESSION['user_type']=='admin'){
        
        header('location: /lms/admin/dashboard.php');
        exit();


    }
    else{
        header('location: /lms/pages/books.php');


    }
}

?>

<?php

if (isset($_GET['error'])) {
    $errorMessage = $_GET['error'];
} else {
    $errorMessage = ''; 
}
?>
<style>
    .msg{
        background-color:#f2EEE3;
        color:green;
    }
</style>



       <div class="msg">
       <?php 
  if(isset($_SESSION['status'])){
  echo $_SESSION['status'];
  unset($_SESSION['status']); }?>

       </div>


<style>
    .login-form {
    display: flex;
    flex-direction: column;
}
.login-form label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
}
.login-form input {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
}
.login-form button {
    padding: 10px;
    margin: -15px 5px 5px 5px;
    font-size: 18px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.login-form button:hover {
    background-color: #45a049;
}

.main-body {
    margin: 0;
    padding: 10px 0 10% 0;
    display: flex;
    justify-content: center;
    height: 100vh;
    background-color: #F2EEE3;
}

.login-form a button {
    padding: 10px;
    margin:5px;
    font-size: 18px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width:96%;
}
.login-form a button:hover {
    background-color: #45a049;
}
.login-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 50%;
    margin-top: 2%;
    
}

</style>

<div class="main-body">

<div class="login-container">
    <h2>Login</h2>
    <form  class="login-form" action="../includes/all_action.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
    <label for="user_type">Login As:</label><br>
    <input type="radio" name="user_type" value="admin"> Admin<br>
    <input type="radio" name="user_type" value="member" > Member<br>
</div>

            <p class="text-danger"><?php echo $errorMessage; ?></p>
            <button type="submit" name="login" class="btn btn-primary">Login</button> <br>
            
            <span>Dont have an account? <a href="registration.php" style="color:blue;">Sign Up</a></span>


        </form>
</div>



</div>


<?php
    include '../includes/footer.php';
?>