 <br> 
 <h1> DATA BAHAN BAKU  </h1> 

	<hr style="border: 2px outset;">  

<div id="containerbahanbaku">  
	 
	
	<div class="formbahanbaku">
		<?php include '../connection/koneksi.php';?> 

		<form class="bahanbaku" action="indexgudang.php?page=insertbarangmasuk.php" method="post">
				
					
					<label>
						<span> ID Barang Masuk </span>
						<br>
						<input  type="text" name="id_masuk" placeholder="Kode barang masuk" required>
					</label>
					<br>
					<br> 					
					<label>
						<span> Tanggal Barang Masuk </span>
						<br>
						<input type="date" name="tglmasuk" required>
					</label>
					<br>
					<br>
					<label>
						<span> Nama barang </span>
						<br>
						 <?php	
									 
									 echo "	<select name='kdbarang' >";
												
												$rs=$con->query("SELECT * FROM bahan_baku");
												
												
												while ($row = mysqli_fetch_array($rs))
												{
												echo "<option value='".$row['kdbarang']."'>".$row['namabarang']."</option>";
													 
												}
									echo "</select>";
							?>		
					</label>
						<br>				
						<br>
					<label>
						<span> Jumlah barang </span>
						<br>
						<input type="number" name="jml_masuk" placeholder="Masukkan jumlah produk" required>
					</label>
						<br>
						<br>				
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
									
		</form>	
 	</div>

				<fieldset>
				<h1> DAFTAR BAHAN BAKU </h1>
				<br>
			<?php include '../connection/koneksi.php';?> 
					<table id="datatables" class="display"> 
					  <thead> 
						<tr>
							<th> ID Barang Masuk </th> 
							<th> Tgl Masuk Barang </th> 
							<th> Nama Barang </th>
							<th> JUMLAH Barang</th>
							<th > ACTION </th>
						</tr>
					   </thead>
					   <tbody>
							<?php
								$sql="SELECT*FrOM barang_masuk";
								$rs=$con->query($sql);
								
								while($row=mysqli_fetch_row($rs)){ ?> 
								
									<tr>
											<td> <?php echo $row[0];?> </td>
											<td> <?php echo $row[1];?> </td>
											<td> <?php echo $row[2];?> </td>
											<td> <?php echo $row[3];?> </td>						

											<td>
												
												<a href="indexadmin.php?page=formupdatestok.php&kdbarang=<?php echo$row[0];?>">
														<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
												</a>

												<a href="indexadmin.php?page=deletestok.php&kdbarang=<?php echo$row[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
													<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
												</a>
												 
												
											</td>
									</tr>
								
							<?php } ?>
						   </tbody>			
						</table>
			
					
		</div>
