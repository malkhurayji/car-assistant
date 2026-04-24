<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM parts where id='$id';";
$query = mysqli_query($db, $sql);
header("location:parts.php");
?>
