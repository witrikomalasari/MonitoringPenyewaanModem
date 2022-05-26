    
<div >  
	 
	
	<div class="formbahanbaku">
		<fieldset>
		<h1> STOK BAHAN BAKU </h1>
		<br>
<?php include '../connection/koneksi.php';?> 

			<table id="datatables" class="display"> 
			  <thead> 
				<tr>
					<th> noproduksi </th> 	
					<th> No Purchase Order </th>
					<th> Nama Produk </th>
					<th> jumlah produksi </th>	
					<th> status produksi </th>
					<th> tglmulaiproduksi</th>
					<th> tglselesaiproduksi</th>
					<th> tgldateline </th>	 
					<th> telat </th>	


					
					<th > ACTION </th>
				</tr>
			   </thead>
			   <tbody>
					<?php

						
						include '../connection/koneksi.php'; 

					
						$sql="SELECT 
								A.*,
								B.namaproduk 
							  FROM 
							  	produksi A,
							  	tb_namaproduk B 
							  	
							  where A.idproduk=B.idproduk";
			
						$rs=$con->query($sql);
						
						while($row=mysqli_fetch_array($rs)){ ?>
							<tr>
									<td> <?php echo $row['noproduksi'];?> </td>
									<td> <?php echo $row['nopo'];?> </td>
									<td> <?php echo $row['namaproduk'];?> </td>
									<td> <?php echo $row['jumlahproduksi'];?> </td>
									<td id="statusdone"> <?php echo $row['statusprod'];?> </td>
									<td> <?php echo $row['tglmulaiproduksi']; ?></td>
									<td> <?php echo $row['tglselesaiproduksi'];?> </td>
									<td> <?php echo $row['tgldateline']; ?></td>
									<td> <?php 
									$selesai=$row['tglselesaiproduksi'];
									$dateline=$row['tgldateline'];
									if ($selesai>$dateline) {
										echo "<font color='red'>out of dateline</font>" ;
									}
									else{
										echo ""	;
									}
									?>
                                    </td>
									<td >
										<a href="indexproduksi.php?page=formupdateproduksi.php&noproduksi=<?php echo$row[0];?>">
												<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i> Ganti Status
										</a>

										
										
									</td>
							</tr>
						
					<?php } ?>
				   </tbody>	

				</table>
				<a href="indexproduksi.php?page=requestprod.php" id="tombolBackreq"> <== BACK TO REQUEST </a>
	</div>
</div>

