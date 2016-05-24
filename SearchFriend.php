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
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
  
  <style>
table {
    border-collapse: collapse;
    width: 50%;
	margin-left:25%;
	margin-top:5%;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	

	
}



th, td {
    text-align: left;
    padding: 8px;
}

td{color:black;}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #028FCC;
    color: white;
	width:25%;
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
					<b><?php
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
<body>

	
		
	
 
				<div id="Posts" style="margin-top:130px;">
				<center>
				<h1>Search Your Friend</h1>
		<form method="post" action="Searchfriend.php" >
         <input type="search" name="fname">
                 <input type="search" name="lname">

         <input type="submit" name="search" value="Search"><br>
       </center>
 
        
        </form>
		
		
		
        <!--      <form id="main-contact-form" name="contact-form" method="post" action="SearchFriend.php">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="fname" class="form-control" placeholder="First Name" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="lname" class="form-control" placeholder="Last Name" required="required">
                    </div>
                  </div>
                </div>
				 <div class="form-group">
                  <button type="submit" class="btn-submit"><b>SEARCH NOW</b></button>
                </div>
              </form>-->
            
      
   
	
	
		
		
</div>
<div id="wrapper">  

<?php

include'dbconnect.php';

if(isset($_POST['search']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
   // echo"".$fname;
    $SQL="SELECT uid from user where fname='".$fname ."' and lname='".$lname ."'"; 
     //$SQL1="SELECT uid from user where lname='".$lname ."'";
    
    $result = mysqli_query($db_handle, $SQL);
    //$result1 = mysqli_query($db_handle, $SQL1);
		$db_field = mysqli_fetch_assoc($result);
    //$db_field1 = mysqli_fetch_assoc($result1);
		$uid = $db_field['uid'];   
      //  $uid1 = $db_field1['uid']; 
		
		//echo $uid;
		//echo $uid1;
    
    //if($uid == $uid1)
    //{
  
  /*  echo"<table>";
     echo"<tr>";
	 echo"<center>";
			$sql = "SELECT * FROM profile WHERE uid = $uid";
			$sth = $db_handle->query($sql);
			$result2=mysqli_fetch_array($sth);
			echo '<img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" class="img-circle" style="width:150px;height:150px; "/>';
			echo "<br>";
			echo"</center>";
			echo"</tr>";
			echo"</table>";
                                
      */                        
    
    
      $query="SELECT upload from posts where uid='".$uid ."'";; 
                                
            $idquery="SELECT pid FROM posts ORDER BY pid DESC";
                                
        
                                
                                
            if($query_run=mysqli_query($db_handle,$query) AND $id_run=mysqli_query($db_handle,$idquery))
             {
            
                while($query_row=mysqli_fetch_assoc($query_run) AND   $query_row_id=mysqli_fetch_assoc($id_run))
                {
                    $postpath=$query_row['upload'];
                    
                    $tmpid=$query_row_id['pid'];
                    
					echo"<center>";
                    
                    
                        
                    $a=$postpath;
                        if (strpos($a, 'jpg') !== false ||strpos($a, 'png') !== false|| strpos($a, 'JPG') !== false ||strpos($a, 'PNG') !== false||
                           strpos($a, 'gif') !== false)
                        {
                            echo "<p><img src='$postpath' height='40%' width='40%' align='middle'>\n"
                                            ."<br/></p>\n"; 
                         //   echo"".$tmpid;
                                    
                        }
                        else if(strpos($a,'mp4'))
                        {
                            echo "<p><video width='40%' height='40%' controls > <source src='$postpath' type='video/mp4'></video>\n"
                                    ."\n";
                            
                 
                           //    echo"".$tmpid; 
                        }
                    else
                    {
                         echo "<p><audio width='40%' height='40%' controls > <source src='$postpath' type='audio/mp3'></audio>\n"
                                    ."\n";
                       // echo"".$tmpid;
                     
                    }
                    
          
                }
				echo"</center>";
            }
            else
            {
                echo"not well";
            }
    }
	





?>

</div>
<aside style="height:350px;">	
	<center>
		<div class="w3-card-8 w3-white w3-margin" style="width:80%; height:300px; padding-top:20px; " >

			<div class="w3-container w3-center"   >
			 <?php 
				 include "dbconnect.php";?>
  				 
				  <h3><?php 
				  if(isset($_POST['search']))
			{
				  $SQL1 = "select * from user where uid =$uid";
		$result1 = mysqli_query($db_handle, $SQL1);
		$db_field1 = mysqli_fetch_assoc($result1);
				  echo " " .$db_field1['fname']   ." ". $db_field1['lname']." ";
			}
else{
	echo"";
}			
				 ?></h3>
			
                
                   
            
              <?php 

			

			  echo"<center>";
			if(isset($_POST['search']))
			{
				
			
			$sql = "SELECT * FROM profile WHERE uid = $uid";
			
			$sth = $db_handle->query($sql);
			$result2=mysqli_fetch_array($sth);
			echo '<img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" class="img-circle" style="width:150px;height:150px; "/>';
			}
		else{
		 echo' <img src="images/user.png" style="width:200px;height:200px;"></img>';
		}
		

	
			echo "<br>";
			echo"</center>";
			
			
			?>
  					


    					
             
					</p>
			</div>
    </center>
    </aside>

<!--<html>
    <body>-->

</body>    
    </html>