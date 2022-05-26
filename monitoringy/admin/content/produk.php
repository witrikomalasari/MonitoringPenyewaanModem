	
<?php  
     include '../connection/koneksi.php'; 
     include 'libraryadmin.php'; ?>

<h1 style="font-size: 30px;">  DATA PRODUK  </h1>	
		<hr style="border: 2px outset;"> 
	
 

			<div id="containernama">  
					
					<div class="formnama">
						
						<form class="form1" action="indexadmin.php?page=insertnamaprod.php" method="post">
								
			 						<label>
										<span> KODE PRODUK : </span>
										<br>
										<input  type="text" name="idproduk" placeholder="Masukan Kode Produk" required>
									</label>
										<br>				
									<label>
										<span> NAMA PRODUK : </span>
										<br>
										<input type="text"  name="namaproduk" placeholder="Masukan Nama Produk" style="width: 300px;" required>
									</label>
									<br>
												
										<br>					
										<input type="submit" value="SIMPAN">
										<input type="reset" value="RESET">
													
						</form>	
						<br>
						
						<h1> DAFTAR NAMA PRODUK </h1>
						<br>
							<table id="datatables" class="display"> 
							  <thead>
								<tr>
									<th> KODE PRODUK </th>					
									<th> NAMA PRODUK </th>						
									<th > ACTION </th>
								</tr>
							  </thead>
							  <tbody>

									<?php
		
										$sql="SELECT*FROM tb_namaproduk order by idproduk";
										$rs=$con->query($sql);
										
										while($row=mysqli_fetch_row($rs)){ ?> 

											<tr>
													<td> <?php echo $row[0];?> </td>
													<td> <?php echo $row[1];?> </td>
																											
													<td>

														<a href="indexadmin.php?page=formupdatenamaprod.php&idproduk=<?php echo$row[0];?>">
															<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
														</a>
														&nbsp
														<a href="indexadmin.php?page=deletenamapr.php&idproduk=<?php echo$row[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
															<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
														</a>
														
														
													</td>
											</tr>
										
									<?php } ?> 
								 </tbody>
								</table>
							
				</div>
			</div>

	