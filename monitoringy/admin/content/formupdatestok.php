 
		<?php include '../connection/koneksi.php';

			$kdbarang=$_GET['kdbarang'];

			//Ambil data berdasarkan kdbarang
			$sql="SELECT*FROM tb_stok WHERE kdbarang='$kdbarang'";
			$rs=$con->query($sql);

			while($row=mysqli_fetch_array($rs)){
				$namabarang=$row[1];
				$jumlahstok=$row[2];
			}
		?>


	<div class="containerupdate" >
			<h1>FORM EDIT DATA USER</h1>
			<hr>
		
			
			<br>
			<form class="formupdate" method="POST" action="indexadmin.php?page=updateprocesstok.php">
				<br>
				<label>KODE BARANG </label>
				<br> 
				<br> 
				<p> <?php echo $kdbarang;?></p>
				<br>
				<input type="hidden" name="kdbarang" value="<?php echo $kdbarang;?>">
				<br>
				<br> 				
				<label>NAMA Barang</label> <input type="text" name="namabarang" value="<?php echo $namabarang; ?>" >
				<br>		
				<label>Jumlah Stok</label>
						<input type="number"  name="jumlahstok" value="<?php echo $jumlahstok; ?>" >
							
				<br> 

				<input type="submit" value="SIMPAN">
				<input type="reset" value="RESET">
			</form>
			<hr>
			<br>
			<a href="indexadmin.php?page=stok.php" id="tombolBack">KEMBALI</a>
			
		</div>