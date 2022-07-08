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
    <title>Quản lý bài viết</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<style>
    body{
        background:  rgb(240, 222, 225);
    }
</style>
<?php
    $sql="SELECT * FROM blog,users WHERE users.id = blog.id_tacgia";
    $query=mysqli_query($conn,$sql);
    $post_list = mysqli_fetch_all($query);
?>
  <body>
  <a class="btn btn-success" style="margin-top:2%;" href="admin-blog.php"><i class="fas fa-undo"></i> Trở lại</a>
      <div class="container">
        <h1 class="text-center text-uppercase font-italic font-weight-light" >Quản lý bài viết</h1>
        <a class="btn btn-success" href="add-baiviet.php"><h5>Thêm bài viết mới</h5></a>
        <div class="row">
      <table class="table table-border table-hover">
          <thead class="thead-dark">
              <tr>
                  <th>ID bài viết</th>
                  <th >Người viết</th>
                  <th >Nhóm</th>
                  <th>Bài viết</th>
                  <th width="150">Hoạt động</th>
              </tr>
          </thead>
          <?php
           foreach($post_list as $post){
            echo '<tbody class="bg-light">';
              echo'  <tr>';
                   echo' <td>'.$post[0].'</td>';
                   echo' <td>'.$post[10].'</td>';
                   echo' <td>'.$post[1].'</td>';
                   echo' <td>'.$post[2].'</td>';
                   echo '<td><a href="suabaiviet.php?id='.$post[0].'"><i class="fas fa-pen"></i></a> &ensp; <a href="xoabaiviet.php?id='.$post[0].'"><i class="far fa-trash-alt"></i></a></td>';
              echo'</tr>';
          echo'</tbody>';
          }
          ?>
      </table>
      </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>