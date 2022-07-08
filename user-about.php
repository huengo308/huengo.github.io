<?php
include "user-header.php";

if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{ header("Location: login.php");
  exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>About - Ngo Thi Hue</title>
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
    <link rel="stylesheet" href="css/about.css">
</head>
  <body>
  <style>
  .title{
    margin-top: 70px
  }
  .list__ {
    float: right;
    margin-right: 20%
  }
  ul li{
    list-style: none
  }
.list__ a i{
  font-size:200%;
}
  .avatar img{
    width:20%
  }
  .title,
  .doing{
    font-size: 300%;
    color: green;
  }
  .doing{
    float: right;
  }
  .row{
    margin-top: 10%;
    margin-right: 20%
  }
  .titlee i{
    color: red;
    font-size: 200%
  }
  h1 i{
    font-size: 50%;
  }
  body{
    display: flex;
    flex-direction: column;
    font-family:'Lora', serif;
    letter-spacing: 2px;
    font-weight: 400;
    font-size: 1.2vw;
}
.container .row{
  position: absolute;
  z-index: 0;
}
.row img{
  width: 10%;
}
</style>
  <?php
        $sql = "SELECT * FROM users WHERE id =1";
        $query=mysqli_query($conn, $sql);
        $rows=mysqli_fetch_assoc($query);

        $sqlkn="SELECT * FROM introduce";
        $query2=mysqli_query($conn, $sqlkn);
        $r=mysqli_fetch_assoc($query2);
      ?>
      <main>
      <div class="box box-content" >
        <div class="container pb-0 pb-sm-2">
          <h1 class="title text-uppercase">About me</h1>
          <div class="avatar">
          <form action="" method="POST" role="form" enctype="multipart/form-data">
          <p> <?php echo $r['name'] ?> </p>
            <img src="images/<?php echo $rows['avatar'] ?>" alt="">
            <ul class="list__">
              <li>Họ tên: <?php echo $rows['fullname'] ?> </li> <hr>
              <li>Ngày sinh: <?php echo $rows['birthday'] ?></li> <hr>
              <li>Email: <a href="mailto:<?php echo $rows['email'] ?>"><?php echo $rows['email'] ?></a></li> <hr>
              <li>Số điện thoại: <?php echo $rows['phone'] ?></li> <hr>
              <li>Địa chỉ: <?php echo $rows['address'] ?></li> <hr>
            </ul>
            </form>
          </div>
        <hr><hr>
        <?php
          $sqld="SELECT * FROM doing";
          $q = mysqli_query($conn, $sqld);
          $rr = mysqli_fetch_all($q);
        ?>
          <div class="container pb-0 pb-sm-2">
            <h1 class="doing text-uppercase">What i'm doing</h1>
            <div class="row">
            <?php  
              foreach($rr as $ro){

             echo' <div class="col-12 col-lg-6">';
             echo'  <div class="case-item">';
             echo'  <div class="titlee text-center">';
             echo' <i class="fas fa-laptop-code"></i>';
             echo'    <h4>'.$ro[1].'</h4>';
             echo'   <p> '.$ro[2].'</p>';
             echo'  </div>';
             echo' </div>';
             echo'</div>';
            } ?>
            
          </div>
          </div>
      </div>
      
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/header.js"></script>
    </body>
</html>