 

	<div id="isidataorder">
		<h1>  DATA ORDER MASUK </h1>
		
		<hr>   
		
			<div class="submit">
				<button  type="submit" onclick="document.getElementById('formpopup').style.display='block'"> TAMBAH  </button>

					<div id="formpopup" class="modal">
			 		    <span onclick="document.getElementById('formpopup').style.display='none'" 
			 		    	class="close" title="Close Modal">&times;</span>

						<?php include 'koneksi.php';?> 
						<form  class="modal-content animate" method="post" action="indexadmin.php?page=insertdataorder.php">
							
								<label>
									<span> No PO </span>
									<br>
									<input type="text" name="nopo"   required>
								</label>
								<br>
								<label>
									<span> Tanggal PO </span>
									<br>
									<input type="date" name="tglorder" required>
								</label>
								<br>				 
								<label>
									<span> Nama Pelanggan </span>
									<br>
									<input type="text" name="namapelanggan" placeholder="Nama customer"  required>
								</label>
								<br>
								<label>
									<span> Kode produk  </span>
									 
									<input type="text" name="kodeproduk" placeholder="link ke masterdata" required>									
								</label>
								<br>				
								<label>
									<span> Nama produk  </span>
									<br>
									<input type="text" name="namaproduk" placeholder="link ke masterdata" required>
								</label>
								<br>
								<label>
									<span> TYPE produk </span>
									<br>
								<input type="text" name="typeproduk" placeholder="link ke masterdata"  required>
								</label>
								<br>
								<label>
									<span> JUMLAH produk </span>
									<br>
								<input type="text" name="jumlahproduk" placeholder="Masukkan jumlah produk" required>
								</label>
								<br>
								
										<input type="reset" value="RESET">	
										<input type="submit" value="SUBMIT">
							
						<div class="container" style="background-color:#f1f1f1">
						      <button class="cancelbtn" onclick="document.getElementById('formpopup').style.display='none'" >Cancel</button>
						      
						</div>		
				  	</form>
			</div>	
		

				<br>

					<fieldset>
					<h1> DATA ORDER MASUK </h1>
					<br>
					<table>
						<tr>
							<th> NO. PO </th>
							<th> Tanggal PO </th>
							<th> Nama Pelanggan </th>
							<th> Kode produk </th>
							<th> Nama produk  </th>
							<th> Type produk  </th>
							<th> Jumlah produk  </th>
							<th> ACTION </th>
						</tr>

							<?php
								$sql="SELECT*FrOM tb_dataorder";
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
										<td>
											<a href="deleteprocess.php?userid=<?php echo $row[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
												<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
											</a>
											<a href="formupdate.php?userid=<?php echo $row[0];?>">
												<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
												</a>
									
										</td>
									</tr>
								
							<?php } ?>
					</fieldset>
				</div>
				
 </div>					