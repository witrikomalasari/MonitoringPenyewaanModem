<?php	 include '../connection/koneksi.php';	$nopo=$_POST['nopo'];		$tglmulaiproduksi=$_POST['tglmulaiproduksi'];	$tglselesaiproduksi=$_POST['tglselesaiproduksi'];	$statusprod=$_POST['statusprod'];	$jumlahproduksi=$_POST['jumlahproduksi'];				//Memasukkan variabel ke dalam tabel	$sql="INSERT INTO produksi (noproduksi,tglmulaiproduksi,tglselesaiproduksi,statusprod,jumlahproduksi)		  VALUES('$noproduksi','$tglmulaiproduksi','$tglselesaiproduksi'.'$statusprod','$jumlahproduksi')";	$con->query($sql);	header("location:indexproduksi.php?page=produksi.php");?>        