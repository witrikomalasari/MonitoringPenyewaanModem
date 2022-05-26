    
<div id="containerproduk">  
	<h1> PRODUK </h1>
	<br>
	<hr>
	<div class="formproduk">
		<?php include 'koneksi.php';?>

		<form class="produk1" action="indexadmin.php?page=insertprod.php" method="post">
				
					<label>
						<span> Kode Produk </span>
						<br>
						<input  type="text" name="kdproduk" placeholder="Kode Produk" required>
					</label>
						<br>				
					<label>
						<span> Nama Produk </span>
						<br>
						<input type="text"  name="namaproduk" placeholder="Nama Produk"  required>
					</label>
						<br>
					<label>
						<span> Type Produk </span>
						<br>
						<input type="text"  name="typeproduk" placeholder="Nama Produk"  required>
					</label>
						<br>					
					<label>
						<span> Keterangan </span>
						<br>
						<textarea name="keterangan" rows="3" cols="54"> </textarea>
					</label>					
						<br>					
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
									
		</form>	
		
		<fieldset>
		<h1> DAFTAR PRODUK </h1>
		
			<table> 
				<tr>
					<th> KODE Produk </th>
					<th> NAMA Produk </th>
					<th> TYPE Produk </th>`
					<th> KETERANGAN </th>
					<th > ACTION </th>
				</tr>
			
					<?php
						$sql="SELECT*FrOM tb_produk";
						$rs=$con->query($sql);
						
						while($row=mysqli_fetch_row($rs)){ ?> 

							<tr>
									<td> <?php echo $row[0];?> </td>
									<td> <?php echo $row[1];?> </td>
									<td> <?php echo $row[2];?> </td>
									<td> <?php echo $row[3];?> </td>																
									<td>
										<a href="deleteprocess.php?userid= <?php echo$rows[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
											<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
										</a>
										<a href="formUpdate.php?userid= <?php echo$rows[0];?>">
											<i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
										</a>
									</td>
							</tr>
						
					<?php } ?>
			</fieldset>
	</div>				
					
</div>
	