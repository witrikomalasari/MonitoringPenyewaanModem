<?php 
	include '../connection/koneksi.php'; 
 
	$nopo   			= $_POST['nopo'];
	$kdcustomer			= $_POST['kdcustomer'];
	$namacustomer		= $_POST['namacustomer'];
	$alamat 			= $_POST['alamat'];
	$idproduk			= $_POST['idproduk'];
	$namaproduk			= $_POST['namaproduk'];
	$jumlahproduk		= $_POST['jumlahproduk'];
	$tglpengiriman		= $_POST['tglpengiriman'];
  
    //Memasukkan variabel ke dalam tabel
    
  
    
    $sql="INSERT INTO pengiriman 
	          (nopo,
	           kdcustomer,
	           namacustomer,
	           alamat,
	           idproduk,
	           namaproduk,
	           jumlahproduk,
	           statuskirim,
	           tglpengiriman)
		   VALUES
		        ('$nopo',
		         '$kdcustomer',
		         '$namacustomer',
		         '$alamat',
		         '$idproduk',
		         '$namaproduk',
		         '$jumlahproduk'
		         'sedangdikirim',
		         '$tglpengiriman')";
 
	$con->query($sql);
	
  
	$sql1="UPDATE produksi SET statusprod='sedangdikirim' WHERE statusprod='done' AND nopo='$nopo'";
	$con->query($sql1);


	header("location:indexgudang.php?page=pengiriman.php");	 	  	  
		
?>
 
