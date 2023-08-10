<?php
include '../includes/connection.php';
$id=$_GET['m_id'];
$sql = "DELETE FROM members
WHERE member_id = $id;
";
if($conn->query($sql)){
    header('location:new_members.php');
}
?>