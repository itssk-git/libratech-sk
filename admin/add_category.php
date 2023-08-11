<?php include_once 'header.php'; ?>
<?php
include '../includes/connection.php';
?>

<?php
if (isset($_GET['b_id'])) {
    $categoryId = $_GET['b_id'];

    $query = "SELECT * FROM category WHERE category_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $category = $row['name'];
        $categoryId = $row['category_id'];
        

      
        
    } else {
        echo "Category not found.";
    }

    $stmt->close();
} 
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
    width:96%;
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
    margin-left: 2%;
    height:40vh;
    
}
.btn{
    width:25%;
}
table{
    border-collapse: collapse;
    width: 100%;
    border-radius: 10px;
    overflow: hidden; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
}


tr{
    
    height:50px;
  }
td, th {

  text-align: center;

}

.btn {
    --bs-btn-padding-x: 0.75rem;
    --bs-btn-padding-y: 0.375rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 0.7rem;
    --bs-btn-font-weight: 400;
    --bs-btn-line-height: 5.5px;
  }

</style>
<div class="main-container">

<div class="main-body">
    <div class="login-container">          
        <h2>Add Category</h2>
        <form class="login-form" action="../includes/all_action.php" method="POST">
            <div class="form-group">
                <label for="category">Category Name</label>
                <input type="hidden" name="c_id" value="<?php echo isset($categoryId) ? $categoryId : ''; ?>">
                <input type="text" class="form-control" id="category" name="category" value="<?php echo isset($category) ? $category : ''; ?>"required>
            </div>
            
            <?php
            if(isset($category)){
                echo '<button type="submit" name="update_category" style="margin-top: 20px;" class="button">Update</button>';
            }

            else{
                echo '<button type="submit" name="add_category" style="margin-top: 20px;" class="button"> Add </button>';
            }
            ?>
        </form>
    </div>

    <div class="container">



<?php
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result){


if ($result->num_rows > 0) {
    
    echo "<table class='table '>";
    echo "<tr>
            <th>S.N</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
            
          </tr>";

    $sn=1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$sn."</td>";
        echo "<td>".$row['name']."</td>";
        
        echo "<td>
        <a href='add_category.php?b_id=".$row['category_id']."' class='btn btn-success'>Edit</a>
      </td>";
      echo "<td>
      <a href='delete_category.php?b_id=".$row['category_id']."' onclick=\"return confirm('Are you sure you want to delete this category?');\" class='btn btn-danger'>Delete</a>
  </td>";
        
        
        echo "</tr>";
        $sn++;
    }

    
    echo "</table>";
} else {
    echo "No books found.";
}
}



?>
</div>

    

    
</div>

</div>















<?php
include ('../includes/footer.php');

?>

