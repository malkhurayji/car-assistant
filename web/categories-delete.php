<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM categories where id='$id';";
$query = mysqli_query($db, $sql);
header("location:categories.php");
?>
