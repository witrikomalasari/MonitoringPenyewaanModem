<div id="containerbahanbaku">  
	 
	
	<div class="formbahanbaku">
		<fieldset>
		<h1> STOK MODEM  </h1>
		<br>
<?php include '../connection/koneksi.php';?> 
			<table id="datatables" class="display"> 
			  <thead> 
				<tr>
					<th> KODE STOK MODEM </th> 
					<th> NAMA Barang </th>
					<th> TYPE Barang </th>
					<th> JUMLAH Stok</th>
					<th > ACTION </th>
				</tr>
			   </thead>
			   <tbody>
					<?php
						$sql="SELECT*FrOM tb_stok";
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
