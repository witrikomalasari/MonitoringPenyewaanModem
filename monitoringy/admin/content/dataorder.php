 
	<div id="isidataorder"> 
	
			<div class="submit">
				<button  type="submit" onclick="document.getElementById('formpopup').style.display='block'"> + TAMBAH DATA
				</button>

				<a href="">
					<meta equiv='refresh' content='10'; >
					<button type="submit" meta equiv='refresh'>                             
	                            Refresh
	                </button>
           		</a>
					<div id="formpopup" class="modal">
			 		    <span onclick="document.getElementById('formpopup').style.display='none'" 
			 		    	class="close" title="Close Modal">&times;</span>

			 		   
						<?php include '../connection/koneksi.php';?> 

					<form  class="modal-content animate" method="POST" action="indexadmin.php?page=insertdataorder.php">

						<div class="judulform">

							<h5> FORM ORDER SEWA ROUTER </h5>
						</div>
								<br>
								<br>

								<label>
									<span> No PO </span>
									<input type="text" name="nopo" placeholder="No purchase order" required>
								</label>

								<label>
									<span> Tanggal PO </span>
									<input type="date" name="tglorder" required>
								</label>

								<label>									
									<span> Nama Pelanggan </span>
									 <?php	
									 
									 echo "	<select name='kdcustomer' >";
												
												$rs=$con->query("SELECT * FROM tb_customer");
												
												
												while ($row = mysqli_fetch_array($rs))
												{
												echo "<option value='".$row['kdcustomer']."'>".$row['namacustomer']."</option>";
													 
												}
									echo "</select>";
									?>		
								</label>

								<label>
									<span> Nama produk  </span>
									 <?php	
									 
									 echo "	<select name='idproduk'>";
												// query untuk menampilkan propinsi
												$rs=$con->query("SELECT * FROM tb_namaproduk");
												
												
												while ($row = mysqli_fetch_array($rs))
												{
												echo "<option value='".$row['idproduk']."'>".$row['namaproduk']."</option>";
													 
												}
									echo "</select>";
									?>		
								</label>
								<!--
								<label>
									
									<span> Type Produk </span>
								   	
								 	
									
									 echo "	<select name='idtype'>";
											
												$rs=$con->query("SELECT * FROM tb_typeproduk");
												
												
												while ($row = mysqli_fetch_array($rs))
												{
												echo "<option value='".$row['idtype']."'>".$row['namatypeproduk']."</option>";
													 
												}
									echo "</select>";
									?>		
									
								</label>
							    -->
								<label>
									<span> Jumlah Produk </span>
								<input type="number" name="jumlahproduk" placeholder="Masukkan jumlah produk" required>
								</label>
								
								<br>
																		
										<input type="submit" value="SUBMIT">
										<input type="reset" value="RESET">	
								
							
						<div class="container" style="padding-top: 30px;">
						      <button class="cancelbtn" onclick="document.getElementById('formpopup').style.display='none'" >Cancel</button>
						      
						</div>		
				</form>
			</div>	
		

				<br>

					<fieldset>
					<h1> DATA ORDER MASUK </h1>
					<br>
					<table id="datatables" class="display">
					   <thead>
						<tr>
							
							<th> NO. PO </th>
							<th> Tanggal PO </th>
							<th> Nama Pelanggan </th>
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
										 tb_namaproduk.namaproduk, 
										 tb_datapesan.jumlahproduk
									   FROM 	 
									   	 tb_customer,
								  		 tb_namaproduk,    		  
								  		 tb_datapesan
								  	   WHERE 
								  	   		 tb_datapesan.nopo
									  	 AND tb_customer.kdcustomer = tb_datapesan.kdcustomer
							  		 	 AND tb_namaproduk.idproduk = tb_datapesan.idproduk";


								$rs=$con->query($sql);
								
								while($row=mysqli_fetch_row($rs)){ ?>
									<tr>
										<td> <?php echo $row[0];?> </td>
										<td> <?php echo $row[1];?> </td>
										<td> <?php echo $row[2];?> </td>
										<td> <?php echo $row[3];?> </td>
										<td> <?php echo $row[4];?> </td>

								
										
										<td style="	padding: 4px;">
											<a href="indexadmin.php?page=formupdatedataorder.php&nopo=<?php echo $row[0];?>">
													<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
											</a>
											&nbsp
											<a href="indexadmin.php?page=deletedataorder.php&nopo=<?php echo$row[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
												<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
											</a>									
									
										</td>
										
									</tr>
								
							<?php } ?>
						  </tbody>
						</table>
					</fieldset>
				</div>
	
			
 </div>					
