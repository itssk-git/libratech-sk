<?php
include ('../includes/header.php');
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'user') {
    // Redirect to login.php
    header("Location: /lms/user/login.php");
    exit; // Make sure to add 'exit' after header() to stop further execution
  } 

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<link rel="stylesheet" href="/lms/pages/book_cards.css">
    <title>Book Cards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>
<body>

<div class="container mt-5" >
    

 
    <h1 >Currently Unavailable</h1>
        
        <?php
       
        require_once '../includes/connection.php';
        
        $sql = "SELECT * FROM books WHERE quantity_available=0";
        $books = $conn->query($sql);

        echo'<div class="row" id="bookCards">';
        


        foreach ($books as $book) {
            // Convert the BLOB data to base64 encoded string
            $base64Image = base64_encode($book['photo']);
           
        
            echo '<section id="book1" class="section-p1">';
            echo '<div class="book-container">';
            echo '<a href="#">';
            echo '<div class="book">';
            echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Book Photo">';
            echo '<div class="des">';
            echo '<span>' . $book['title'] . '</span>';
            echo '<h5>' . $book['author'] . '</h5>';
            echo '<h5 class="card-text">Genre: ' . $book['category'] . '</h5>';
            echo '</div>';
            echo '<div class="star">';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
          
        }
          echo' </div>';
          
        ?>
        



    </div>


<div class="container mt-5" >
    

 
    <h1 >Available Books For you</h1>
        
        <?php
       
        require_once '../includes/connection.php';
        
        $sql = "SELECT * FROM books WHERE quantity_available>0";
        $books = $conn->query($sql);

        echo'<div class="row" id="bookCards">';
        


        foreach ($books as $book) {
            // Convert the BLOB data to base64 encoded string
            $base64Image = base64_encode($book['photo']);
           
        
            echo '<section id="book1" class="section-p1">';
            echo '<div class="book-container">';
            echo '<a href="book_details.php?book_id=' . $book['book_id'] . '">';
            echo '<div class="book">';
            echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Book Photo">';
            echo '<div class="des">';
            echo '<span>' . $book['title'] . '</span>';
            echo '<h5>' . $book['author'] . '</h5>';
            echo '<h5 class="card-text">Genre: ' . $book['category'] . '</h5>';
            echo '</div>';
            echo '<div class="star">';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '<i class="fa fa-star"></i>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
          
        }
          echo' </div>';
          
        ?>
        



    </div>



    
</body>
</html>


<?php
include ('../includes/footer.php');

?>