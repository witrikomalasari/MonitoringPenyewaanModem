<br>
<h1> MODEM JADI  </h1>	 
	<hr style="border: 2px outset;">  		
	<div id="reqcontainer">

		<?php include '../connection/koneksi.php';?> 
		 
			<a href="">
				<meta equiv='refresh' content='10'; >
				<button type="submit" meta equiv='refresh'>                             
                            Refresh
                </button> 
            </a> 
            <br>
            <br>
					<table id="datatables" class="display" >
					 <thead> 
						<tr>  
								
						
							<th> NO. PO </th>
							<th> Kode Customer  </th>
							<th> Nama Customer  </th>
							<th> ALAMAT  </th>
							<th> ID produk  </th>
							<th> Nama produk  </th>
							<th> Jumlah produk  </th>
							<th> STATUS PRODUKSI </th>
							<th> ACTION </th>
							
							

						</tr> 
					 </thead>
					 <tbody>
							<?php
							
								$sql="SELECT 
										
										 produksi.nopo,
										 tb_customer.kdcustomer,
										 tb_customer.namacustomer,
										 tb_customer.alamat,
										 tb_namaproduk.idproduk,
										 tb_namaproduk.namaproduk,
										 produksi.jumlahproduksi,
										 produksi.statusprod
									   FROM 	
									   	 produksi,
									   	 tb_datapesan,
									   	 tb_customer,
									   	 tb_namaproduk
								  	   WHERE 
								  	   		 produksi.nopo
								  	   	 AND tb_namaproduk.idproduk=produksi.idproduk
								  	   	 AND tb_datapesan.nopo=produksi.nopo
								  	   	 AND tb_customer.kdcustomer=tb_datapesan.kdcustomer
							  		  	 AND produksi.statusprod='done'";
 
								$rs=$con->query($sql);
								
								while($row=mysqli_fetch_row($rs)){ ?>
									<tr>
										<td> <?php echo $row[0];?> </td>
										<td> <?php echo $row[1];?> </td>
										<td> <?php echo $row[2];?> </td>
										<td> <?php echo $row[3];?> </td>
										<td> <?php echo $row[4];?> </td>
										<td> <?php echo $row[5];?> </td>
										<td> <?php echo $row[6];?> </td>
										<td> <?php echo $row[7];?> </td>
										
										<td >

											<button type="button" onclick="location.href='indexgudang.php?page=proseskirim.php&nopo=<?php echo $row[0];?>'" id="Btn" onclick="myFunction()" >
												KIRIM
											</button>
					
									
												
										</td>
												
									</tr>
								
							<?php } ?>
						 </tbody>
						</table>

</div>
