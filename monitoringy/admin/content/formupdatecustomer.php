  
		<?php include '../connection/koneksi.php';

			$kdcustomer=$_GET['kdcustomer'];

			//Ambil data berdasarkan kdcustomer
			$sql="SELECT*FROM tb_customer WHERE kdcustomer='$kdcustomer'";
			$rs=$con->query($sql);

			while($row=mysqli_fetch_array($rs)){
				$namacustomer=$row[1];
				$telepon=$row[2];
				$email=$row[3];
				$alamat=$row[4];
			}
		?>


	<div class="containerupdate" >
			<h1 style="font-size: 30px;">FORM EDIT DATA CUSTOMER</h1>
			<hr>
		
			
			<br>
			<form class="formupdate" method="POST" action="indexadmin.php?page=updatecustomer.php">
				<br>
				<label>KODE CUSTOMER :</label>
				<br> 
				<br> 
				<p style="font-size: 22px;"> <?php echo $kdcustomer;?></p>
				<br>
				<input type="hidden" name="kdcustomer" value="<?php echo $kdcustomer;?>">
				
				<br> 				
				<label>NAMA CUSTOMER :</label> <input type="text" name="namacustomer" value="<?php echo $namacustomer; ?>" >
				<br>
				<br> 				
				<label>TELEPON :</label> <input type="text" name="telepon" value="<?php echo $telepon;?>">
				<br> 				
				<br>
				<label>EMAIL :</label> <input type="email" name="email" value="<?php echo $email;?>">
				<br>
				<br>
				<label> ALAMAT :</label>
					<textarea name="alamat" rows="3" cols="54"> <?php echo $alamat ;?> </textarea>
				<br>
				<br> 

				<input type="submit" value="SIMPAN">
				<input type="reset" value="RESET">
			</form>
			<hr>
			<br>
			<a href="indexadmin.php?page=customer.php" class="tombolBack">KEMBALI</a>
			
		</div>