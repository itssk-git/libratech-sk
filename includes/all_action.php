<?php
include 'connection.php';
?>
<?php
if(isset($_POST['register'])){
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['confirm_password'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $number=$_POST['contact_number'];
    $joinDate = date('Y-m-d H:i:s');
    

    

    $sql = "INSERT INTO members (member_id,username, password, name, address, contact_number, email, join_date,type,approved)
        VALUES ('','$username', '$password', '$name', '$address', '$number', '$email', '$joinDate','user','')";

if($conn-> query($sql)){
    $_SESSION['status']='User Registration Successful! Your registration is pending approval by an admin.';
    header('Location: ../user/login.php');    

}
else{
    $_SESSION['status']='Register Failed';
    header('Location: ../user/login.php');    

}
   

    
    
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; // Get the selected user type

    if ($user_type === 'admin') {
        // Check in the admin table
        $admin_sql = "SELECT * FROM admin WHERE username = '$username' AND BINARY password = '$password'";
        $admin_result = $conn->query($admin_sql);

        if ($admin_result->num_rows > 0) {
            $result = $admin_result->fetch_assoc();
            
            // Session handling for admin
            session_start();
            $_SESSION['admin_id'] = $result['admin_id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['admin_name'] = $result['name'];
            $_SESSION['user_type'] = 'admin';

            header('Location: ../admin/dashboard.php'); // Redirect to admin dashboard
            exit();
        }
    } elseif ($user_type === 'member') {
        // Check in the members table
        $members_sql = "SELECT * FROM members WHERE username = '$username' AND BINARY password = '$password' AND approved = 1";
        $members_result = $conn->query($members_sql);

        if ($members_result->num_rows > 0) {
            $result = $members_result->fetch_assoc();
            
            // Session handling for members
            session_start();
            $_SESSION['username'] = $result['username'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['user_id'] = $result['member_id'];
            $_SESSION['user_type'] = 'user';

            header('Location: ../pages/books.php'); // Redirect to member dashboard
            exit();
        }
    }

    header('Location: ../user/login.php?error=Invalid credentials');
    exit();
    
    $conn->close();
}















if (isset($_POST['add_books'])) {
    session_start();
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $p_date = $_POST['p_date'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $photo = $_FILES['image']['tmp_name'];
    $photoContent = file_get_contents($photo);

    $insertBookQuery = "INSERT INTO books (title, author, category_id, publisher_id, publication_date, ISBN, quantity_available, description, photo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertBookQuery);
    $stmt->bind_param("ssiiisiss", $title, $author, $category, $publisher, $p_date, $isbn, $quantity, $description, $photoContent);

    if ($stmt->execute()) {
        $_SESSION['status'] = 'Book Added Successfully';
        header('Location:../admin/show_books.php');
        exit();
    } else {
        $_SESSION['status'] = 'Adding Failed: ' . $stmt->error;
        header('Location:../admin/show_books.php');
        exit();
    }

    $stmt->close();
}

$conn->close();






if(isset($_POST['update_user'])){
    session_start();
    $userId = $_SESSION['id'] ;
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['confirm_password'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $number=$_POST['contact_number'];
    $joinDate = date('Y-m-d H:i:s');
    
    

    if($password!=$cpassword){
        die("Password did not match");
    }

    $sql = "UPDATE members SET username = '$username', name = '$name', address = '$address', contact_number = '$number', email = '$email' WHERE member_id = $userId";
    

    if($conn-> query($sql)){
        $_SESSION['status']='Updated Sucessfully';
        header('Location:../admin/user_details.php');

    }
   

    
    
}









if (isset($_POST['update_books'])) {
    include 'connection.php';
    session_start();
    $bookId = $_POST['b_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category_id = $_POST['category'];
    $publisher_id = $_POST['publisher'];
    $pub_date = $_POST['p_date'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $description = mysqli_real_escape_string($conn, $description);

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $imageFileName = $_FILES['image']['name'];
        $targetDir = "../images/"; // Specify your target directory
        $targetFilePath = $targetDir . $imageFileName;

        // Move uploaded image to target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Image uploaded successfully, proceed with update
            $imageUploadStatus = "success";
        } else {
            // Error uploading image
            $imageUploadStatus = "error";
            $_SESSION['status'] = 'Image upload failed';
            header('Location:../admin/show_books.php');
            exit();
        }
    } else {
        // No new image uploaded
        $imageUploadStatus = "no_image";
    }

    // Construct the SQL query
    $sql = "UPDATE books 
            SET title='$title', author='$author', category_id='$category_id', publisher_id='$publisher_id', publication_date='$pub_date', ISBN='$isbn', quantity_available='$quantity', description='$description'";
    
    if ($imageUploadStatus === "success") {
        $sql .= ", image='$imageFileName'";
    }
    
    $sql .= " WHERE book_id='$bookId'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = 'Book Updated Successfully';
        header('Location:../admin/show_books.php');
        exit();
    } else {
        $_SESSION['status'] = 'Update Failed: ' . $conn->error;
        header('Location:../admin/show_books.php');
        exit();
    }
}















if (isset($_POST['add_category'])) {
    include 'connection.php';
    $categoryName = $_POST['category'];

    $insertQuery = "INSERT INTO Category (name) VALUES (?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("s", $categoryName);

    if ($stmt->execute()) {
        // Category added successfully
        header("Location: ../admin/add_category.php");
        exit();
    } else {
        // Error handling
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}




if (isset($_POST['add_publisher'])) {
    include 'connection.php';
    $publisherName = $_POST['publisher'];
    $location = $_POST['location'];

    // Construct the SQL query
    $insertQuery = "INSERT INTO Publisher (name, location) VALUES ('$publisherName', '$location')";

    // Execute the query
    if ($conn->query($insertQuery) === TRUE) {
        // Publisher added successfully
        header("Location: ../admin/add_publisher.php");
        exit();
    } else {
        // Error handling
        echo "Error: " . $conn->error;
    }
}



?>
<?php
session_start();
include 'connection.php';

if (isset($_POST['update_category'])) {
    // Handle updating category here
    $categoryName = $_POST['category'];
    $categoryId = $_POST['c_id']; 

    // Perform the database update for updating the category
    $sql = "UPDATE category SET name = '$categoryName' WHERE category_id = '$categoryId'";
    if ($conn->query($sql)) {
        
        header("Location: /lms/admin/add_category.php"); // Redirect to the appropriate page after updating
        exit();
    } else {
        echo "Error updating category: " . $conn->error;
        exit();
    }
} else {
    // Handle other actions or show an error message
}
$conn->close();
?>


<?php
include 'connection.php';

if (isset($_POST['update_publisher'])) {
    $publisherId = $_POST['c_id'];
    $publisherName = $_POST['publisher'];
    $location = $_POST['location'];

    // Perform the database update for updating the publisher
    $sql = "UPDATE publisher SET name = '$publisherName', location = '$location' WHERE publisher_id = '$publisherId'";
    if ($conn->query($sql)) {
        // Publisher updated successfully
        header("Location: /lms/admin/add_publisher.php");
    } else {
        echo "Error updating publisher: " . $conn->error;
    }
}

$conn->close();
?>
