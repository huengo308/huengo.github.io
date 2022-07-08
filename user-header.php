<?php 
  include "config.php";
  $user = $_SESSION['user'];
?>
<header>
      <nav>
      <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $user['username']?></a>
      <div class="dropdown-menu" aria-labelledby="dropdownId">
        <a class="dropdown-item" href="re-user.php">Đổi mật khẩu</a>
        <a class="dropdown-item" href="logout.php">Đăng xuất</a>
      </div>
        <ul class="nav-links">
          <li>
            <a href="user-page.php"><i class="fas fa-home"></i>Home</a>
          </li>
          <li>
            <a href="user-about.php"><i class="fas fa-camera-retro"></i>About</a>
          </li>
          <li>
            <a href="user-resume.php"><i class="far fa-address-card"></i>Resume</a>
          </li>
          <li>
          <a href="user-blog.php"><i class="fas fa-blog"></i>Blog</a>
          </li>
          <li>
            <a href="user-contact.php"><i class="fas fa-phone"></i></i>contact</a>
          </li>
        </ul>
         <div class="burger">
          <i class="fas fa-bars"></i>
         </div>
      </nav>
    </header>
