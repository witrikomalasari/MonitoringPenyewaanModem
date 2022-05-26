
		<?php include '../connection/koneksi.php';

			$idproduk=$_GET['idproduk'];

			//Ambil data berdasarkan idproduk
			$sql="SELECT*FROM tb_namaproduk WHERE idproduk='$idproduk'";
			$rs=$con->query($sql);

			while($row=mysqli_fetch_array($rs)){
				$namaproduk=$row[1];
			}
		?>


	<div class="containerupdate" >
			<h1>FORM EDIT DATA NAMA PRODUK</h1>
			<hr>
		
			
			<br>
			<form class="formupdate" method="POST" action="indexadmin.php?page=updateprocessnamaprod.php">
				<br>
				<label> KODE PRODUK :</label>
				<br> 
				<br> 
				<p style="font-size: 22px;"> <?php echo $idproduk;?></p>
				<br>
				<input type="hidden" name="idproduk" value="<?php echo $idproduk;?>">
				<br>
				<br> 				
				<label>NAMA PRODUK : </label> <input type="text" name="namaproduk" value="<?php echo $namaproduk; ?>" >
				<br>				
				<br> 

				<input type="submit" value="SIMPAN">
				<input type="reset" value="RESET">
			</form>
			<hr>
			<br>
			<a href="indexadmin.php?page=produk.php" id="tombolBack">KEMBALI</a>
			
		</div>