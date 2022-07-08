<!doctype html>
<html lang="en">
  <head>
    <title>Đăng ký</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body>
  <style>
    body{
        background:  rgb(240, 222, 225);
    }
    .btn{
        background: pink
    }
    h1{
        color: pink
    }
    .has-error{
        color: red
    }
  </style>
  <?php
    include "config.php";
   ?>
    <?php

    $err=[];

    if(isset($_POST["add"])){
        $fname=$_POST["fullname"];
        $birth=$_POST["birth"];
        $email =$_POST["email"];
        $phone=$_POST["phone"];
        $add=$_POST["addr"];
        $username=$_POST["username"];
        $pass=$_POST["pwd"];
        $rpass=$_POST["rpwd"];

        if(empty($fname)){
            $err["fullname"] = "Bạn chưa điền họ tên!";
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
        if(empty($add)){
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
            $sql = "INSERT INTO users(fullname, birthday, email, phone, address, username, password) VALUES('$fname','$birth','$email','$phone','$add','$username','$passw')";
            $result =mysqli_query($conn, $sql);
            if($result){
                header('location: login.php');
            }
        }

    }
?>
  <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title mt-5">
                    <a class="btn btn-success" href="index.php"><i class="fas fa-undo"></i> Trở lại</a>
                    <h1 class ="text-center py-3"> Đăng ký </h1>
                    <div class="card-body">
                    <form action="" method ="POST">
                        <div class="form-group">
                            <label for="">Họ tên</label>
                            <input type="text" class="form-control" placeholder="Enter fullname" name="fullname">
                            <div class="has-error">
                                <span> <?php echo (isset($err["fullname"]))? $err["fullname"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="">Ngày sinh</label>
                            <input type="date" class="form-control" placeholder="Enter date of birth" name="birth">
                            <div class="has-error">
                                <span> <?php echo (isset($err["birth"]))? $err["birth"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="">Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email">
                            <div class="has-error">
                                <span> <?php echo (isset($err["email"]))? $err["email"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Enter phone" name="phone">
                            <div class="has-error">
                                <span> <?php echo (isset($err["phone"]))? $err["phone"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Enter address" name="addr">
                            <div class="has-error">
                                <span> <?php echo (isset($err["addr"]))? $err["addr"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="">Tên tài khoản</label>
                            <input type="text" class="form-control" placeholder="Enter username" name="username">
                            <div class="has-error">
                                <span> <?php echo (isset($err["username"]))? $err["username"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="pwd">
                            <div class="has-error">
                                <span> <?php echo (isset($err["pwd"]))? $err["pwd"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="rpwd">
                            <div class="has-error">
                                <span> <?php echo (isset($err["rpwd"]))? $err["rpwd"]:''  ?> </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" name="add">Đăng ký</button>
                        <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
                        <br> 
                    </form>
                    </div>
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