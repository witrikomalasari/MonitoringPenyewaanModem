<?php	include '../connection/koneksi.php';	$userid=$_POST['userid'];	$nik=$_POST['nik'];	$nama=$_POST['nama'];	$username=$_POST['username'];	$password=$_POST['password'];	$bagian=$_POST['bagian'];	 	//Memasukkan variabel ke dalam tabel	$sql="UPDATE tb_user set nama='$nama', username='$username', password='$password', bagian='$bagian'	WHERE nik='$nik'";	$con->query($sql);	header("location:indexadmin.php?page=username.php");?>