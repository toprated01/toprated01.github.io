<?php  
								$user='sa_admin';
                                $pass='sa_admin';
                                $db='swotanalysis';
                                $conn=new mysqli('localhost',$user,$pass,$db) or die("Connection Failed");
session_start() ?>

<?php include_once( 'libs/getItems.php' ); include_once( 'libs/ip.php' );?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript">
  

</script>
    
    
    
    
    
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
    <meta charset="utf-8">
	<link rel="stylesheet" href="jquery/jRating.jquery.css" />
	<link rel="stylesheet" href="style.css" />
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="jquery/jRating.jquery.js"></script>
	<script type="text/javascript">
		$(function(){
			$(".rating").jRating({
				decimalLength : 1,
				rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
				phpPath: 'libs/rating.php',
				onSuccess: function(){
					alert('Your rating has been submitted');
				},
				onError: function(){
					alert('There was a problem submitting your feedback');
				}
			});
		});
	</script>
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
  
  
  <style>
	img{
		 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		 border:10px solid white;
	}
  </style>
</head><!--/head-->

<body>



  
  <header id="home">
 <!--/#home-slider-->
 <nav class="navbar navbar-fixed-top" style="min-height:110px;">
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
	</nav>
  </header><!--/#home--> 
  
  <div id="wrapper">  
	
		
	
 
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
  
    
    
    
      <?php
            /*
            $link=mysqli_connect("localhost","root","","swotanalysis") or die("could nt connetcd to social database");
            $query="SELECT upload FROM posts  ORDER BY time DESC";// ORDER BY status_time DESC";
                                
            $idquery="SELECT pid FROM posts ORDER BY pid DESC";
                                
                                
                                
            if($query_run=mysqli_query($link,$query) AND $id_run=mysqli_query($link,$idquery))
             {
                while($query_row=mysqli_fetch_assoc($query_run) AND   $query_row_id=mysqli_fetch_assoc($id_run))
                {
                    $postpath=$query_row['upload'];
                    
                    $tmpid=$query_row_id['pid'];
                    
                    
                    
                    
                        
                    $a=$postpath;
                        if (strpos($a, 'jpg') !== false ||strpos($a, 'png') !== false|| strpos($a, 'JPG') !== false ||strpos($a, 'PNG') !== false||
                           strpos($a, 'gif') !== false)
                        {
                            echo "<p><img src='$postpath' height='40%' width='40%' align='middle'>\n"
                                            ."<br/></p>\n"; 
                            echo"".$tmpid;
                                    
                        }
                        else if(strpos($a,'mp4'))
                        {
                            echo "<p><video width='40%' height='40%' controls > <source src='$postpath' type='video/mp4'></video>\n"
                                    ."\n";
                            
                 
                               echo"".$tmpid; 
                        }
                    else
                    {
                         echo "<p><audio width='40%' height='40%' controls > <source src='$postpath' type='audio/mp3'></audio>\n"
                                    ."\n";
                        echo"".$tmpid;
                     
                    }
                    
                    
                       echo " <div id='msg'></div>
<form method='post' action=''>
Select your favourite game:<br/>
<input type='radio' name='game' value='1'> Football<br />
<input type='radio' name='game' value='2'> Volleyball<br />
<input type='radio' name='game' value='3'> Tennis<br /><br />
<input type='submit' name='imgsubmit' id='imgsubmit'>
</form>
                        	
                        ";
                    
                    if(isset($_POST['rate']))
                    {
                        $rate=$_POST['rate'];
                      // $sqlrate ="UPDATE  posts set rating='2' where '$tmpid'==pid";
                        
                         $sqlrate = "update posts set rating=rating+$rate where pid='$tmpid'";
                        if(mysqli_query($link,$sqlrate) )
                        {
                            echo"inserted rating";    
                        }
                        else
                        {
                            echo"not insert rating";
                        }
                    }
                    else
                    {
                        echo"wronggggg";
                    }

                }
            }
            else
            {
                echo "query dint run";
            }
			     
    
    
    */
                                     
                                     
                                     
                                     
    ?>
    
    
	
		
		
		<?php 
		include "dbconnect.php";
		//$SQL = "select uid from user where uname ='".$_SESSION['uname']."'";
		//$result = mysqli_query($db_handle, $SQL);
		//$db_field = mysqli_fetch_assoc($result);
		//$uid = $db_field['uid'];
		if($allItems !== 0) { foreach($allItems as $value) {
			$allIpAddress = explode(',',$value['ip_address']);
			$current_ipAddress = GetUserIP();
			
			if(in_array($current_ipAddress,$allIpAddress))
			{
				$class = 'jDisabled';
			}
			else
			{
				$class = '';
			}
			
		?>
		<div class="items">
		<center>
			
			<?php $postpath= $value['upload'];
            $a=$postpath;
			$SQL = "select fname from user where uname ='".$_SESSION['uname']."'";
			$result = mysqli_query($db_handle, $SQL);
			$db_field = mysqli_fetch_assoc($result);
			$fname = $db_field['fname'];
                        if (strpos($a, 'jpg') !== false ||strpos($a, 'png') !== false|| strpos($a, 'JPG') !== false ||strpos($a, 'PNG') !== false||
                           strpos($a, 'gif') !== false)
                        {
							echo  "<br/><br/><b>$fname posted a photo.<b><br>";
                            echo "<p><img src='$postpath' height='40%' width='40%' align='middle'>\n"
                                            ."<br/></p><br>"; 
                           
                                    
                        }
                        else if(strpos($a,'mp4'))
                        {
							echo  "<br/><br/><b>$fname posted a video.<b><br>";
                            echo "<p><video width='40%' height='40%' controls > <source src='$postpath' type='video/mp4'></video>\n"
                                    ."\n<br>";
                            
                  
                        }
                    else
                    {
						echo "<br/><br/><b>$fname posted an audio.<b><br>";
                         echo "<p><audio width='40%' height='40%' controls > <source src='$postpath' type='audio/mp3'></audio>\n"
                                    ."\n<br>";
                       
                    }
			?>
			<div class="rating <?php echo $class; ?>" id="<?php echo $value['rating']; ?>_<?php echo $value['pid']; ?>"></div>
			</center>
		</div>
		<?php } } ?>
	</div><!-- end wrapper -->
    
    
    
    
    
<aside>	
	<center>
		<div class="w3-card-8 w3-white w3-margin" style="width:80%; height:100%; padding-top:20px; " >

			<div class="w3-container w3-center"   >
  				<h3>Rate Your Friend</h3>
                <?php 
                                     
                        //connect   
								$user='sa_admin';
                                $pass='sa_admin';
                                $db='SwotanAlysis';
                                $conn=new mysqli('localhost',$user,$pass,$db) or die("Connection Failed");
                              //session_start();						
                             
                
                $row;
                         if(isset($_POST['next']))            
                         {    //fetch random image            
                      $sqla = "SELECT pro_pic,fname,lname FROM profile,user WHERE user.uid=profile.uid ORDER BY RAND()";
            $mq = mysqli_query($conn,$sqla) or die ("not working query");
            $row = mysqli_fetch_array($mq) or die("line 44 not working");
            $s=$row['pro_pic'];
            $fn=$row['fname'];
            $ln=$row['lname'];
                            
             
                         }
                                     ?>
            
            
              <?php
			   if(isset($_POST['next']))  
			   {
			  echo '<img src="data:pro_pic/jpg;base64,'.base64_encode( $row['pro_pic'] ).'" alt="Avatar" style="width:50%; height:50%;" class="img-circle">';
			   }
			   else{
				   echo' <img src="images/user.png" style="width:300px;height:300px;"></img>';
				   
			   }?>
  					



			<h5> <?php 
			
			if(isset($_POST['next']))  
			   {
			echo ''. $row['fname'] .''.$row['lname'];
			   }
			 else{
				   echo"<br><br>";
				   
			   }?></h5>

					<p>
                        
                    <!--generate random function-->
                          <?php 
						  if(isset($_POST['next']))  
							{
			
						  
						  $rid=rand(1,10);
							
                            
                        ?>
                        
                        
                        <!--questions -->
                        
                        
                        <?php if($rid==1)
                        {
                            echo"";?>
                           
                         <h3>Does He keeps Himself/Herself Updated With Current Trends?</h3>   
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
                           
                         <h3>How Much Would you Rate Him/Her Based on his/her Dressing Sesnse? </h3>   
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
                           
                         <h3>What do you think his/her Proficiency Level?</h3>   
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
                           
                         <h3>Rate Him/Her baswed on technical knowledge.</h3>   
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
                           
                         <h3>Rate the person on the basis of his/her Communication Skills.</h3>   
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
                           
                         <h3>Rate the person on the basis of his/her Dancing Skills.</h3>   
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
                           
                         <h3>Is the person Matured....Rate between 1 to 5</h3>   
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
                           
                         <h3></h3>   
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
                           
                         <h3>?</h3>   
    					<form name="rating" method="post" action="home.php">
    					5<input type='radio' name='rate' value='5'>
						4<input type='radio' name='rate' value='4'>
						3<input type='radio' name='rate' value='3'>
						2<input type='radio' name='rate' value='2'>
						1<input type='radio' name='rate' value='1'><br/><br/>
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>
    					
                        <?php }
						}else
							{
								echo '<form name="rating" method="post" action="home.php">
    					
						<button class="w3-btn w3-blue" input type="submit" name="submit">Submit</button>
                        <button class="w3-btn w3-blue" input type="submit" name ="next">Next</button>
    					</form>';
								echo"<br><br>Press Next Button to Rate Your Friend!!!";
							}?>
						
    					
             
					</p>
			</div>
    </center>
    </aside>
    </body>
</html>
		