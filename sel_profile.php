<?php  
								$user='sa_admin';
                                $pass='sa_admin';
                                $db='swotanalysis';
                                $conn=new mysqli('localhost',$user,$pass,$db) or die("Connection Failed");
session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Top Rated</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
</head><!--/head-->

<body>

  

  <header id="home">
 <!--/#home-slider-->
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
				<div class="dropdown">
					<h2 class="dropbtn" style="color:white; font-family: 'Open Sans', sans-serif;font-size: 25px;">
					<b>Welcome <?php
                                //session_start();
                                $name=$_SESSION['uname'];
                                 echo $name  ?>!!!</b></h2>
						<div class="dropdown-content">
							<li> <?php
                            $sql2="select uid from user where uname='".$_SESSION['uname']."'";
              
                            $res=mysqli_query($conn,$sql2);
                            $db_field=mysqli_fetch_assoc($res);
                            $uid=$db_field["uid"];
              
                            echo"<tr>";
			                 $sql = "SELECT * FROM profile WHERE uid = $uid";
			                 $res1 = mysqli_query($conn,$sql);
                            $result2=mysqli_fetch_array($res1);
			echo '<center><img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" class="img-circle" style="width:150px;height:150px; "/></center>';
			echo "<br>";
			echo"</tr>";
                          ?>  </li>
						</div>
					</div>
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="scroll"><a href="home.php">Home</a></li>
			<li class="scroll"><a href="sel_profile.php">Profile</a></li>
			<li class="scroll"><a href="SearchFriend.php">SearchFriend</a></li>
            <li class="scroll"><a href="leaderboard.php">LeaderBoard</a></li>
            <li class="scroll"><a href="piechart/check.php">Swot</a></li>
            <li class="scroll"><a href="contact.php">Contact</a></li>
            <li class="scroll"><a href="index.html">Logout</a></li>
			</ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
 <section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="52.365629" data-longitude="4.871331" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2><b>YOUR PROFILE</b></h2>
            <p><b></b></p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              
                
                <div class="form-group">
                  <button type="submit" class="btn-submit" onclick="location.href='finalprofile.php' " ><b>CREATE/CHANGE PROFILE</b></button>
                </div>
              
			  
                
                <div class="form-group">
                  <button type="submit" class="btn-submit" onclick="location.href='view_profile.php' "><b>VIEW PROFILE</b></button>
                </div>
              
            </div>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#contact-->
 