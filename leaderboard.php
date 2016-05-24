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

img{
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	border:5px solid white;
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
        <?php
		include 'dbconnect.php';
		//session_start();
		
		$SQL = "select uid,sum(total_rating)as rate from posts group by uid order by rate desc";
		$result = mysqli_query($db_handle, $SQL);
		
		$counter = 0;
		$max = 10;
		$sno=1;
		echo"<table >";
		echo" <tr>";
		echo" <th><center>Serial No.</center></th>";
		echo" <th><center>Photo</center></th>";
		echo" <th><center>Name</center></th>";
		echo" <th><center>Rating</center></th>";
		echo" </tr>";
		while (($db_field = mysqli_fetch_assoc($result)) and ($counter < $max))
		{
					$uid = $db_field['uid'];
					$rate = $db_field['rate'];
					
					
					echo"<tr>";
			$sql = "SELECT * FROM profile WHERE uid = $uid";
			$sth = $db_handle->query($sql);
			$result2=mysqli_fetch_array($sth);
			
			echo"<td>";echo $sno;echo"</td>";
			echo"<td>";echo '<img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" style="width:200px;height:200px;"/>';echo"</td>";
			$SQL1 = "select * from user where uid =$uid";
		$result1 = mysqli_query($db_handle, $SQL1);
		$db_field1 = mysqli_fetch_assoc($result1);
		echo "<td>" .$db_field1['fname']   ." ". $db_field1['lname']."</td>";
		echo"<td>";echo $rate;echo"</td>";
			echo "<br>";
			echo"</tr>";
			
					

			$counter++;
			$sno++;
		}
		
		/*$db_field = mysqli_fetch_assoc($result);
		$uid = $db_field['uid'];
		
		$SQL1 = "select * from user where uid =$uid";
		$result1 = mysqli_query($db_handle, $SQL1);
		$db_field1 = mysqli_fetch_assoc($result1);
		
		
		
		echo"<table >";
		$SQL = "select * from profile where uid=$uid";
		$row = mysqli_query($db_handle, $SQL);
		$db_field = mysqli_fetch_assoc($row);
		
		echo"<tr>";
			$sql = "SELECT * FROM profile WHERE uid = $uid";
			$sth = $db_handle->query($sql);
			$result2=mysqli_fetch_array($sth);
			echo '<img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" style="width:100px;height:150px;"/>';
			echo "<br>";
			echo"</tr>";
		
		
		 
		
			echo"<tr>";
			echo" <th>Name</th>";
            echo "<td>" .$db_field1['fname']   . $db_field1['lname']."</td>";
			echo"</tr>";
		
		    echo"<tr>";
			echo" <th>Age</th>";
            echo "<td>" .$db_field['age'] . "</td>";
			echo"</tr>";
			 
			echo"<tr>";
			echo"<th>Date of Birth</th>";
            echo "<td>" .$db_field['dob'] . "</td>";
			echo"</tr>";
			 
			echo"<tr>";
			echo"<th>Gender</th>";
            echo "<td>" .$db_field['gender']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>Hometown</th>";
            echo "<td>" .$db_field['h_town']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>Current City</th>";
            echo "<td>" .$db_field['c_city']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>Interests</th>";
            echo "<td>" .$db_field['interest']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>About You</th>";
			echo "<td>" .$db_field['abt_u']. "</td>";
            echo"</tr>";
          
        
      
    echo"</table>";*/
?>
</body>
</html>