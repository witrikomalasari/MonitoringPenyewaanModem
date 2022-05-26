 
<div id="containerbahanbaku">  
	 
	
	<div class="formbahanbaku">
		<fieldset>
		<h1> BAHAN BAKU KELUAR </h1>
		<br>
<?php include '../connection/koneksi.php';?> 

			<table id="datatables" class="display"> 
			  <thead> 
				<tr>
					<th> noproduksi </th> 	
					<th> kdbarang </th>
					<th> jumlah produksi </th>
				</tr>
			   </thead>
			   <tbody>
					<?php
						$sql="SELECT * FROM produksi_dt";

						$rs=$con->query($sql);
						
						while($row=mysqli_fetch_row($rs)){ ?>
							<tr>
									<td> <?php echo $row[0];?> </td>
									<td> <?php echo $row[1];?> </td>
									<td> <?php echo $row[2];?> </td>
							</tr>
						
					<?php } ?>
				   </tbody>			
				</table>
	</div>
</div>
