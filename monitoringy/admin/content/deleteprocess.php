<?php	include '../connection/koneksi.php';	$userid=$_GET['userid'];		//Memasukkan variabel ke dalam tabel	$sql="DELETE FROM tb_user WHERE userid='$userid'";	$con->query($sql);	header("location:indexadmin.php?page=username.php");?>  