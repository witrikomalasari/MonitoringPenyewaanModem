    
	<div id="isidataorder">
	
	<?php include '../connection/koneksi.php'; 

	
    include 'libraryprod.php';
	
	
	$nopo=$_GET['nopo'];
					//Ambil data berdasarkan nopo	

	$sql="SELECT 
										
			tb_datapesan.nopo,
			tb_namaproduk.namaproduk,
			tb_datapesan.jumlahproduk,
			tb_namaproduk.idproduk 
		   FROM 	 
		     tb_namaproduk,	  		  
			 tb_datapesan

		   WHERE  
			 tb_datapesan.nopo='$nopo'
		  AND tb_namaproduk.idproduk = tb_datapesan.idproduk";


			$rs=$con->query($sql);

			while($row=mysqli_fetch_array($rs)){
				
				$namaprod=$row[1];
				//$idtype=$row[5];
				$jumlahproduksi=$row[2];
				$produk=$row[3];
			}


    $cm = new clibrary();
  	$cek = $cm->cekstok($jumlahproduksi);													
	//echo $cek['total'];
	$nilai=mysqli_fetch_assoc($cek);
    if (($nilai['total'])>0){
            $carinama = $cm->caribahanbaku($jumlahproduksi);													
			$nama=mysqli_fetch_array($carinama);
			?>
			<script language="javascript"> 
			alert("Stok <?php echo $nama['namabarang'] ?> tidak mencukupi..");
		    //alert("Stok tidak mencukupi..");
		    
		    document.location= "indexproduksi.php?page=requestprod.php";     
		 	</script>
		    <?php	  	   
			exit();	
    	}
    


					$mulai			=date('Y-m-d');					
					$tuju_hari		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
					$dateline		=date('Y-m-d', $tuju_hari);

   
	?>	

						<div class="judulform">

							<h5> STATUS PRODUKSI </h5>
						</div>
								
								<br>

						
						<form  method="POST" action="indexproduksi.php?page=insertstatusproduksi.php" >						
								
						<div class="formcustomer"  style="text-align: center;"> 
								
								<br>
								<label>
									
											
											<span> No PO </span>
											<br>
											<input type="text" name="nopo" value="<?php echo $nopo; ?>"  style="background-color: #D1D1C0;text-align: center;" readonly="readonly">			
								
								</label>
								<br>
								<br>
							
								
								<br>
								<label>
											
											<input type="hidden" name="idprod" value="<?php echo $produk; ?>"  style="background-color: #D1D1C0;text-align: center; width: 300px;"  readonly="readonly">		

										
								
								</label>
								
								<label>
											
											<span> Nama Produk </span>
											<input type="text" name="namaprod" value="<?php echo $namaprod; ?>"  style="background-color: #D1D1C0;text-align: center; width: 300px;"  readonly="readonly">		

										
								
								</label>
								
								<br>
								<br>
								<br>
                               

								<label>
															<span> Tanggal mulai Produksi </span>
															<input id="tglmulaiproduksi" type="date" name="tglmulaiproduksi" value="<?php echo $mulai; ?>"  style="width: 130px; background-color: #D1D1C0;" readonly="readonly" >
															
															&nbsp
														  //	&nbsp
															&nbsp
											
															
											
															<span> Dateline Produksi </span>
															<input id="tgldateline" type="date" name="tgldateline" value="<?php echo $dateline; ?>"  style="width: 130px;background-color: #D1D1C0; " readonly="readonly">
								</label>

											<br>
											<br>
											<br>
											<br>

											
												
											<div > BAHAN BAKU
												<table style="margin-left: 100px;margin-top: 10px;">
													<tr>
														<?php 
													       
								   					  		
								   					 		 $query = $cm->getlist($produk);
														
														  while($row = mysqli_fetch_array($query)){ ?>
														<td>
														  <?php echo $row['namabarang']; ?>
														</td>
														<td>
															<input id="bahanbakupakai" type="number" name="jumlahproduksi" value="<?php echo $jumlahproduksi;?>" style="width: 50px;background-color: #D1D1C0;text-align: center; " readonly="readonly">
														</td>
								
														<?php
														}
														?>	
														
													</tr>
													
												</table>	
												</div>
												

												<br> 

																	<input type="submit" value="PROSES">
																	<input type="reset" value="CANCEL">
								</form>		 

											<br>
											<br>

											<br>
											<br>
											<br>
			<a href="indexproduksi.php?page=requestprod.php"> <== KEMBALI/CANCEL </a>
											
 </div>				
</div>


 