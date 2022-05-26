     
		<?php include '../connection/koneksi.php';

			$noproduksi=$_GET['noproduksi'];

			//Ambil data berdasarkan nodataorder
			$sql="SELECT*FROM produksi WHERE noproduksi='$noproduksi'";
			$rs=$con->query($sql);

			while($row=mysqli_fetch_array($rs)){
				$statusprod=$row[1]; 
				$jumlahproduksi=$row[4]; 
			}

			
		?>

		<br>
	<div class="containerupdate" >
			<h1> STATUS UPDATE PRODUKSI </h1>
			<hr>
		
			
			<br>
			<form class="formupdate" method="POST" action="indexproduksi.php?page=updateprocessproduksi.php">
				<label>
					<span> No Produksi </span>
					<input type="text" name="noproduksi" value= "<?php echo $noproduksi;?>">
				</label> 

				<br>
				<br>
					<p> <?php echo $noproduksi;?></p>
				<br>
				<br>	
				<br>
				<br>
				<label>
					JUMLAH PRODUKSI :
					<br> 
					<br> 
					&nbsp
					&nbsp
					&nbsp
					<input type="hidden" name="jumlahproduksi" style="width: 50px;vertical-align: middle;"> <?php echo $jumlahproduksi;?>
				</label>

				<br>
				<br>
				<br>
				<br>
				<label>
					STATUS PRODUKSI :
					<br> 
					<br> 
					&nbsp
					&nbsp
					&nbsp
					<input id="done" type="radio" name="statusprod" value="done" style="width: 30px;vertical-align: middle;"  required>
					<span> Done </span>
				</label>

				<br>
				<br>
				<br>
				<br>
				
				<label>
															
					<span> Tanggal Selesai Produksi </span>
					<input id="tglselesaiproduksi" type="date" name="tglselesaiproduksi" value="<?php echo $tglselesaiproduksi; ?>"  style="width: 170px; " >

														
				</label>	
				<br>
				<br>
				<br>
				<br>

				<input type="submit" value="SIMPAN">
				<input type="reset" value="RESET">
			</form>
			<hr>
			<br>
			<a href="indexproduksi.php?page=produksi.php" id="tombolBack">KEMBALI</a>
			
		</div>