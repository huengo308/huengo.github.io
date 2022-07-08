<?php
include "config.php";
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{ header("Location: login.php");
  exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Xem thông tin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body>
  <style>
    .card-body ul li{
        font-size: 20px;
        list-style: none;
        font-weight: bold
    }
    .card-body ul li span{
        font-size: 20px;
        font-weight: normal
    }
  </style>
  <?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }
    $sql= "SELECT * FROM users WHERE id ='$id'";
    $result=mysqli_query($conn, $sql);
    $rows= mysqli_fetch_array($result);
  ?>
    <div class="card-title text-center">
        <h1>Xem thông tin người dùng</h1>
    </div>
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-lg m-auto">
        <ul>
            <li>Họ tên: <span> <?php echo $rows['fullname'] ?></span></li> <hr>
            <li>Ngày sinh: <span><?php echo $rows['birthday'] ?></span></li> <hr>
            <li>Email: <span><?php echo $rows['email'] ?></span></li> <hr>
            <li>Số điện thoại: <span><?php echo $rows['phone'] ?></span></li> <hr>
            <li>Địa chỉ: <span><?php echo $rows['address'] ?></span></li> <hr>
            <a class="btn btn-success" href="ql-user.php"><i class="fas fa-undo"></i>Quay lại</a>
        </ul>
        </div>
        </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>