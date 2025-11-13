<?php
include("config.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM crud WHERE id='$id'");

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM crud");
$data = mysqli_fetch_array($result);

if ($data['total'] == 0){
    mysqli_query($conn, "ALTER TABLE crud AUTO_INCREMENT=1");
}

header("Location:index.php");
?>
