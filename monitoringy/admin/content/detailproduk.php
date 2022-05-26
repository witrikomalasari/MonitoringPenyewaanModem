	
<?php include '../connection/koneksi.php';
	include 'libraryadmin.php';?>

<h1>  DATA PRODUK  </h1>	
		<hr style="border: 2px outset;"> 
	
 
<div id="containertypeprod">
			<div id="containernama">  
					
					<div class="formnama">
					
						<form class="form2" action="indexadmin.php?page=insertdetailprod.php" method="post"> 
									
							<label>
								<span> KODE PRODUK :  </span>
								<?php	
									 
								echo "<select name='idproduk'>";
											
											$rs=$con->query("SELECT * FROM tb_namaproduk");
												
											
												while ($row = mysqli_fetch_array($rs))
												{
												echo "<option value='".$row['idproduk']."'>".$row['idproduk']."</option>";
													 
												}
								echo "</select>";
								?>	

								</label>
								
								<br>
								<br>
							<label > BAHAN BAKU :
								<br>

								<?php

								
									$cm = new clibrary();
	  								$data = $cm->getbahanbaku();

									while($hasil=mysqli_fetch_array($data)){?>
									<BR>
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									<span >
										<input type="checkbox" name="kdbarang[]"  value="<?php echo $hasil['kdbarang'];?>" style="width: 50px;vertical-align:middle;">
										
									<?php echo $hasil['kdbarang'];?>
									
								</span>
									<?php }	?>
									
							<br>
							</label>			
										<br>					
										<input type="submit" name="submit" value="SUBMIT">
										<input type="reset" value="RESET">
													
						</form>	
						<br>
					<div> 
						<h1> DETAIL PRODUK  </h1>
					
							<table id="datatables" class="display"> 
							  <thead>
								<tr>
									<th> KODE PRODUK </th>
									<th> KODE BAHAN BAKU </th>						
									<th > ACTION </th>
								</tr>
							  </thead>
							  <tbody>
									<?php
										$sql="SELECT*FROM produkdetail";
										$rs=$con->query($sql);
										
										while($row=mysqli_fetch_row($rs)){ ?> 

											<tr>
													<td> <?php echo $row[0];?> </td>
													<td> <?php echo $row[1];?> </td>
																											
													<td>

														<a href="indexadmin.php?page=formupdatedetailprod.php&idproduk=<?php echo$row[0];?>">
															<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
														</a>
														&nbsp
														<a href="indexadmin.php?page=deletedetailprod.php&idproduk=<?php echo$row[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
															<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
														</a>
														
														
													</td>
											</tr>
										
									<?php } ?> 
								 </tbody>
								</table>
							
				</div>
				</div>	
			</div>
</div>
	