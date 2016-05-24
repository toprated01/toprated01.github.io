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
									<b>VIEW PROFILE</b></h2>
									<div class="dropdown-content">
										<li><img src="images/user1.png" style="width:128px;height:128px;"></img></li>
								
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
								<li class="scroll"><a href="sel_profile.html">Profile</a></li>
								<li class="scroll"><a href="leaderboard.html">LeaderBoard</a></li>
								<li class="scroll"><a href="piechart/check.php">Swot</a></li>
								<li class="scroll"><a href="contact.html">Contact</a></li>
								<li class="scroll"><a href="index.html">Logout</a></li>
							</ul>
						</div>
					</div>
				</div><!--/#main-nav-->
			</nav>
		</header><!--/#home-->

<div class='wrap'>
    <div class='bodywrap'>
	</div>
        
        <div class='right'>right</div>
        
    
 </div>