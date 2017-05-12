	<div id="footer">
		<ul>
			<?php if (isset($_SESSION["MembersID"]) == false) {
					echo '<li><a href="register.php"><i class="fa fa-sign-in"></i>  log in/Sign Up </a></li>';
				}else{
					echo '<li><a href="logOut.php"><i class="fa fa-sign-in"></i>  log out </a></li>';
				} 
				?>
			
			<?php 
				if (isset($_SESSION["MembersID"]) == true) {
					echo '<li><a href="watchlist.php"><i class="fa fa-bars"></i> Watch List</a></li>';
				}else{
					echo '<li><a href="register.php"><i class="fa fa-bars"></i> watchlist</a></li>';
				}


				 ?>
			<?php if (isset($_SESSION["MembersID"]) == true) {
					echo '<li><a href="post_new_job.php"><i class="fa fa-sign-in"></i> Post Job</a></li>';
				} else

					echo '<li><a href="register.php"><i class="fa fa-paper-plane"></i> Post Job</a></li>';	
				?>
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>;
		</ul>

		
		<div class="socialmedia">
			<ul>
				<li><a href=""><i class="fa fa-facebook-official fa-2x"></i></a></li>
				<li><a href=""><i class="fa fa-twitter-square fa-2x"></i></a></li>
				<li><a href=""><i class="fa fa-youtube-square fa-2x"></i></a></li>
			</ul>
		</div>
			
	</div>

</div>


</html>	
</body>