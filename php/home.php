


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
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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
          <a class="navbar-brand" href="index1.html">
				<div class="dropdown">
					<h1 class="dropbtn"><img class="img-responsive" src="images/logo2.png" alt="logo"></h1>
						<div class="dropdown-content">
							<li><img src="images/user1.png" style="width:128px;height:128px;">
							<li><?php
                                session_start();
                                $name=$_SESSION['uname'];
                                 echo $name  ?></li>
							<li>Rating:*****</li>
						</div>
					</div>
          </a>
		
        </div>
			
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <li class="scroll"><a href="home.php">Home</a></li>
			<li class="scroll"><a href="profile.html">Profile</a></li>
            <li class="scroll"><a href="leaderboard.html">LeaderBoard</a></li>
            <li class="scroll"><a href="swot.html">Swot</a></li>
            <li class="scroll"><a href="contact.html">Contact</a></li>
            <li class="scroll"><a href="index1.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
 <div id="wrapper">  
	<div id="upload">
		
	</div>
 
				<div id="Posts">
		<form action="#" method="post">
			<textarea name="posts" id="posts" placeholder="What's in your mind???" style="width:50%;height:100px;font-family:'Open Sans', sans-serif; border:10px double	rgb(128, 179, 255);" >
				
			</textarea><br>
			<button class="w3-btn w3-blue" input type="submit" value="Post" style="text-align:center;
	font-size:15px; font-family:'Open Sans', sans-serif;background-color: white; color:	rgb(51, 51, 255);margin-left:300px;text-decoration:none;font-weight: bold;">
	Post</button>
	</form>
	
	<button class="w3-btn w3-blue" input type="submit" onclick="location.href = 'upload.php';" value="Post" action="upload1.html" style="text-align:center;
	font-size:15px; font-family:'Open Sans', sans-serif;background-color: white; margin-left:370px; margin-top:-60px;color:	rgb(51, 51, 255);text-decoration:none;font-weight: bold;">
	Upload Photo/Video/Audio</button>
		
		</div>
</div>
    //fetch feed code
    
    
    
      <?php
            
            $link=mysqli_connect("localhost","root","","swotanalysis") or die("could nt connetcd to social database");
            $query="SELECT upload FROM posts WHERE uid='7' ORDER BY time DESC";// ORDER BY status_time DESC";
        
            if($query_run=mysqli_query($link,$query))
             {
                while($query_row=mysqli_fetch_assoc($query_run))
                {
                    $postpath=$query_row['upload'];
                    $a=$postpath;
                        if (strpos($a, 'jpg') !== false ||strpos($a, 'png') !== false|| strpos($a, 'JPG') !== false ||strpos($a, 'PNG') !== false||
                           strpos($a, 'gif') !== false)
                        {
                            echo "<p><img src='$postpath' height='40%' width='40%' align='middle'>\n"
                                            ."<br/></p>\n"; 
                                    
                        }
                        else if(strpos($a,'mp4'))
                        {
                            echo "<p><video width='50%' height='30%' controls > <source src='$postpath' type='video/mp4'></video>\n"
                                    ."\n";
                                
                        }
                    else
                    {
                         echo "<p><audio width='50%' height='30%' controls > <source src='$postpath' type='audio/mp3'></audio>\n"
                                    ."\n";
                    }

                }
            }
            else
            {
                echo "query dint run";
            }
			     
    
    
    
    ?>
    
    
    
    
    
    
<aside>	
	<center>
		<div class="w3-card-8 w3-white w3-margin" style="width:80%; height:100%; padding-top:20px;">

			<div class="w3-container w3-center"  >
  				<h3>Rate Your Friend</h3>
                <?php 
                                     
                        //connect                 
                               $user='root';
                                $pass='';
                                $db='swotanalysis';
                                $conn=new mysqli('localhost',$user,$pass,$db) or die("Connection Failed");      
                         if(isset($_POST['next']))            
                         {    //fetch random image            
                      $sqla = "SELECT pro_pic FROM profile ORDER BY RAND() LIMIT 5";
            $mq = mysqli_query($conn,$sqla) or die ("not working query");
            $row = mysqli_fetch_array($mq) or die("line 44 not working");
           $s=$row['pro_pic'];
             
                         }
                                     ?>
                        <?php echo '<img src="'.$s.'" alt="Avatar" style="width:80%" class="img-circle">';?>             
  					<h5>Akshay Kamble</h5>

					<p>
                        
                    <!--generate random function-->
                          <?php $rid=rand(1,10);
                            
                        ?>
                        
                        
                        <!--questions -->
                        
                        
                        <?php if($rid==1)
                        {
                            echo"";?>
                           
                         <h3>what is ur fav game?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
                        
                        
                        
                         <?php if($rid==2)
                        {
                            echo"";?>
                           
                         <h3>what is ur fav subject?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next"> Next </button>
    					</form>
    					
                        <?php }?>
    					
                    
                         <?php if($rid==3)
                        {
                            echo"";?>
                           
                         <h3>what is ur fav book??</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next"> Next </button>
    					</form>
    					
                        <?php }?>
    					
                       
                         <?php if($rid==4)
                        {
                            echo"";?>
                           
                         <h3>r u with me?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
                
                
                
                         <?php if($rid==5)
                        {
                            echo"";?>
                           
                         <h3>why r u here?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
                
                
                         <?php if($rid==6)
                        {
                            echo"";?>
                           
                         <h3>who i ur besties?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
                
                
                         <?php if($rid==7)
                        {
                            echo"";?>
                           
                         <h3>r u stupid?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
                
                
                         <?php if($rid==8)
                        {
                            echo"";?>
                           
                         <h3>R u mad?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
                
                
                         <?php if($rid==9)
                        {
                            echo"";?>
                           
                         <h3>do u like something?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
                
                
                         <?php if($rid==10)
                        {
                            echo"";?>
                           
                         <h3>how r u?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }?>
    					
             
					</p>
			</div>
    </center>
    </aside>
    </body>
</html>
		