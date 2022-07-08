<?php
    $conn= mysqli_connect('localhost', 'root', '', 'webcv');
    if(!$conn){
        die('Có lỗi kết nối!'. mysqli_connect_error());
    }
    session_start();
?>