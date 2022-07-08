<?php
include "config.php";
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{ header("Location: login.php");
  exit();
}
$user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Thêm mới bài viết</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
      body{
          background:rgb(240, 222, 225);
      }
  </style>
 
  <body>
  <?php
    if(isset($_POST['post'])){
            $tieude =$_POST['tieude'];
            $noidung =$_POST['noidung'];
            $id_tacgia = $user['id'];
            $file = $_FILES['image'];
            $image = $file['name'];
            move_uploaded_file($file['tmp_name'], 'images/'.$image);

            $sql="INSERT INTO blog(nhom, mota, anh, id_tacgia) VALUES('$tieude','$noidung','$image','$id_tacgia')";
            $result=mysqli_query($conn, $sql);
            if($result){
                header('Location: ql-baiviet.php');
            }
    }
  ?>
      <a class="btn btn-success" style="margin-top:2%;" href="ql-baiviet.php"><i class="fas fa-undo"></i> Trở lại</a>
      <div class="container">
        <h1 class="text-center text-uppercase font-italic font-weight-light" >Thêm mới bài viết</h1>
        <br>
        <form action="" method ="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tiêu đề</label>
              <input type="text" name="tieude" id="tieude" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Nội dung</label>
              <input type="text" name="noidung" id="noidung" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Ảnh</label>
              <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <button name="post" type="submit" class="btn btn-success">Đăng</button>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>