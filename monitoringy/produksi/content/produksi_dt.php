<br>
<h1> PRODUKSI DETAIL </h1>	 
	<hr style="border: 2px outset;">  		
	<div id="reqcontainer">

		<?php include '../connection/koneksi.php';?> 
		 
			
							<?php
							
								$sql="SELECT 
										
										 produksi.noproduksi,
										 produkdetail.idproduk,
										 produkdetail.kdbarang,
										 produksi.jumlahproduksi
										 	
									   FROM 	 
									   	 produksi,
								  		 produkdetail

								  	   WHERE 
								  	   		 produksi_dt.idproduk=produkdetail.idproduk 
							  		 	 AND produksi_dt.kdbarang=produkdetail.kdbarang
							  		 	 AND produksi_dt.noproduksi=produksi.noproduksi
							  		  	 AND produksi_dt.idproduk= 1";

								$rs=$con->query($sql);
								
								while($row=mysqli_fetch_row($rs)){ ?>
									<tr>
										<td> <?php echo $row[0];?> </td>
										<td> <?php echo $row[1];?> </td>
										<td> <?php echo $row[2];?> </td>
										<td> <?php echo $row[3];?> </td>	
									</tr>
								
							<?php } ?>
						 </tbody>
						</table>

</div>
