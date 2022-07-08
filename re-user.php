<?php
include "config.php";
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{ header("Location: login.php");
  exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Đổi mật khẩu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        $err=[];
        if(isset($_POST['luu'])){
            $email =$_POST['email'];
            $pass= $_POST['pass'];
            $newpass=$_POST['newpass'];
            $repass=$_POST['repass'];

            $sql="SELECT * FROM users WHERE email = '$email'";
            $result=mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($result);
            $checkemail= mysqli_num_rows($result);
            if($newpass != $repass){
                $err['repass']="Mật khẩu nhập lại chưa đúng!";
            }
            if($checkemail ==1){
                $checkpass=password_verify($pass, $data['password']);
                if($checkpass && empty($err)){
                    $passw=password_hash($newpass,PASSWORD_DEFAULT);
                    $sqldoi="UPDATE users SET password = '$passw' WHERE email = '$email'";
                    $rrrrr = mysqli_query($conn,$sqldoi);
                    if($rrrrr){
                        header('Location: user-page.php');
                    }
            }else{
                $err['pass']= "Mật khẩu cũ không đúng!";
            }
        }
            else{
                $err['email'] = 'Email không tồn tại';
            }
        }
    ?>
  <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title mt-5">
                    <a class="btn btn-success" href="user-page.php"><i class="fas fa-undo"></i> Trở lại</a>
                    <h1 class ="text-center py-3"> Đổi mật khẩu </h1>
                    <div class="card-body">
                    <form action="" method ="post">
                    <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" placeholder="" name="email">
                            <div class="has-error">
                                <span> <?php echo (isset($err["email"]))? $err["email"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Mật khẩu cũ:</label>
                            <input type="password" class="form-control" placeholder="" name="pass">
                            <div class="has-error">
                                <span> <?php echo (isset($err["pass"]))? $err["pass"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu mới:</label>
                            <input type="password" class="form-control" placeholder="" name="newpass">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Nhập lại mật khẩu mới:</label>
                            <input type="password" class="form-control" placeholder="" name="repass">
                            <div class="has-error">
                                <span> <?php echo (isset($err["repass"]))? $err["repass"]:''  ?> </span>
                            </div>
                        </div>
                        <button name="luu" type="submit" class="btn btn-success">Lưu</button>
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