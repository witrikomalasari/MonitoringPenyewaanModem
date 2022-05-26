    
<div >  
	 
	
	<div class="formbahanbaku">
		<fieldset>
		<h1> STATUS KIRIM </h1>
		<br>
<?php include '../connection/koneksi.php';?> 

			<table id="datatables" class="display"> 
			  <thead> 
				<tr>
					<th> NO. PO </th>
					<th> Nama Customer  </th>
					<th> ALAMAT  </th>
					<th> Nama produk  </th>
					<th> Jumlah produk  </th>
					<th> STATUS PRODUKSI </th>
					<th> ACTION </th>
					<th > ACTION </th>
				</tr>
			   </thead>
			   <tbody>
					<?php
						
						include '../connection/koneksi.php'; 

					
						$sql="SELECT 
										
										 pengiriman.*,


									   FROM 	
									   	 pengiriman,
									   	 tb_customer

									   	 ";
 
								$rs=$con->query($sql);
						
						while($row=mysqli_fetch_array($rs)){ ?>
							<tr>
									
									<td> <?php echo $row['nopo'];?> </td>
									<td> <?php echo $row['kdcustomer'];?> </td>
									<td> <?php echo $row['alamat'];?> </td>
									<td> <?php echo $row['idproduk'];?> </td>\
									<td> <?php echo $row['jumlahproduk'];?> </td>
									<td id="statuskirim"> <?php echo $row['statuskirim'];?> </td>
									<td> <?php echo $row['tglpengiriman']; ?></td>
									<td> <?php echo $row['tglterkirim'];?> </td>
							</tr>
						
					<?php } ?>
				   </tbody>	

				</table>
				<a href="indexgudang.php?page=siapkirim.php" id="tombolBackreq"> <== BACK TO REQUEST </a>
	</div>
</div>

