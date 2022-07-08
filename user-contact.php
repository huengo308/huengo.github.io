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
    <title>Work - Ngo Thi Hue</title>
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
    <link rel="stylesheet" href="css/work.css">
</head>
  <body>
  <style>
        body{
            background: rgb(240, 222, 225);
        }
    </style>
    <?php
    ?>
  <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="text-center text-uppercase font-italic font-weight-light">Contact me!</h1>
                <form action="process-contact.php" method ="POST">
                    <div class="form-group">
                      <label for="">Tên của bạn</label>
                      <input type="text" name="name" id="" class="form-control" placeholder="Nhập tên của bạn">
                    </div>
                    <div class="form-group">
                      <label for="">Số điện thoại</label>
                      <input type="text" name="phone" id="" class="form-control" placeholder="Nhập số điện thoại" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" id="" class="form-control" placeholder="Nhập email" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Tin nhắn</label>
                      <br>
                      <textarea name="message" id="" cols="50" rows="10" placeholder="Viết tin nhắn"></textarea>
                    </div>
                    <button name="gui" type="submit" class="btn btn-primary">Gửi</button>
                </form>
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