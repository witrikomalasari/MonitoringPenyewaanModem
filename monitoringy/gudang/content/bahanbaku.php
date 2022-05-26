 <br>
 <h1> DATA BAHAN BAKU  </h1> 

	<hr style="border: 2px outset;">  

<div id="containerbahanbaku">  
	 
	
	<div class="formbahanbaku">
		<?php include '../connection/koneksi.php';?> 

		<form class="bahanbaku" action="indexgudang.php?page=insertbahanbaku.php" method="post">
				
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
						<br>				
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
									
		</form>	
	
		
		<h1> DAFTAR BAHAN BAKU </h1>
		<br>
			<table id="datatables" class="display"> 
			  <thead> 
				<tr>
					<th> KODE Barang </th> 
					<th> NAMA Barang </th>
					<th> STOK TERSEDIA </th>
					<th > ACTION </th>
				</tr>
			   </thead>
			   <tbody>
					<?php
						$sql="SELECT*FrOM bahan_baku";
						$rs=$con->query($sql);
						
						while($row=mysqli_fetch_row($rs)){ ?> 
						
							<tr>
									<td> <?php echo $row[0];?> </td>
									<td> <?php echo $row[1];?> </td>
									<td> <?php echo $row[2];?> </td>				

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
</div>
