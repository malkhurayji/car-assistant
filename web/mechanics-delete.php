<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM mechanics where id='$id';";
$query = mysqli_query($db, $sql);
header("location:mechanics.php");
?>
