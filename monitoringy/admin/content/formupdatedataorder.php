    
		<?php include '../connection/koneksi.php';

			$nopo=$_GET['nopo'];

			//Ambil data berdasarkan NOPO
			$sql="SELECT*FROM tb_datapesan WHERE nopo='$nopo'";
			$rs=$con->query($sql);

			while($row=mysqli_fetch_array($rs)){
				
				
				$tglorder=$row[1]; 
				$kdcustomer=$row[2];
				$idproduk=$row[3];
				//$idtype=$row[5];
				$jumlahproduk=$row[4];
			}
		?>


	<div class="containerupdate" >
			<h1>FORM EDIT DATA ORDER MASUK</h1>
			<hr>
		
			
			<br>
			<form class="formupdate" method="POST" action="indexadmin.php?page=updateprocessdataorder.php">
				
				
				<label> NO PO :</label>
				<br> 			
					<input type="text" name="nopo" value="<?php echo $nopo;?>">
				<br>
					<p> <?php echo $nopo;?></p>
				<br>
				<label>tglorder</label> 
				<br>				
					<input type="date" name="tglorder" value="<?php echo $tglorder;?>" style="width:150px;">
				<br> 	

				<br>
				<label>kdcustomer</label> 
				<br>
					<select name="kdcustomer">
						 <?php										 
										
							// query untuk menampilkan kdcustomer
							$rs=$con->query("SELECT * FROM tb_customer");													
													
								while ($row = mysqli_fetch_array($rs))
									{
										if ($kdcustomer == $row['kdcustomer']) 
										{
											echo '<option value="'.$row['kdcustomer'].'" selected>'.$row['namacustomer'].'</option>';

										} 
										else
										{
											echo '<option value="'.$row['kdcustomer'].'">'.$row['namacustomer'].'</option>';
										}
									}
							 ?>
			
					</select>
					
				<br>
				<label>idproduk</label>
					<br>
						<select name="idproduk">
						 <?php										 
										
							// query untuk menampilkan idproduk
							$rs=$con->query("SELECT * FROM tb_namaproduk");													
													
								while ($row = mysqli_fetch_array($rs))
									{
										if ($idproduk == $row['idproduk']) 
										{
											echo '<option value="'.$row['idproduk'].'" selected>'.$row['namaproduk'].'</option>';

										} 
										else
										{
											echo '<option value="'.$row['idproduk'].'">'.$row['namaproduk'].'</option>';
										}
									}
							 ?>
			
					</select>
								
					<br>

					<!--
					<label>idtype</label> <br>
						<select name="idtype">
															 
											
							// query untuk menampilkan typeproduk
							$rs=$con->query("SELECT * FROM tb_typeproduk");													
													
								while ($row = mysqli_fetch_array($rs))
									{
										if ($idtype == $row['idtype']) 
										{
											echo '<option value="'.$row['idtype'].'" selected>'.$row['namatypeproduk'].'</option>';

										} 
										else
										{
											echo '<option value="'.$row['idtype'].'">'.$row['namatypeproduk'].'</option>';
										}
									}
							 ?>
			
					</select>
					<br>	
					-->	    
					<label>jumlahproduk</label> <input type="number" name="jumlahproduk" value="<?php echo $jumlahproduk;?>">
					<br>
					
				<br> 

				<input type="submit" value="SIMPAN">
				<input type="reset" value="RESET">
			</form>
			<hr>
			<br>
			<a href="indexadmin.php?page=dataorder.php" id="tombolBack">KEMBALI</a>
			
		</div>