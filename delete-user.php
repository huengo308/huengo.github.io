<?php
    include "config.php";

    $id=$_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    $query=mysqli_query($conn, $sql);
    header('Location: ql-user.php')
?>