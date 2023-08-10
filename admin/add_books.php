<?php include_once 'header.php'; ?>
<?php
include '../includes/connection.php';
?>

<style>
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
    height: 157vh;
    background-color: #F2EEE3;
}

.login-form a button {
    padding: 10px;
    margin:5px;
    font-size: 18px;
    background-color: #088178;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width:96%;
}
.login-form a button:hover {
    background-color: hsl(180, 70%, 35%);
}
.login-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 50%;
    margin-top: 2%;
    height:150vh;
    
}
.btn{
    width:25%;
}
</style>
<?php
$query = "SELECT * FROM books WHERE book_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_GET['b_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();


if (isset($_GET['b_id'])) {
    
    $bookId = $_GET['b_id'];
   
    $_SESSION['b_id'] = $bookId; 

    
    $bookId = $row['book_id'];
    $title = $row['title'];
    $author = $row['author'];
    $pub_date = $row['publication_date'];
    $isbn = $row['ISBN'];
    $quantity = $row['quantity_available'];
    $category = $row['category'];
    $photo=$row['photo'];
    $description=$row['description'];
  
    
    $buttonLabel = 'Update';
    $formAction = 'all_action.php?id=' . $bookId;
} 

}
?>
<div class="main-body">
    <div class="login-container">          
        <h2>Add Books</h2>
        <form class="login-form" action="../includes/all_action.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($title) ? $title : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo isset($author) ? $author : ''; ?>" required>
                
            </div>
            <div class="form-group">
    <label for="category">Genre</label>
    <div class="form-check">
    <input type="radio" class="" id="fiction" name="category" value="Fiction" <?php echo isset($category) && $category === 'Fiction' ? 'checked' : ''; ?> required>
<label class="form-check-label" for="fiction">Fiction</label>
<input type="radio" class="" id="non-fiction" name="category" value="Non-Fiction" <?php echo isset($category) && $category === 'Non-Fiction' ? 'checked' : ''; ?>>
<label class="form-check-label" for="non-fiction">Non-Fiction</label>
    </div>
    <div class="form-check">
        
    </div>
    
</div>

            <div class="form-group">
                <label for="p_date">Publication Date</label>
                <input type="text" class="form-control" id="p_date" name="p_date" value="<?php echo isset($pub_date) ? $pub_date : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo isset($isbn) ? $isbn : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo isset($quantity) ? $quantity : ''; ?>" required>
            </div>

            <div class="form-group">

                    <label for="description">Description:</label>
                  <textarea name="description" class="form-control" id="description" value="<?php echo isset($description) ? $description : ''; ?>" name="description" rows="5" cols="50" placeholder="Give Description" ></textarea>
                
            </div>
            <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*">
</div>
            <?php
            if(isset($bookId)){
                echo '<button type="submit" name="update_books" style="margin-top: 20px;" class="btn">' . $buttonLabel . '</button>';
            }

            else{
                echo '<button type="submit" name="add_books" style="margin-top: 20px;" class="btn"> Add </button>';
            }
            ?>

            

        </form>
    </div>
        </div>
        </div>

<?php
include ('../includes/footer.php');

?>

