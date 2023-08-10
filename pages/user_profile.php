<?php
include ('../includes/header.php');

$member_id=$_SESSION['user_id'];
include '../includes/connection.php';

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
    width: 270px;
    height: 300px;

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
.main-pro-details{
    display:flex;
    flex-direction:column;
}





</style>


<section id="prodetails" class="section-p2 background">
    <div class="single-pro-image">
        <img src="/lms/photos/user.jpg" alt="User Photo">
        <h5><a href="./Book.php"><?= htmlspecialchars($_SESSION['name']) ?></a></h5>
    </div>

    <?php
    $select_request = "SELECT books.title, books.author, borrowing.status, borrowing.reserve_date, borrowing.borrowing_id
     FROM books
     INNER JOIN borrowing ON books.book_id = borrowing.book_id
     WHERE borrowing.member_id = $member_id AND borrowing.status = 'pending'";

    $result = $conn->query($select_request);
    ?>
    <div class="main-pro-details">
        <div class="single-pro-details">
            <h2>My Reservation</h2>

            <?php

            if ($result) {
                if ($result->num_rows > 0) {

                    echo "<table class='table'>";
                    echo "<tr>
                            <th>S.N</th>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Reserve Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>";

                    $sn = 1;

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$sn."</td>";
                        echo "<td>".$row['title']."</td>";
                        echo "<td>".$row['author']."</td>";
                        echo "<td>".$row['reserve_date']."</td>";
                        echo "<td>".$row['status']."</td>";

                        echo "<td>
                            <a href='cancel_reserve.php?b_id=".$row['borrowing_id']."' onclick=\"return confirm('Are you sure you want to cancel this reservation?');\" class='btn btn-danger'>Cancel</a>
                        </td>";

                        echo "</tr>";
                        $sn++;
                    }

                    echo "</table>";
                } else {
                    echo "No reservation found.";
                }
            }

            ?>

        </div>

        <?php
$book_issued = "SELECT books.title, books.author, issue.issue_date, issue.duedate , issue.status
FROM books
INNER JOIN issue ON books.book_id = issue.book_id
WHERE issue.member_id = $member_id AND issue.status='issued'" ;

$result = $conn->query($book_issued);
?>

<div class="single-pro-details">
    <h2>Issued to Me</h2>

    <?php

if ($result) {
    if ($result->num_rows > 0) {

        echo "<table class='table'>";
        echo "<tr>
                <th>S.N</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Issued Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Message</th>
            </tr>";

        $sn = 1;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$sn."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['author']."</td>";
            echo "<td>".$row['issue_date']."</td>";
            echo "<td>".$row['duedate']."</td>"; 
            echo "<td>".$row['status']."</td>";
            $currentTimestamp = time();
            $dueTimestamp = strtotime($row['duedate']);
            
            echo "<td>";
            if ($dueTimestamp < $currentTimestamp) {
                echo "<span style='color:red;'>Contact administrator</span>";
            }
            else{
                echo "<span style='color:green;'>No messages</span>";
            }
            echo "</td>";
            echo "</tr>";
            $sn++;
        }

        echo "</table>";
    } else {
        echo "No issued books found.";
    }
} else {
    echo "Error: " . $conn->error; // Add this line for debugging
}

    ?>

</div>
</div>
</section>

<?php
include ('../includes/footer.php');
?>
