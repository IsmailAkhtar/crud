<?php
include("db.php");

$id = $_GET['id'];
$sql = "DELETE FROM `tbl_users` WHERE id=$id";
if (mysqli_query($conn, $sql)) {
   header('location:insert.php');
}
 else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>