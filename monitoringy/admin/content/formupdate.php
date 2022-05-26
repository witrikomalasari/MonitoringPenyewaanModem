
		<?php include '../connection/koneksi.php';

			$userid=$_GET['userid'];

			//Ambil data berdasarkan userid
			$sql="SELECT*FROM tb_user WHERE userid='$userid'";
			$rs=$con->query($sql);
			while($row=mysqli_fetch_array($rs)){
				$nik=$row[1]; 
				$nama=$row[2];
				$username=$row[3];
				$password=$row[4];
				$bagian=$row[5];
			}
		?>


	<div class="containerupdate" >
			<h1>FORM EDIT DATA USER</h1>
			<hr>
		
			
			<br>
			<form class="formupdate" method="POST" action="indexadmin.php?page=updateprocess.php">
				
				
				<br> 	
				<label>NIK</label>
				<br>
				<p> <?php echo $nik;?></p>
				<br>
				<input type="hidden" name="nik" value="<?php echo $nik;?>">
				<br>
				<br> 				
				<label>Nama</label> <input type="text" name="nama" value="<?php echo $nama; ?>" >
				<br>
				<br> 				
				<label>Username</label> <input type="text" name="username" value="<?php echo $username;?>">
				<br> 				
				<br>
				<label>Password</label> <input type="text" name="password" value="<?php echo $password;?>">
				<br>
				<label>Divisi</label>
					<br>
					<select class="bagian" name="bagian">	
								<option value= "Admin" <?php 
									if($bagian == "Admin")
									{
									 echo 'selected'; 
									}?>> Admin
								</option>

								<option value= "Produksi" <?php 
									if($bagian == "Produksi")
									{
									 echo 'selected'; 
									} ?>> Produksi
								</option>
								<option value= "Gudang" <?php 
									if($bagian == "Gudang")
									{
									 echo 	'selected'; 
									} ?>> Gudang
								</option>
								<option value= "Manager" <?php 
									if($bagian == "Manager")
									{
									 echo 	'selected'; 
									} ?>> Manager
								</option>
					</select>				    
				<br>
				<br> 

				<input type="submit" value="SIMPAN">
				<input type="reset" value="RESET">
			</form>
			<hr>
			<br>
			<a href="indexadmin.php?page=username.php" id="tombolBack">KEMBALI</a>
			
		</div>