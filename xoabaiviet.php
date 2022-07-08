<?php
include "config.php";
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{ header("Location: login.php");
  exit();
}

    $id=$_GET['id'];
    $sql = "DELETE FROM blog WHERE id_baiviet = $id";
    $query=mysqli_query($conn, $sql);
    header('Location: ql-baiviet.php')
?>