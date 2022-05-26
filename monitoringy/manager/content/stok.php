       
<div id="containerbahanbaku">  
	<h1> barang </h1>
	<br>
	<hr> 
	<div class="formbahanbaku">
		<?php include 'koneksi.php';?>

		<form class="bahanbaku" action="indexadmin.php?page=insertstok.php" method="post">
				
					<label>
						<span> Kode barang </span>
						<br>
						<input  type="text" name="kdbarang" placeholder="Kode barang" required>
					</label>
						<br>				
					<label>
						<span> Nama barang </span>
						<br>
						<input type="text"  name="namabarang" placeholder="Nama barang"  required>
					</label>
						<br>
					<label>
						<span> Jumlah Stok </span>
						<br>
						<input type="text"  name="jumlahstok"  required>
					</label>
						<br>				
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
									
		</form>	
		
		<fieldset>
		<h1> STOK BAHAN BAKU </h1>
		
			<table> 
				<tr>
					<th> KODE Barang </th>
					<th> NAMA Barang </th>
					<th> JUMLAH Stok</th>
					<th > ACTION </th>
				</tr>
			
					<?php
						$sql="SELECT*FrOM tb_stok";
						$rs=$con->query($sql);
						
						while($row=mysqli_fetch_row($rs)){ ?> 

							<tr>
									<td> <?php echo $row[0];?> </td>
									<td> <?php echo $row[1];?> </td>
									<td> <?php echo $row[2];?> </td>																						
									<td>
										<a href="deleteprocess.php?userid= <?php echo$rows[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
											<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
										</a>
										<a href="formUpdate.php?userid= <?php echo$rows[0];?>">
											<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
										</a>
									</td>
							</tr>
						
					<?php } ?>
			</fieldset>
	</div>				
					
</div>
