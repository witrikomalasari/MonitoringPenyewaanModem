<?php	include '../connection/koneksi.php';		$id_masuk=$_POST['id_masuk'];	$tglmasuk=$_POST['tglmasuk'];	$kdbarang=$_POST['kdbarang'];	$jml_masuk=$_POST['jml_masuk'];		//Memasukkan variabel ke dalam tabel	$sql="INSERT INTO barang_masuk (id_masuk,tglmasuk,kdbarang,jml_masuk)	VALUES('$id_masuk','$tglmasuk','$kdbarang','$jml_masuk')";	$con->query($sql);	header("location:indexgudang.php?page=barang_masuk.php");  ?>        