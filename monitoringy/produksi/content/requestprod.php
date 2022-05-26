<br>
<h1> REQUEST TO PRODUCE </h1>	 
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
							<th> Tanggal PO </th>
							<th> Nama Customer </th>
							<th> ID produk  </th>
							<th> Nama produk  </th>
							<th> Jumlah produk  </th>
							<th> ACTION </th>
							
							

						</tr> 
					 </thead>
					 <tbody>
							<?php
							
								$sql="SELECT 
										
										 tb_datapesan.nopo,
										 tb_datapesan.tglorder,
										 tb_customer.namacustomer,
										 tb_namaproduk.idproduk,
										 tb_namaproduk.namaproduk,
										 tb_datapesan.jumlahproduk
										 
										 
									   FROM 	 
									   	 tb_customer,
								  		 tb_namaproduk,	  		  
								  		 tb_datapesan

								  	   WHERE 
								  	   		 tb_datapesan.nopo
									  	 AND tb_customer.kdcustomer = tb_datapesan.kdcustomer
							  		 	 AND tb_namaproduk.idproduk = tb_datapesan.idproduk
							  		  	 AND tb_datapesan.proses='unprocess'";
 
								$rs=$con->query($sql);
								
								while($row=mysqli_fetch_row($rs)){ ?>
									<tr>
										<td> <?php echo $row[0];?> </td>
										<td> <?php echo $row[1];?> </td>
										<td> <?php echo $row[2];?> </td>
										<td> <?php echo $row[3];?> </td>
										<td> <?php echo $row[4];?> </td>
										
										<td> <?php echo $row[5];?> </td>
										
										<td >

											<button type="button" onclick="location.href='indexproduksi.php?page=statusproduksi.php&nopo=<?php echo $row[0];?>'" id="Btn" onclick="myFunction()" >
												PROSES
											</button>
					
									
												
										</td>
												
									</tr>
								
							<?php } ?>
						 </tbody>
						</table>

</div>
