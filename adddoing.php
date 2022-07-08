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
    <title>Thêm công việc</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
    if(isset($_POST['addad'])){
        $name=$_POST['tencv'];
        $mota = $_POST['descr'];

        $sql="INSERT INTO doing(name, description) VALUES('$name','$mota')";
        $rs=mysqli_query($conn, $sql);
        if($rs){
            header('Location: admin-about.php');
        }
    }
  ?>
  <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
            <a class="btn btn-success" href="admin-about.php"><i class="fas fa-undo"></i> Trở lại</a>
                <div class="card mt-5">
                    <div class="card-title">
                    <h1 class ="text-center py-3"> Thêm việc làm</h1>
                    </div>
                    <form action="" method="POST">
                         <div class="">
                            <label class="font-weight-bold" for="">Tên công việc</label>
                            <input type="text" name="tencv" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="">Mô tả</label>
                            <input type="text" name="descr" id="" class="form-control" >
                        </div>
                        <button type="submit" class="btn btn-success" name="addad">Thêm</button>
                    </form>
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