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
    <title>Thêm mới người dùng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body>
  <style>
    .card-body{
        height: auto;
        background-color: pink;
    }
    .has-error{
      color: red;
    }
  </style>
    <?php
    $err= [];
      if(isset($_POST["dangky"])){
        $fname = $_POST["fullname"];
        $birth = $_POST["birth"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $addr = $_POST["addr"];
        $username = $_POST["username"];
        $pass = $_POST["pwd"];
        $rpass = $_POST["rpwd"];
        $error=[];
        if(empty($fname)){
          $err["fullname"]="Bạn chưa điền họ tên!";
        }
        if(empty($birth)){
          $err["birth"] = "Bạn chưa điền ngày tháng năm sinh!";
      }
      if(empty($email)){
          $err["email"] = "Bạn chưa điền email!";
      }
      if(empty($phone)){
          $err["phone"] = "Bạn chưa điền số điện thoại!";
      }
      if(empty($addr)){
          $err["addr"] = "Bạn chưa điền địa chỉ!";
      }
      if(empty($username)){
          $err["username"] = "Bạn chưa điền tên đăng nhập!";
      }
      if(empty($pass)){
          $err["pwd"] = "Bạn chưa điền mật khẩu!";
      }
      if($pass != $rpass){
          $err["rpwd"] = "Mật khẩu nhập lại chưa đúng!";
      }
      if(empty($err)){
        $passw=password_hash($pass,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(fullname, birthday, email, phone, address, username, password) VALUES('$fname','$birth','$email','$phone','$addr','$username','$passw')";
        $result =mysqli_query($conn, $sql);
        if($result){
            header('location: ql-user.php');
        }
      }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg m-auto">
                <div class="card mt-5">
      <div class="card-header">
        <h1 class=" text-center">Thêm mới người dùng</h1>
        <a class="btn btn-success" href="ql-user.php"><i class="fas fa-undo"></i>Quay lại</a>
      </div>
      <div class="card-body">
      <form action="" method="POST">
        <div class="form-group">
          <label for="">Họ tên</label>
          <input type="text" name="fullname" class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["fullname"]))? $err["fullname"]:''  ?> </span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Ngày sinh</label>
          <input type="date" name="birth" class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["birth"]))? $err["birth"]:''  ?> </span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["email"]))? $err["email"]:''  ?> </span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Số điện thoại</label>
          <input type="text" name="phone"  class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["phone"]))? $err["phone"]:''  ?> </span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Địa chỉ</label>
          <input type="text" name="addr"  class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["addr"]))? $err["addr"]:''  ?> </span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Tên tài khoản</label>
          <input type="text" name="username"  class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["username"]))? $err["username"]:''  ?> </span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Mật khẩu</label>
          <input type="password" name="pwd"  class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["pwd"]))? $err["pwd"]:''  ?> </span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Nhập lại mật khẩu</label>
          <input type="password" name="rpwd"  class="form-control" placeholder="" >
          <div class="has-error">
            <span> <?php echo (isset($err["rpwd"]))? $err["rpwd"]:''  ?> </span>
          </div>
        </div>
        <button type="submit" class="btn btn-success" name="dangky">Đăng ký</button>
        </form>
      </div>
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