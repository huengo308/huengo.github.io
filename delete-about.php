<?php
    include "config.php";

    $id=$_GET['id'];
    $sql = "DELETE FROM doing WHERE id = $id";
    $query=mysqli_query($conn, $sql);
    header('Location: qlabout-admin.php')
?>