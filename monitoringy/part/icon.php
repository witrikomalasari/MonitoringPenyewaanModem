
<?php
session_start();
?> 
<div id="righticon">
	
	<div class="welcome"> Welcome <?php echo $_SESSION['bagian']; ?> </div>
		
	<div class="iconadmin">  
		<?php echo $_SESSION['nama']; ?><i class="fa fa-user fa-fw" style="font-size:20px;color:white;"> </i> 
		<i class="fa fa-angle-down" style="font-size:20px;color:white;"> </i>	
		<div class="dropdown-icon">
		 
	      <a class="logout" href="../logout.php"> <i class="fa fa-sign-out" style="font-size:20px;color:black;"> </i> LOGOUT</a>
	      
	    </div>
	</div>			
		

</div>
