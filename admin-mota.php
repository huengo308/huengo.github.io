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
    <title>Loại trái cây</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
  <body>
      <style>
        body{
            background: rgb(240, 222, 225);
        }
      </style>
      <?php
          if(isset($_GET["id"])){
            $id=$_GET["id"];

            $sql="SELECT * FROM blog WHERE id_baiviet =$id";
            $re=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($re);

            $sql1="SELECT username, nhom, ngayviet, anh, id_baiviet FROM blog, users where users.id = blog.id_tacgia";
            $query=mysqli_query($conn, $sql1);
            $post_list=mysqli_fetch_all($query);
        }

      ?>
     <a class="btn btn-success" href="admin-blog.php"><i class="fas fa-undo"></i> Trở lại</a>
      <div class="container-fluid "style="margin-top:5%;">
	    <div class="row">
	        <div class="col-md-6 bg-white">
                <h1 class="title text-center font-italic font-weight-light"><?php echo $row['nhom'] ?></h1>
                <br>
                <div class="mota">
                    <p><?php echo $row['mota'] ?></p>
                </div>
		    </div>
		    <div class="col-md-6">
                <h1 class= "text-center font-italic font-weight-light">Bạn cũng xem?</h1>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>