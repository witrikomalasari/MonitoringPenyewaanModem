<br> 
<h1> STOK </h1>	
	<hr style="border: 2px outset;">  		
	<div id="stokcontain" style="margin-left: 30px;margin-right: 10px; ">

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
							<th> KODE Barang </th> 
							<th> NAMA Barang </th>
							<th> STOK TERSEDIA </th>
						</tr>
					 </thead>
					 <tbody>
							<?php

							
								$sql="SELECT  * FROM  bahan_baku";


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