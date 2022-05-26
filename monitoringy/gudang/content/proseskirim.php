<div id="isidataorder">
	
	<?php include '../connection/koneksi.php'; 

		
	$nopo=$_GET['nopo'];
					//Ambil data berdasarkan nopo

	$sql="SELECT 
										
										 produksi.nopo,
										 tb_customer.kdcustomer,
										 tb_customer.namacustomer,
										 tb_customer.alamat,
										 tb_namaproduk.idproduk,
										 tb_namaproduk.namaproduk,
										 produksi.jumlahproduksi,
										 produksi.statusprod
							 FROM 	
									   	 produksi,
									   	 tb_datapesan,
									   	 tb_customer,
									   	 tb_namaproduk
							 WHERE 
							 	   		 produksi.nopo='$nopo'
							 	 AND tb_namaproduk.idproduk=produksi.idproduk
							 	 AND tb_datapesan.nopo=produksi.nopo
							 	 AND tb_customer.kdcustomer=tb_datapesan.kdcustomer
							 	 AND produksi.statusprod='done'";


			$rs=$con->query($sql);

			while($row=mysqli_fetch_array($rs)){
				
				$kdcustomer=$row[1];
			 	$namacustomer=$row[2];
				$alamat=$row[3];
				$idproduk=$row[4];
				$namaproduk=$row[5];
				$jumlahproduk=$row[6];
			}

			$tglkirim=date('Y-m-d');			
  	
	?>	

						<div class="judulform">

							<h5> STATUS PENGIRIMAN MODEM KE CUSTOMER </h5>
						</div>
								
								<br>

						
						<form  method="POST" action="indexgudang.php?page=insertproseskirim.php" >						
								
						<div class="formcustomer"  style="text-align: center;"> 
								
								<br>
								<label>
									
											
											<span> No PO </span>
											<br>
											<input type="text" name="nopo" value="<?php echo $nopo; ?>"  style="background-color: #D1D1C0;text-align: center;" readonly="readonly">			
								
								</label>
								<br>
								<br>
								<label>
											
											<span> ID Customer </span>
											<br>
											<input type="text" name="kdcustomer" value="<?php echo $kdcustomer; ?>"  style="background-color: #D1D1C0;text-align: center;" readonly="readonly">			
								
								</label>
								<br>
								<br>
								<label>
											
											<span> Nama Customer </span>
											<br>
											<input type="text" name="namacustomer" value="<?php echo $namacustomer; ?>"  style="background-color: #D1D1C0;text-align: center;" readonly="readonly">			
								
								</label>
								<br>
								<br>
									<label>
											<span> ALAMAT </span>
											<br>
											<input type="text" name="alamat" value="<?php echo $alamat; ?>"  style="background-color: #D1D1C0;text-align: center;" readonly="readonly">			
								
								</label>
							 <br>
							 <br>
							 <label>
											
											<span> ID PRODUK </span>
											<br>
											<input type="text" name="idproduk" value="<?php echo $idproduk; ?>"  style="background-color: #D1D1C0;text-align: center; width: 300px;"  readonly="readonly">									
								</label>
								 <br>
							 	<br>
								<label>
											
											<span> NAMA PRODUK </span>
											<br>
											<input type="text" name="namaproduk" value="<?php echo $namaproduk; ?>"  style="background-color: #D1D1C0;text-align: center; width: 300px;"  readonly="readonly">									
								</label>
								<br>
								<br>
								<label>
											
											<span> JUMLAH PRODUK </span>
											<br>
											<input type="number" name="jumlahproduk" value="<?php echo $jumlahproduk; ?>"  style="background-color: #D1D1C0;text-align: center; width: 300px;"  readonly="readonly">									
								</label>
								<br>
								<br>
								<label>
											
											<span> TANGGAL KIRIM </span>
											<br>
											<br>
											<input type="date" name="tglpengiriman" value="<?php echo $tglpengiriman; ?>"  style="background-color: #D1D1C0;text-align: center; width: 300px;"  readonly="readonly">									
								</label>
						</tr>
													
				</table>	
					<br> 
																	<input type="submit" value="PROSES">
																	<input type="reset" value="CANCEL">
		</form>		 

											<br>
											<br>

											<br>
											<br>
											<br>
			<a href="indexgudang.php?page=siapkirim.php"> <== KEMBALI/CANCEL </a>
											
 </div>				
</div>


 