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
    <title>Blog - Ngo Thi Hue</title>
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
</head>
  <style>
    body{
      background: rgb(240, 222, 225);
    }
    .title{
      font-size: 350%;
    }
  </style>
    <?php
      include "admin-header.php";

      $sql="SELECT username, nhom, ngayviet, anh, id_baiviet FROM blog, users where users.id = blog.id_tacgia";
      $query=mysqli_query($conn, $sql);
      $post_list=mysqli_fetch_all($query);
    ?>
    <?php
        if(isset($_POST['cmt'])){
          $cmt= $_POST['cmtt'];
          $id_nv = $user['id'];
          
          $sql2="INSERT INTO comment(id_nguoiviet, comment) VALUES('$id_nv','$cmt')";
          $query2=mysqli_query($conn, $sql2);
          if($query2){
            header("Location: user-blog.php");
          }
        }
      ?>
    <h1 class ="title text-center text-uppercase font-italic font-weight-light">My blogs</h1>
    <a class="btn btn-success" style="float: right; margin-right:5%" href="ql-baiviet.php"><h4>Quản lý bài viết</h4></a>
    <div class="container-fluid" style="margin-top:5%;" >
	    <div class="row">
		    <div class="col-md-6 bg-white">
        <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
        <div class="carousel-inner">
          <h1 class="text-center font-italic font-weight-light">Một số loại trái cây</h1>
        <div class="carousel-item active">
        <?php echo'<img class="d-block w-100" src="images/hoaqua.jpg"alt="">';?>
        </div>
        <?php foreach($post_list as $post){
        echo '<div class="carousel-item">';
        echo'<img class="d-block w-100" src="images/'.$post[3].'"alt="">';
        echo '<div class="title">';
          echo'<a href="admin-mota.php?id='.$post[4].'"><h3 class= "font-italic">'.$post[1].'</h3></a>';
          echo '<p><h4><i class="far fa-user"></i>'.$post[0].' &nbsp; <i class="far fa-calendar-alt"></i>'.$post[2].'</h4></p> ';
        echo'</div>';
        echo'</div>';
      }?>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
        </div>
		    </div>
		    <div class="col-md-6">
        <h1 class="text-center font-italic font-weight-light">Các nhóm hoa quả</h1>
        <br>
        <ul>
          <?php
          foreach($post_list as $post){
            echo'<li style="list-style:none;"><h4 class= "text-center font-italic font-weight-light"><a href="admin-mota.php?id='.$post[4].'">'.$post[1].'</a></h4></li>';
            echo' <hr>';
          }?>
        </ul>
		  </div>
	  </div>
</div>

    
    <?php
      $sql1="SELECT username, comment, ngayviet FROM comment,users WHERE users.id=comment.id_nguoiviet ORDER BY comment.id DESC";
      $query1=mysqli_query($conn, $sql1);
      $fet=mysqli_fetch_all($query1);
    ?>
		<div class="col-md-6">
        <h5 class="font-weight-bold">Bình luận</h5>
        <?php
        foreach($fet as $fett){
        echo'<div class="bl">';
        echo'<h6 class="font-weight-bold font-italic">'.$fett[0].'</h6>';
        echo'<p class="noidung">'.$fett[1].'</p>';
        echo'<p class="font-italic font-weight-light">'.$fett[2].'</p>';
        echo'<hr>';
        echo'</div>';
      }
      ?>
        <form action="" method="POST">
          <textarea name="cmtt" id="" cols="30" rows="8" placeholder="Viết bình luận"></textarea>
          <button name ="cmt" class="btn btn-primary">Bình luận</button>
        </form>
		</div>
	</div>
</div>
<?php
      include "footer.php";
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/header.js"></script>
</body>
</html>