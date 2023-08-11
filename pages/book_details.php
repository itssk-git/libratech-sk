<?php
include '../includes/connection.php';
include '../includes/header.php';




// Check if session is not set or user_id is not 'user'
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'user') {
  // Redirect to login.php
  header("Location: /lms/user/login.php");
  exit; // Make sure to add 'exit' after header() to stop further execution
} 





// Check if product_id is set in the URL
if (isset($_GET['book_id'])) {
    // Get the product ID from the URL
    $product_id = $_GET['book_id'];

    // Fetch the book details using a SQL query
    $sql = "SELECT b.*, c.name AS category_name, p.name AS publisher_name
    FROM books AS b
  JOIN category AS c ON b.category_id = c.category_id
     JOIN publisher AS p ON b.publisher_id = p.publisher_id
      WHERE book_id = $product_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the book data as an associative array
        $book = mysqli_fetch_assoc($result);

        // Display the book details
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap');


*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Spartan' ,sans-serif;
}

/* body
{
    background-color: #cce7d0;
} */


.section-p1
{
    padding-left: 80px;
    padding-right: 80px;
    padding-bottom: 40px;
}


.section-p2
{
    padding: 40px 80px;
}


.section-m1
{
    margin: 40px 0;
}





/* .background
{
    width: 100%;
    height: 110vh;
    background-image: linear-gradient(rgba(247, 245, 245, 0.5),rgba(250, 249, 249, 0.75)), url(book_background.jpg);
    background-size: cover;
    background-position: center;
} */

/* Single_product */

#prodetails
{
    display: flex;
    
    
    margin-bottom: 0px;
    background-color:#f2eee3;
}

#prodetails .single-pro-image
{
    width: 35%;
    
    /* margin-right: 50%; */
    
}

#prodetails .single-pro-image img
{
    border-radius: 20px;
    margin-top: 15px;
    width: 80%;
    height: 70%;

}

#prodetails .single-pro-details h5
{
    /* margin-top: 5px; */
    font-size: 15px;
}

#prodetails .single-pro-details
{
    width: 60%;
    padding-top: 30px;
    padding-left: 70px;
    margin-right: 200px;
}

#prodetails .single-pro-details button i
{
    margin-right: 10px;
}

#prodetails .single-pro-details h4
{
    padding: 20px 2px 15px 0;
}

#prodetails .single-pro-details h2
{
    font-size: 26px;
}

#prodetails .single-pro-details h3
{
    margin-top: 30px;
    margin-bottom: 15px;
}

.wrapper
{
    height: 40px;
    width: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    border-radius: 12px;
    box-shadow: 0 5px 10px #aeadad;
    margin-bottom: 0;
}

.wrapper span
{
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: 600;
    cursor: pointer;
}

.wrapper span.num
{
    font-size: 15px;
    border-right: 2px solid #8f8f8f;
    border-left: 2px solid #9b9b9b;
    pointer-events: none;
}

#prodetails .single-pro-details span
{
    line-height: 25px;
}

#prodetails .single-pro-image a
{
     color: #000;
     text-decoration: none;
}

#prodetails .single-pro-image h5
{
    margin-left: 10px;
}

#prodetails .single-pro-image a:nth-child(1):hover
{
     color: #653a05;
}


#prodetails .single-pro-details a:nth-child(3):hover
{
     color: #866e03;
}

#prodetails .single-pro-details  button
{
    background: #94783b;
    color: #fff;
    height: 7vh;
    margin-right: 5px;
    margin-top: 20px;
    width: 30%;
    margin-bottom: 0;
}

#prodetails .single-pro-image button input
{
    justify-content: space-between;
}

#prodetails .single-pro-details button.request
{
    background: #088178;
    width: 30%;
    border:none;
    border-radius:10px;
}

#prodetails .single-pro-details button:hover
{
    background: hsl(180, 70%, 35%);
}


#prodetails .single-pro-details .input-group input
{
    height: 5vh;
    width: 15%;
}

#prodetails .single-pro-details .input-group input:focus
{
    outline: none;
}

#prodetails .single-pro-details .input-group .input-group-text
{
    border: 1px solid #a5a5a5;
    border-radius: 2px;
    padding: 9px;
    background-color: #d3d3d7;
}
#prodetails .single-pro-details p,
#prodetails .single-pro-details h4
{
    margin-top: 0;
    margin-bottom: 0;
}

#prodetails .single-pro-details .mainOther
{
    margin-top: 0px;
}

#prodetails .single-pro-details h4,
#prodetails .single-pro-details p
{
    margin-bottom: 0;
}

/* Other info */
#prodetails .other
{
    justify-content: space-between;
}

#prodetails .other .smallBox
{
    display: flex;
    justify-content: space-between;
}

#prodetails .other .smallBox .otherInfo
{
    text-align: center;
}

#prodetails .other .smallBox .otherInfo
{
    width: 25%;
    min-width: 80px;
    padding: 10px 20px;
    border: 1px solid #a1a1a1;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.02);
    background-color: #e8e8e8;
}

#prodetails .other .smallBox .otherInfo:nth-child(2),
#prodetails .other .smallBox .otherInfo:nth-child(3),
#prodetails .other .smallBox .otherInfo:nth-child(4)
{
    margin-left: 10px;
}

#prodetails .other .smallBox .otherInfo p,
#prodetails .other .smallBox .otherInfo i

{
    margin-bottom: 6px;
    margin-top: 2px;
}

#prodetails .other .smallBox .otherInfo h5
{
    text-align: center;
    margin-top: 3px;
}
.star{
    margin: 10px 0px 0px 85px;
}




</style>



<section id="prodetails" class="section-p2 background">
    <div class="single-pro-image">
        <h5><a href="./Book.php">Book / <?= htmlspecialchars($book['title']) ?></a></h5>
        <!-- Add echo statement to display the base64-encoded image data -->
        <?php
         $base64Image = base64_encode($book['photo']);
         // Add the base64 encoded image data to the $book array
         $book['photo'] = 'data:image/jpeg;base64,' . $base64Image;

        ?>
        <img src="<?= $book['photo'] ?>" alt="Book Photo">
        
        
    </div>

    <div class="single-pro-details">
        <h2><?= $book['title'] ?></h2>
        <p class="h5" style="font-weight:200; font-size:15px">By: <?= $book['author'] ?></p>
        <p class="h5" style="font-weight:200; font-size:15px">Genre: <?= $book['category_name'] ?></p>
        <p class="h5" style="font-weight:200; font-size:15px">Publisher: <?= $book['publisher_name'] ?></p>
        <form action="book_reserve.php" method="get">

  <input type="hidden" name="book_id" value="<?= $book['book_id']; ?>">

  <button type="submit" class="request"><i class="fas fa-book-open"></i>Reserve</button>
</form>

        <h4>About the Book</h4>
        <span><?= $book['description'] ?></span>
    </div>
</section>


<?php
    } else {
        echo "Book not found.";
    }
} else {
    echo "Product ID not provided in the URL.";
}

// Close the database connection
mysqli_close($conn);

include '../includes/footer.php';
?>
