<?php	include '../connection/koneksi.php';		$nik=$_POST['nik'];	$nama=$_POST['nama'];	$username=$_POST['username'];	$password=$_POST['password'];	$bagian=$_POST['bagian'];		//Memasukkan variabel ke dalam tabel	$sql="INSERT INTO tb_user (userid,nik,nama,username,password,bagian)	VALUES('$userid','$nik','$nama','$username','$password','$bagian')";	$con->query($sql);	header("location:indexadmin.php?page=username.php");?>      