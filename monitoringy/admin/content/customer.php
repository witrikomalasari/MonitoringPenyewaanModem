        
<br>
<h1 style="font-size: 30px;">  DATA CUSTOMER </h1>	
	<hr style="border: 2px outset;"> 

<div id="containercustomer"> 
	 
	
	<div class="formcustomer"> 
		<?php include '../connection/koneksi.php';?>
			
			<form class="customer" method="post" action="indexadmin.php?page=insertcustom.php">
				
				<label>
					<span>KODE CUSTOMER : </span>
					<br>
					<input type="text" name="kdcustomer" placeholder="Masukan Kode Customer" required>
				</label>
				<br>
				<label>
					<span>NAMA CUSTOMER :</span>
					<br> 
					<input type="text" name="namacustomer" placeholder="Masukan Nama Customer" required>
				</label>
				<br>
				<label>
					<span>TELEPON :</span>
					<br>
					<input type="text" name="telepon" placeholder="Nomor Telepon" required>
				</label>
				<br>
				<label>
					<span>EMAIL : </span>
					<br>
					<input type="email" name="email" placeholder="blabla@gmail.com" required>
				</label>
				<br>
				<label>
					<span> ALAMAT : </span>
					<br>
					<textarea name="alamat" rows="3" cols="54"> </textarea>
				</label>
				
						<br>
						<input type="submit" value="SIMPAN">
						<input type="reset" value="RESET">			
			</form>
		
		
			<fieldset>
			<h1> DATA CUSTOMER </h1>
			<br> 
			<table id="datatables" class="display" >
			   <thead>
				<tr>
					<th>KODE CUSTOMER r</th>
					<th>NAMA CUSTOMER</th>
					<th>TELEPON</th>
					<th>EMAIL </th>
					<th>ALAMAT</th>
					<th>ACTION</th>
				</tr>
			   </thead>
			   <tbody>
					<?php
						$sql="SELECT*FrOM tb_customer";
						$rs=$con->query($sql);
						
						while($row=mysqli_fetch_row($rs)){ ?>
							<tr>
								<td><?php echo $row[0];?></td>
								<td><?php echo $row[1];?></td>
								<td><?php echo $row[2];?></td>
								<td><?php echo $row[3];?></td>
								<td><?php echo $row[4];?></td>									
								<td>
									
									 
									<a href="indexadmin.php?page=formupdatecustomer.php&kdcustomer=<?php echo$row[0];?>">
										<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
									</a>

									<a href="indexadmin.php?page=deletecustom.php&kdcustomer=<?php echo$row[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
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

