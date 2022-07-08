
<!doctype html>
<html lang="en">
  <head>
    <title>Đăng nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body>
  <?php
    include "config.php";
  ?>
  <?php
        $err=[];
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $passw = $_POST["pwd"];

        $sql="SELECT * FROM users WHERE email = '$email'";
        $query= mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkemail= mysqli_num_rows($query);
        if($checkemail ==1){
            $checkpass=password_verify($passw, $data['password']);
            
            if($checkpass){
                $_SESSION['user']=$data;
                $_SESSION['user_level'] = (int) $data['user_level'];
                $url=($_SESSION['user_level']==1) ? 'admin-page.php' : 'user-page.php';
                header('Location: '.$url);
            }else{
                $err['chung'] ="Sai tên tài khoản hoặc mật khẩu!";
            }
        }
        else{
            $err['email'] = 'Email không tồn tại';
        }
    }
  ?>
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
  <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title mt-5">
                    <a class="btn btn-success" href="index.php"><i class="fas fa-undo"></i> Trở lại</a>
                    <h1 class ="text-center py-3"> Đăng nhập </h1>
                    <div class="card-body">
                    <form action="" method ="post">
                        <div class="form-group">
                            <label for="email">Địa chỉ email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email">
                            <div class="has-error">
                                <span> <?php echo (isset($err["email"]))? $err["email"]:''  ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="pwd">
                            <div class="has-error">
                                <span> <?php echo (isset($err["chung"]))? $err["chung"]:''  ?> </span>
                            </div>
                        </div>
                        <p><a href="forgotpass.php">Quên mật khẩu?</a></p>
                        <button type="submit" class="btn btn-success">Đăng nhập</button>
                        <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký.</a></p>
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