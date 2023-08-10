

<!DOCTYPE html>
<html>
<head>
    <title>LibraTech</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/527006ca5f.js" crossorigin="anonymous"></script>
    <style>
        .header
{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 80px;
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
    align-items: center;
    justify-content: center;
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
    </style>
</head>
<body >

<section class="header">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    ?>

    <a href="#"> <img src="/lms/photos/logo.jpeg" class="logo" alt=""></a>

    <nav>
        <ul class="navBar">
        <li>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <a href="/lms/pages/books.php" class="activ">Home</a>
    <?php else : ?>
        <a href="/lms/index.php" class="activ">Home</a>
    <?php endif; ?>
</li>
            <li><a href="/lms/pages/library_books.php">Books</a></li>
            <li><a href="/lms/static/about.php" >About Us</a></li>
        <li><a href="/lms/static/contact.php" >Contact Us</a></li>
            <?php if (isset($_SESSION['user_id'])) : ?>
    <li><a href="/lms/pages/user_profile.php">My Profile</a></li>
<?php endif; ?>
        
        
            <?php
                            

                                echo '<li class="nav-item">';

                                if (isset($_SESSION['username'])) {
                                    echo '<a class="nav-link" href="/lms/user/logout.php">Logout</a>';
                                    } 
                                    else {
                                        echo '<a class="nav-link" href="/lms/user/login.php">Login</a>';
                                            }       

                                    echo '</li>';
                        ?>
           
        </ul>
    </nav>
</section>





</body>
</html>
