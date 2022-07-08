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
    <title>Quản lý người dùng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/ql-user.css">
  </head>
  <body>
      <?php
        include "admin-header.php";
      ?>
      <?php
        $sql="SELECT * FROM users where user_level !=1";
        $result = mysqli_query($conn, $sql);
        $post_list = mysqli_fetch_all($result);
      ?>
      <style>
        .card-header{
            margin-top: 70px
        }
        .table tbody td a{
          color: black
        }
        .table tbody td a:hover{
          color: red;
        }
        .table tbody td i{
          color: red
        }
      </style>
         <div class="card-header text-center">
        <h1>Quản lý người dùng</h1>
        </div>
        <div class="card-body">
        <br>
        <div class="container">
        <div class="row">
            <div class="col-lg m-auto">
            <a class ="btn btn-success" href="create-user.php"><i class="fas fa-plus"></i> </i>Thêm mới</a>
      <table class="table table-border table-hover">
          <thead class="thead-dark">
              <tr>
                  <th width="80">ID</th>
                  <th width="200">Họ tên</th>
                  <th width="180">Tên tài khoản</th>
                  <th width="85">Hoạt động</th>
              </tr>
          </thead>
          <?php
           foreach($post_list as $post){
            echo '<tbody class="bg-light">';
              echo'  <tr>';
                   echo' <td>'.$post[0].'</td>';
                   echo' <td>'.$post[1].'</td>';
                   echo' <td>'.$post[4].'</td>';
                   echo '<td><a href="read-user.php?id='.$post[0].'"><i class="far fa-eye -dark"></i>Xem</a> &ensp; <a href="delete-user.php?id='.$post[0].'"><i class="far fa-trash-alt"></i>Xóa</a></td>';
              echo'</tr>';
          echo'</tbody>';
          }
          ?>
      </table>
      </div>
      </div>
      </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/header.js"></script>
  </body>
</html>