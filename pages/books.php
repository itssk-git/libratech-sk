

<?php
include ('../includes/header.php');

?>
<?php



// Check if session is not set or user_id is not 'user'
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'user') {
  // Redirect to login.php
  header("Location: /lms/user/login.php");
  exit; // Make sure to add 'exit' after header() to stop further execution
} 



?>

<?php
    
    // Check if there is a session message
    if (isset($_SESSION['message1'])) {
        // Display the message with the class for green color
        echo '<p class="success-message">' . $_SESSION['message1'] . '<p>';

        // Unset the session message to avoid displaying it again on future visits
        unset($_SESSION['message1']);
    }
    ?>
    <?php
    
    // Check if there is a session message
    if (isset($_SESSION['message2'])) {
        // Display the message with the class for green color
        echo '<p class="error-message">' . $_SESSION['message2'] . '<p>';

        // Unset the session message to avoid displaying it again on future visits
        unset($_SESSION['message2']);
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
    

    <div class="container mt-5">
    <h1 >Books For you</h1>
        <div class="row" id="bookCards"></div>
    </div>

    <!-- Link to Bootstrap JS and jQuery (required for AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
       $(document).ready(function() {
    // Fetch book data using AJAX
    $.ajax({
        url: 'fetch_books.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Populate cards with book data
            var bookCardsContainer = $('#bookCards');
            for (var i = 0; i < response.length; i++) {
                var book = response[i];
                var cardHtml = `
                    <section id='book1' class='section-p1'>
                    
                            
                    
                    
                        <div class="book-container">
                        <a href="book_details.php?book_id=${book.book_id}">
                        <div class="book">

                            <img src="${book.photo}"  alt="Book Photo">
                            <div class="des">
                                <span >${book.title}</span>
                                <h5 >${book.author}</p>
                                <h5 class="card-text">Genre: ${book.category_name}</h5>
                                
                            </div>
                            
                        </a>
                           
                        </div>
                        </div>
                    </section>`;
                bookCardsContainer.append(cardHtml);

               
               
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});

    </script>
</body>
</html>
<?php
include ('../includes/footer.php');

?>