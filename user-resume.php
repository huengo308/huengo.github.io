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
    <title>Resume - Ngo Thi Hue</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/resume.css">

</head>
  <body>
  <style>
  .box-content{
    margin-top: 2%;
  }
  .title{
    font-size: 300%;
    color: green;
  }
  h3{
    font-size: 200%;
    color: red;
  }
  .row{
    position: relative;
    z-index: 0;
  }
  .work{
    float: right;
  }
  .timeline {
  position: relative;
  width: 338px;
  margin-top: 20px;
  padding: 1em 0;
  list-style-type: none;
}

.timeline:before {
  position: absolute;
  top: 0;
  content: " ";
  display: block;
  width: 6px;
  height: 100%;
  margin-left: -3px;
  background: rgb(80, 80, 80);
  background: -moz-linear-gradient(
    top,
    rgba(80, 80, 80, 0) 0%,
    rgb(80, 80, 80) 8%,
    rgb(80, 80, 80) 92%,
    rgba(80, 80, 80, 0) 100%
  );
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    color-stop(0%, rgba(30, 87, 153, 1)),
    color-stop(100%, rgba(125, 185, 232, 1))
  );
  background: -webkit-linear-gradient(
    top,
    rgba(80, 80, 80, 0) 0%,
    rgb(80, 80, 80) 8%,
    rgb(80, 80, 80) 92%,
    rgba(80, 80, 80, 0) 100%
  );
  background: -o-linear-gradient(
    top,
    rgba(80, 80, 80, 0) 0%,
    rgb(80, 80, 80) 8%,
    rgb(80, 80, 80) 92%,
    rgba(80, 80, 80, 0) 100%
  );
  background: -ms-linear-gradient(
    top,
    rgba(80, 80, 80, 0) 0%,
    rgb(80, 80, 80) 8%,
    rgb(80, 80, 80) 92%,
    rgba(80, 80, 80, 0) 100%
  );
  background: linear-gradient(
    to bottom,
    rgba(80, 80, 80, 0) 0%,
    rgb(80, 80, 80) 8%,
    rgb(80, 80, 80) 92%,
    rgba(80, 80, 80, 0) 100%
  );

  z-index: 0;
}

.timeline li {
  padding: 1em 0;
}

.timeline li:after {
  content: "";
  display: block;
  height: 0;
  clear: both;
  visibility: hidden;
}

.direction-l {
  position: relative;
  width: 300px;
  float: left;
  text-align: right;
}

.direction-r {
  position: relative;
  width: 300px;
  float: right;
}

.flag-wrapper {
  position: relative;
  display: inline-block;

  text-align: center;
}

.flag {
  position: relative;
  display: inline;
  background: rgb(248, 248, 248);
  padding: 6px 10px;
  border-radius: 5px;

  font-weight: 600;
  text-align: left;
}

.direction-l .flag {
  -webkit-box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15),
    0 0 1px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15), 0 0 1px rgba(0, 0, 0, 0.15);
  box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15), 0 0 1px rgba(0, 0, 0, 0.15);
}

.direction-r .flag {
  -webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.15),
    0 0 1px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.15), 0 0 1px rgba(0, 0, 0, 0.15);
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.15), 0 0 1px rgba(0, 0, 0, 0.15);
}

.direction-l .flag:before,
.direction-r .flag:before {
  position: absolute;
  top: 50%;
  right: -40px;
  content: " ";
  display: block;
  width: 12px;
  height: 12px;
  margin-top: -10px;
  background: #fff;
  border-radius: 10px;
  border: 4px solid rgb(255, 80, 80);
  z-index: 0;
}

.direction-r .flag:before {
  left: -40px;
}

.direction-l .flag:after {
  content: "";
  position: absolute;
  left: 100%;
  top: 50%;
  height: 0;
  width: 0;
  margin-top: -8px;
  border: solid transparent;
  border-left-color: rgb(248, 248, 248);
  border-width: 8px;
  pointer-events: none;
}

.direction-r .flag:after {
  content: "";
  position: absolute;
  right: 100%;
  top: 50%;
  height: 0;
  width: 0;
  margin-top: -8px;
  border: solid transparent;
  border-right-color: rgb(248, 248, 248);
  border-width: 8px;
  pointer-events: none;
}

.time-wrapper {
  display: inline;

  line-height: 1em;
  font-size: 0.66666em;
  color: rgb(250, 80, 80);
  vertical-align: middle;
}

.direction-l .time-wrapper {
  float: left;
}

.direction-r .time-wrapper {
  float: right;
}

.time {
  display: inline-block;
  background: rgb(248, 248, 248);
}

.desc {
  margin: 1em 0.75em 0 0;

  font-size: 0.77777em;
  font-style: italic;
  line-height: 1.5em;
}

.direction-r .desc {
  margin: 1em 0 0 0.75em;
}

/* ================ Timeline Media Queries ================ */

@media screen and (max-width: 0px) {
  .timeline {
    width: 100%;
    padding: 4em 0 1em 0;
  }

  .timeline li {
    padding: 2em 0;
  }

  .direction-l,
  .direction-r {
    float: none;
    width: 100%;

    text-align: center;
  }

  .flag-wrapper {
    text-align: center;
  }

  .flag {
    background: rgb(255, 255, 255);
    z-index: 0;
  }

  .direction-l .flag:before,
  .direction-r .flag:before {
    position: absolute;
    top: -30px;
    left: 50%;
    content: " ";
    display: block;
    width: 12px;
    height: 12px;
    margin-left: -9px;
    background: #fff;
    border-radius: 10px;
    border: 4px solid rgb(255, 80, 80);
    z-index: 0;
  }

  .direction-l .flag:after,
  .direction-r .flag:after {
    content: "";
    position: absolute;
    left: 50%;
    top: -8px;
    height: 0;
    width: 0;
    margin-left: -8px;
    border: solid transparent;
    border-bottom-color: rgb(255, 255, 255);
    border-width: 8px;
    pointer-events: none;
  }

  .time-wrapper {
    display: block;
    position: relative;
    margin: 4px 0 0 0;
    z-index: 0;
  }

  .direction-l .time-wrapper {
    float: none;
  }

  .direction-r .time-wrapper {
    float: none;
  }

  .desc {
    position: relative;
    margin: 1em 0 0 0;
    padding: 1em;
    background: rgb(245, 245, 245);
    -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0 1px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0.2);

    z-index: 15;
  }

  .direction-l .desc,
  .direction-r .desc {
    position: relative;
    margin: 1em 1em 0 1em;
    padding: 1em;

    z-index: 15;
  }
}

@media screen and (min-width: 400px ?? max-width: 660px) {
  .direction-l .desc,
  .direction-r .desc {
    margin: 1em 4em 0 4em;
  }
}
.work{
  float:right
}
/* process */
progress:not(value) {
	/* Add your styles here. As part of this walkthrough we will focus only on determinate progress bars. */
}

/* Styling the determinate progress element */

progress[value] {
	/* Get rid of the default appearance */
	appearance: none;
	
	/* This unfortunately leaves a trail of border behind in Firefox and Opera. We can remove that by setting the border to none. */
	border: none;
	
	/* Add dimensions */
	width: 100%; height: 20px;
	
	/* Although firefox doesn't provide any additional pseudo class to style the progress element container, any style applied here works on the container. */
	  background-color: whiteSmoke;
	  border-radius: 3px;
	  box-shadow: 0 2px 3px rgba(0,0,0,.5) inset;
	
	/* Of all IE, only IE10 supports progress element that too partially. It only allows to change the background-color of the progress value using the 'color' attribute. */
	color: royalblue;
	
	position: relative;
	margin: 0 0 1.5em; 
}

/*
Webkit browsers provide two pseudo classes that can be use to style HTML5 progress element.
-webkit-progress-bar -> To style the progress element container
-webkit-progress-value -> To style the progress element value.
*/

progress[value]::-webkit-progress-bar {
	background-color: whiteSmoke;
	border-radius: 3px;
	box-shadow: 0 2px 3px rgba(0,0,0,.5) inset;
}

progress[value]::-webkit-progress-value {
	position: relative;
	
	background-size: 35px 20px, 100% 100%, 100% 100%;
	border-radius:3px;
	
	/* Let's animate this */
	animation: animate-stripes 5s linear infinite;
}

@keyframes animate-stripes { 100% { background-position: -100px 0; } }

/* Let's spice up things little bit by using pseudo elements. */

progress[value]::-webkit-progress-value:after {
	/* Only webkit/blink browsers understand pseudo elements on pseudo classes. A rare phenomenon! */
	content: '';
	position: absolute;
	
	width:5px; height:5px;
	top:7px; right:7px;
	
	background-color: white;
	border-radius: 100%;
}

/* Firefox provides a single pseudo class to style the progress element value and not for container. -moz-progress-bar */

progress[value]::-moz-progress-bar {
	/* Gradient background with Stripes */
	background-image:
	-moz-linear-gradient( 135deg,
													 transparent,
													 transparent 33%,
													 rgba(0,0,0,.1) 33%,
													 rgba(0,0,0,.1) 66%,
													 transparent 66%),
    -moz-linear-gradient( top,
														rgba(255, 255, 255, .25),
														rgba(0,0,0,.2)),
     -moz-linear-gradient( left, #09c, #f44);
	
	background-size: 35px 20px, 100% 100%, 100% 100%;
	border-radius:3px;
	
	/* Firefox doesn't support CSS3 keyframe animations on progress element. Hence, we did not include animate-stripes in this code block */
}

/* Fallback technique styles */
.progress-bar {
	background-color: whiteSmoke;
	border-radius: 3px;
	box-shadow: 0 2px 3px rgba(0,0,0,.5) inset;

	/* Dimensions should be similar to the parent progress element. */
	width: 100%; height:20px;
}

.progress-bar span {
	background-color: royalblue;
	border-radius: 3px;
	
	display: block;
	text-indent: -9999px;
}

p[data-value] { 
  
  position: relative; 
}

/* The percentage will automatically fall in place as soon as we make the width fluid. Now making widths fluid. */

p[data-value]:after {
	content: attr(data-value) '%';
	position: absolute; right:0;
}

</style>
  <?php
        $sql = "SELECT * FROM education";
        $result = mysqli_query($conn, $sql);
        $rows= mysqli_fetch_all($result);
      ?>
<main>
      <div class="box box-content" >
        <div class="container pb-0 pb-sm-2">
          <h1 class="title text-uppercase">Resume</h1>
          <hr>
          <div class="row">
          <div class="col-12 col-lg-6">
          <h3><i class="fas fa-graduation-cap"></i> Education</h3> 
          <?php foreach($rows as $row){
            echo '<ul class="timeline"> ';  
            echo ' <li>';
            echo '<div class="direction-r">';
            echo '<div class="flag-wrapper">';
            echo '<span class="flag">'.$row[1].'</span>';
            echo '<span class="time-wrapper"><span class="time">'.$row[2].'</span></span>';
            echo '</div>';
            echo '<div class="desc">'.$row[3].'</div>';
            echo '</div>';
            echo '</li>';
            
          } ?>
          <?php
        $sqlll = "SELECT * FROM works ORDER BY id DESC";
        $result1 = mysqli_query($conn, $sqlll);
        $rows1= mysqli_fetch_all($result1);
      ?>
          </div>
          <div class="col-12 col-lg-6">
          <h3><i class="fas fa-briefcase"></i> Work</h3> 
          <?php foreach($rows1 as $row1){
            echo '<ul class="timeline"> ';  
            echo ' <li>';
            echo '<div class="direction-r">';
            echo '<div class="flag-wrapper">';
            echo '<span class="flag">'.$row1[1].'</span>';
            echo '<span class="time-wrapper"><span class="time">'.$row1[2].'</span></span>';
            echo '</div>';
            echo '<div class="desc">'.$row1[3].'</div>';
            echo '</div>';
            echo '</li>';
            
          } ?>
          </div>
          </div>

          <?php
            $sq="SELECT * FROM skills";
            $qq=mysqli_query($conn, $sq);
            $rl=mysqli_fetch_all($qq);
          
          ?>
          <hr>
          <h3><i class="fas fa-tools"></i></i> My Skills</h3> 
          <?php foreach($rl as $rll){
            
          echo '<p style="width:'.$rll[2].'%" data-value="'.$rll[2].'">'.$rll[1].'</p>';
          echo '<progress max="100" value="'.$rll[2].'">';
          echo '<div class="progress-bar">';
          echo '<span style="width: '.$rll[2].'%">'.$rll[2].'%</span>';
          echo '</div>';
          echo '</progress>';
        } ?>
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